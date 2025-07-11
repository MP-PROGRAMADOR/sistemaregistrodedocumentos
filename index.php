<?php
session_start();
// Asegúrate de que 'conexion/conexion.php' establece la conexión $conn y maneja errores.
// Ejemplo simple de conexion.php (adaptar según tu configuración real):
/*
<?php
$servername = "localhost";
$username = "tu_usuario";
$password = "tu_contraseña";
$dbname = "tu_base_de_datos";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
*/
require 'conexion/conexion.php';


$msg = '';
$msg_type = 'danger'; // default tipo alerta: error

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre_usuario = trim($_POST['nombre_usuario'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if (empty($nombre_usuario) || empty($password)) {
        $msg = 'Por favor complete todos los campos.';
    } else {
        try {
            // AÑADIMOS 'Activo' A LA CONSULTA
            $stmt = $conn->prepare("SELECT Id, Nombre, Pass, Tipo_Usuario, Activo FROM usuarios WHERE Nombre = ?");
            if ($stmt === false) {
                throw new Exception("Error al preparar la consulta: " . $conn->error);
            }
            $stmt->bind_param("s", $nombre_usuario);
            $stmt->execute();
            $resultado = $stmt->get_result();

            if ($resultado->num_rows === 1) {
                $usuario = $resultado->fetch_assoc();

                // COMPROBAR SI EL USUARIO ESTÁ ACTIVO
                if ((int)$usuario['Activo'] !== 1) {
                    $msg = "El usuario está inactivo.";
                } elseif (password_verify($password, $usuario['Pass'])) {
                    $_SESSION['usuario'] = $usuario['Nombre'];
                    $_SESSION['codigo'] = $usuario['Id'];
                    $_SESSION['tipo'] = $usuario['Tipo_Usuario'];

                    // Redireccionar según tipo
                    if ($usuario['Tipo_Usuario'] === "ADMINISTRADOR" || $usuario['Tipo_Usuario'] === "SUPERUSUARIO") {
                        header("Location: admin/index.php");
                        exit;
                    } elseif ($usuario['Tipo_Usuario'] === "USUARIO") {
                        header("Location: users/index.php");
                        exit;
                    } else {
                        $msg = "Tipo de usuario no válido.";
                    }
                } else {
                    $msg = "Contraseña incorrecta.";
                }
            } else {
                $msg = "El usuario no existe.";
            }
        } catch (Exception $e) {
            $msg = "Ocurrió un error en el servidor: " . $e->getMessage();
            error_log($e->getMessage());
        } finally {
            if (isset($stmt) && $stmt !== false) {
                $stmt->close();
            }
            if (isset($conn) && $conn !== false) {
                $conn->close();
            }
        }
    }
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tesorería General del Estado - Acceso al Sistema</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        /* ... Tu CSS existente ... */
        :root {
            --primary-color: #1976d2;
            --secondary-color: #424242;
            --accent-color: #ff6f00;
            --surface-color: #ffffff;
            --background-color: #f5f5f5;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            position: relative;
            overflow: hidden;
        }

        #particleCanvas {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
        }

        .login-container {
            position: relative;
            z-index: 2;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .login-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 24px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 100%;
            max-width: 420px;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .login-header {
            background: linear-gradient(135deg, var(--primary-color), #1565c0);
            color: white;
            padding: 2rem 2rem 1rem;
            text-align: center;
            position: relative;
        }

        .login-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grid" width="10" height="10" patternUnits="userSpaceOnUse"><path d="M 10 0 L 0 0 0 10" fill="none" stroke="rgba(255,255,255,0.1)" stroke-width="0.5"/></pattern></defs><rect width="100" height="100" fill="url(%23grid)"/></svg>');
            opacity: 0.3;
        }

        .login-header h1 {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            position: relative;
            z-index: 1;
        }

        .login-header p {
            font-size: 0.9rem;
            opacity: 0.9;
            margin-bottom: 0;
            position: relative;
            z-index: 1;
        }

        .logo-container {
            width: 80px;
            height: 80px;
            background: rgba(255, 255, 255, 0.15);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            position: relative;
            z-index: 1;
        }

        .logo-container i {
            font-size: 2.5rem;
            color: white;
        }

        .login-form {
            padding: 2rem;
        }

        .form-floating {
            margin-bottom: 1.5rem;
        }

        .form-floating>.form-control {
            border: 2px solid #e0e0e0;
            border-radius: 12px;
            padding: 1rem 0.75rem;
            font-size: 1rem;
            background: #fafafa;
            transition: all 0.3s ease;
        }

        .form-floating>.form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(25, 118, 210, 0.15);
            background: white;
        }

        .form-floating>label {
            color: #666;
            font-weight: 500;
        }

        .input-group-text {
            background: #fafafa;
            border: 2px solid #e0e0e0;
            border-right: none;
            border-radius: 12px 0 0 12px;
            color: #666;
        }

        .input-group .form-control {
            border-left: none;
            border-radius: 0 12px 12px 0;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color), #1565c0);
            border: none;
            border-radius: 12px;
            padding: 0.875rem 2rem;
            font-weight: 600;
            font-size: 1rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(25, 118, 210, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(25, 118, 210, 0.4);
            background: linear-gradient(135deg, #1565c0, var(--primary-color));
        }

        .btn-primary:active {
            transform: translateY(0);
        }

        .remember-forgot {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .form-check-input:checked {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .forgot-password {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
            font-size: 0.9rem;
            transition: color 0.3s ease;
        }

        .forgot-password:hover {
            color: #1565c0;
            text-decoration: underline;
        }

        .footer-info {
            background: #f8f9fa;
            padding: 1rem 2rem;
            text-align: center;
            color: #666;
            font-size: 0.8rem;
            border-top: 1px solid #e0e0e0;
        }

        .security-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: rgba(76, 175, 80, 0.1);
            color: #4caf50;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 500;
            margin-top: 1rem;
        }

        .loading-spinner {
            display: none;
            width: 20px;
            height: 20px;
            border: 2px solid #ffffff;
            border-top: 2px solid transparent;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        @media (max-width: 480px) {
            .login-card {
                margin: 10px;
                border-radius: 16px;
            }

            .login-header,
            .login-form {
                padding: 1.5rem;
            }
        }

        .ripple {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.3);
            transform: scale(0);
            animation: ripple-animation 0.6s linear;
            pointer-events: none;
        }

        @keyframes ripple-animation {
            to {
                transform: scale(4);
                opacity: 0;
            }
        }

        @keyframes documentFloat {
            0% {
                transform: translateY(0) rotate(0deg);
            }

            50% {
                transform: translateY(-10px) rotate(5deg);
            }

            100% {
                transform: translateY(0) rotate(0deg);
            }
        }
    </style>
</head>

<body>
    <canvas id="particleCanvas"></canvas>

    <div class="login-container">
        <div class="login-card">
            <div class="login-header">
                <div class="logo-container">
                    <i class="bi bi-bank2"></i>
                </div>
                <h1>Tesorería General del Estado</h1>
                <p>Gabinete de la Tesoreria</p>
            </div>

       




            <form class="login-form" id="loginForm" method="POST" action="">


               


                <div class="form-floating">
                    <input type="text" class="form-control" id="username" placeholder="Usuario" required name="nombre_usuario">
                    <label for="username"><i class="bi bi-person-circle me-2"></i>Usuario</label>
                </div>

                <div class="form-floating">
                    <input type="password" class="form-control" id="password" placeholder="Contraseña" required name="password">
                    <label for="password"><i class="bi bi-lock-fill me-2"></i>Contraseña</label>
                </div>

                <div class="remember-forgot">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="remember">
                        <label class="form-check-label" for="remember">
                            Recordar sesión
                        </label>
                    </div>
                    <a href="#" class="forgot-password">¿Olvidaste tu contraseña?</a>
                </div>

                <button type="submit" class="btn btn-primary w-100">
                    <span class="btn-text">
                        <i class="bi bi-box-arrow-in-right me-2"></i>
                        Iniciar Sesión
                    </span>
                    <div class="loading-spinner"></div>
                </button>

                     <?php if (!empty($msg)): ?>
  <div class="alert alert-<?= htmlspecialchars($msg_type) ?> alert-dismissible fade show mt-1" role="alert" id="mensajeFlash">
    <?= htmlspecialchars($msg) ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
  </div>
<?php endif; ?>

                <div class="security-badge">
                    <i class="bi bi-shield-lock-fill"></i>
                    Conexión segura SSL
                </div>
            </form>

            <div class="footer-info">
                <p>© 2025 Tesorería General del Estado. Todos los derechos reservados.</p>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

    <script>
        // Document Canvas Animation (Código optimizado previamente)
        const canvas = document.getElementById('particleCanvas');
        const ctx = canvas.getContext('2d');
        const documents = [];
        const maxDocuments = 20; // Reduced for better performance
        const spawnRate = 100; // Milliseconds between new document spawns
        let lastSpawnTime = 0;

        // Document types with their icons and colors
        const documentTypes = [{
                icon: '📄',
                color: 'rgba(255, 255, 255, 0.8)',
                size: 24
            },
            {
                icon: '📊',
                color: 'rgba(255, 255, 255, 0.7)',
                size: 28
            },
            {
                icon: '📋',
                color: 'rgba(255, 255, 255, 0.6)',
                size: 26
            },
            {
                icon: '💰',
                color: 'rgba(255, 255, 255, 0.8)',
                size: 22
            },
            {
                icon: '📈',
                color: 'rgba(255, 255, 255, 0.7)',
                size: 25
            },
            {
                icon: '🧾',
                color: 'rgba(255, 255, 255, 0.6)',
                size: 24
            },
            {
                icon: '💳',
                color: 'rgba(255, 255, 255, 0.8)',
                size: 26
            },
            {
                icon: '📑',
                color: 'rgba(255, 255, 255, 0.7)',
                size: 23
            }
        ];

        function resizeCanvas() {
            const displayWidth = window.innerWidth;
            const displayHeight = window.innerHeight;

            // Check if the canvas size needs to be updated to avoid unnecessary resizing
            if (canvas.width !== displayWidth || canvas.height !== displayHeight) {
                canvas.width = displayWidth;
                canvas.height = displayHeight;
            }
        }

        // Pre-render icons to offscreen canvases
        const offscreenCanvases = new Map();

        function createOffscreenCanvas(docType) {
            const offscreenCanvas = document.createElement('canvas');
            const offscreenCtx = offscreenCanvas.getContext('2d');

            const padding = 5; // Add some padding to prevent clipping
            offscreenCanvas.width = docType.size + padding * 2;
            offscreenCanvas.height = docType.size + padding * 2;

            offscreenCtx.font = `${docType.size}px Arial`;
            offscreenCtx.fillStyle = docType.color;
            offscreenCtx.textAlign = 'center';
            offscreenCtx.textBaseline = 'middle';
            offscreenCtx.fillText(docType.icon, offscreenCanvas.width / 2, offscreenCanvas.height / 2);

            return offscreenCanvas;
        }

        function preloadOffscreenCanvases() {
            documentTypes.forEach(docType => {
                offscreenCanvases.set(docType.icon, createOffscreenCanvas(docType));
            });
        }

        function createDocument() {
            const docType = documentTypes[Math.floor(Math.random() * documentTypes.length)];
            const side = Math.floor(Math.random() * 4); // 0: top, 1: right, 2: bottom, 3: left
            let x, y, vx, vy;

            // Optimized spawn points: closer to edges, less random initial velocity
            switch (side) {
                case 0: // from top
                    x = Math.random() * canvas.width;
                    y = -docType.size; // Start just outside
                    vx = (Math.random() - 0.5) * 0.5; // Slower horizontal drift
                    vy = Math.random() * 0.3 + 0.3; // Slower vertical speed
                    break;
                case 1: // from right
                    x = canvas.width + docType.size; // Start just outside
                    y = Math.random() * canvas.height;
                    vx = -(Math.random() * 0.3 + 0.3);
                    vy = (Math.random() - 0.5) * 0.5;
                    break;
                case 2: // from bottom
                    x = Math.random() * canvas.width;
                    y = canvas.height + docType.size; // Start just outside
                    vx = (Math.random() - 0.5) * 0.5;
                    vy = -(Math.random() * 0.3 + 0.3);
                    break;
                case 3: // from left
                    x = -docType.size; // Start just outside
                    y = Math.random() * canvas.height;
                    vx = Math.random() * 0.3 + 0.3;
                    vy = (Math.random() - 0.5) * 0.5;
                    break;
            }

            return {
                x: x,
                y: y,
                vx: vx,
                vy: vy,
                docType: docType, // Store reference to docType object
                rotation: Math.random() * 360,
                rotationSpeed: (Math.random() - 0.5) * 0.5, // Slower rotation
                alpha: Math.random() * 0.2 + 0.3, // Slightly lower initial alpha
                fadeSpeed: Math.random() * 0.003 + 0.001, // Slower fade
            };
        }

        function initDocuments() {
            // Fill initial documents
            for (let i = 0; i < maxDocuments; i++) {
                documents.push(createDocument());
            }
        }

        function updateDocuments() {
            for (let i = documents.length - 1; i >= 0; i--) {
                const doc = documents[i];

                doc.x += doc.vx;
                doc.y += doc.vy;
                doc.rotation += doc.rotationSpeed;
                doc.alpha -= doc.fadeSpeed;

                // Remove document if it's off screen or fully faded
                if (doc.x < -doc.docType.size * 2 || doc.x > canvas.width + doc.docType.size * 2 ||
                    doc.y < -doc.docType.size * 2 || doc.y > canvas.height + doc.docType.size * 2 ||
                    doc.alpha <= 0) {
                    documents.splice(i, 1);
                }
            }

            // Add new documents only if below maxDocuments and after a certain time
            if (documents.length < maxDocuments && performance.now() - lastSpawnTime > spawnRate) {
                documents.push(createDocument());
                lastSpawnTime = performance.now();
            }
        }

        function drawDocuments() {
            ctx.clearRect(0, 0, canvas.width, canvas.height); // Clear the entire canvas

            for (let doc of documents) {
                ctx.save();
                ctx.translate(doc.x, doc.y);
                ctx.rotate(doc.rotation * Math.PI / 180);
                ctx.globalAlpha = doc.alpha;

                // Draw pre-rendered icon
                const offscreen = offscreenCanvases.get(doc.docType.icon);
                ctx.drawImage(offscreen, -offscreen.width / 2, -offscreen.height / 2); // Center the image

                ctx.restore();
            }
        }

        let animationFrameId;

        function animate() {
            updateDocuments();
            drawDocuments();
            animationFrameId = requestAnimationFrame(animate);
        }

        // Initialize canvas and pre-render icons
        resizeCanvas();
        preloadOffscreenCanvases();
        initDocuments();
        animate();

        window.addEventListener('resize', () => {
            // Debounce resize events to prevent excessive recalculations
            clearTimeout(window.resizeTimeout);
            window.resizeTimeout = setTimeout(() => {
                resizeCanvas();
            }, 250); // Adjust debounce time as needed
        });

        // Form handling
        const loginForm = document.getElementById('loginForm');
        const loadingSpinner = document.querySelector('.loading-spinner');
        const btnText = document.querySelector('.btn-text');

        loginForm.addEventListener('submit', async (e) => {
            // No e.preventDefault() here if PHP handles submission directly
            // The loading state should be managed differently if PHP redirects on success

            // This client-side loading visual is primarily for demonstrating an immediate feedback.
            // If PHP redirects instantly, this part might not be visible.
            // You might want to remove or adjust this if the page reloads quickly on submission.
            loadingSpinner.style.display = 'inline-block';
            btnText.style.display = 'none';

            // No need for setTimeout if PHP handles the redirection.
            // The page will reload/redirect upon PHP's header() call.
        });

        // Ripple effect for buttons
        document.querySelectorAll('.btn-primary').forEach(button => {
            button.addEventListener('click', function(e) {
                const rect = this.getBoundingClientRect();
                const ripple = document.createElement('span');
                const size = Math.max(rect.width, rect.height);
                const x = e.clientX - rect.left - size / 2;
                const y = e.clientY - rect.top - size / 2;

                ripple.style.width = ripple.style.height = size + 'px';
                ripple.style.left = x + 'px';
                ripple.style.top = y + 'px';
                ripple.classList.add('ripple');

                this.appendChild(ripple);

                setTimeout(() => {
                    ripple.remove();
                }, 600);
            });
        });

        // Input focus animations
        document.querySelectorAll('.form-control').forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.classList.add('focused');
            });

            input.addEventListener('blur', function() {
                if (!this.value) {
                    this.parentElement.classList.remove('focused');
                }
            });
        });

        // Mouse interaction - create burst of documents
        canvas.addEventListener('click', (e) => {
            const rect = canvas.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;

            // Create burst of documents at click position
            for (let i = 0; i < 3; i++) { // Reduced burst count
                const docType = documentTypes[Math.floor(Math.random() * documentTypes.length)];
                documents.push({
                    x: x + (Math.random() - 0.5) * 30, // Smaller spread
                    y: y + (Math.random() - 0.5) * 30,
                    vx: (Math.random() - 0.5) * 2, // Slower burst velocity
                    vy: (Math.random() - 0.5) * 2,
                    docType: docType,
                    rotation: Math.random() * 360,
                    rotationSpeed: (Math.random() - 0.5) * 4, // Slower rotation speed
                    alpha: 0.8, // Slightly lower initial alpha
                    fadeSpeed: 0.008, // Slower fade
                });
            }
        });
    </script>
    <script>
  document.addEventListener('DOMContentLoaded', () => {
    const mensaje = document.getElementById('mensajeFlash');
    if (mensaje) {
      setTimeout(() => {
        // Usa Bootstrap 5 para ocultar
        const alert = bootstrap.Alert.getOrCreateInstance(mensaje);
        alert.close();
      }, 5000);
    }
  });
</script>

</body>

</html>