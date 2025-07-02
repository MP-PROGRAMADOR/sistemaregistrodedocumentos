<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración - Sistema de Gestión Documental</title>
    
    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.css" rel="stylesheet">
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Chart.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
    
    <style>
        :root {
            --primary-color: #1976d2;
            --secondary-color: #424242;
            --success-color: #4caf50;
            --warning-color: #ff9800;
            --danger-color: #f44336;
            --sidebar-width: 280px;
        }

        body {
            background-color: #f8f9fa;
            font-family: 'Roboto', sans-serif;
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: var(--sidebar-width);
            background: linear-gradient(135deg, var(--primary-color) 0%, #1565c0 100%);
            z-index: 1000;
            transition: all 0.3s ease;
            overflow-y: auto;
        }

        .sidebar-header {
            padding: 1.5rem;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        .sidebar-brand {
            color: white;
            font-size: 1.5rem;
            font-weight: 600;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .sidebar-nav {
            padding: 1rem 0;
        }

        .nav-item {
            margin: 0.25rem 1rem;
        }

        .nav-link {
            color: rgba(255,255,255,0.8);
            padding: 0.75rem 1rem;
            border-radius: 0.5rem;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            text-decoration: none;
        }

        .nav-link:hover,
        .nav-link.active {
            background-color: rgba(255,255,255,0.1);
            color: white;
            transform: translateX(5px);
        }

        .main-content {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
            transition: all 0.3s ease;
        }

        .top-navbar {
            background: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 1rem 2rem;
            margin-bottom: 2rem;
        }

        .stats-card {
            background: white;
            border-radius: 1rem;
            padding: 1.5rem;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
            border: none;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            height: 100%;
        }

        .stats-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 30px rgba(0,0,0,0.12);
        }

        .stats-icon {
            width: 60px;
            height: 60px;
            border-radius: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: white;
        }

        .chart-container {
            background: white;
            border-radius: 1rem;
            padding: 1.5rem;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
            margin-bottom: 2rem;
        }

        .data-table {
            background: white;
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        }

        .table-header {
            background: linear-gradient(135deg, var(--primary-color) 0%, #1565c0 100%);
            color: white;
            padding: 1.5rem;
            margin: 0;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color) 0%, #1565c0 100%);
            border: none;
            border-radius: 0.5rem;
            padding: 0.75rem 1.5rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(25, 118, 210, 0.4);
        }

        .badge-status {
            padding: 0.5rem 1rem;
            border-radius: 50px;
            font-weight: 500;
            font-size: 0.875rem;
        }

        .modal-content {
            border-radius: 1rem;
            border: none;
            box-shadow: 0 20px 60px rgba(0,0,0,0.15);
        }

        .modal-header {
            border-bottom: 1px solid #e9ecef;
            border-radius: 1rem 1rem 0 0;
        }

        .form-control {
            border-radius: 0.5rem;
            border: 2px solid #e9ecef;
            padding: 0.75rem 1rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(25, 118, 210, 0.25);
        }

        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }
            
            .sidebar.show {
                transform: translateX(0);
            }
            
            .main-content {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <nav class="sidebar">
        <div class="sidebar-header">
            <a href="#" class="sidebar-brand">
                <span class="material-icons">dashboard</span>
                SisDoc Admin
            </a>
        </div>
        <div class="sidebar-nav">
            <div class="nav-item">
                <a href="#dashboard" class="nav-link active" onclick="showSection('dashboard')">
                    <span class="material-icons">dashboard</span>
                    Dashboard
                </a>
            </div>
            <div class="nav-item">
                <a href="#entradas" class="nav-link" onclick="showSection('entradas')">
                    <span class="material-icons">input</span>
                    Entradas
                </a>
            </div>
            <div class="nav-item">
                <a href="#salidas" class="nav-link" onclick="showSection('salidas')">
                    <span class="material-icons">output</span>
                    Salidas
                </a>
            </div>
            <div class="nav-item">
                <a href="#decretos" class="nav-link" onclick="showSection('decretos')">
                    <span class="material-icons">gavel</span>
                    Decretos
                </a>
            </div>
            <div class="nav-item">
                <a href="#pagos" class="nav-link" onclick="showSection('pagos')">
                    <span class="material-icons">payments</span>
                    Pagos
                </a>
            </div>
            <div class="nav-item">
                <a href="#usuarios" class="nav-link" onclick="showSection('usuarios')">
                    <span class="material-icons">people</span>
                    Usuarios
                </a>
            </div>
            <div class="nav-item">
                <a href="#departamentos" class="nav-link" onclick="showSection('departamentos')">
                    <span class="material-icons">business</span>
                    Departamentos
                </a>
            </div>
            <div class="nav-item">
                <a href="#instituciones" class="nav-link" onclick="showSection('instituciones')">
                    <span class="material-icons">account_balance</span>
                    Instituciones
                </a>
            </div>
            <div class="nav-item">
                <a href="#reportes" class="nav-link" onclick="showSection('reportes')">
                    <span class="material-icons">analytics</span>
                    Reportes
                </a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="main-content">
        <!-- Top Navbar -->
        <nav class="top-navbar d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
                <button class="btn btn-link d-md-none me-3" onclick="toggleSidebar()">
                    <span class="material-icons">menu</span>
                </button>
                <h4 class="mb-0 text-secondary">Bienvenido al Panel de Administración</h4>
            </div>
            <div class="d-flex align-items-center gap-3">
                <div class="dropdown">
                    <button class="btn btn-link dropdown-toggle" data-bs-toggle="dropdown">
                        <span class="material-icons">notifications</span>
                        <span class="badge bg-danger position-absolute top-0 start-100 translate-middle">3</span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Nueva entrada registrada</a></li>
                        <li><a class="dropdown-item" href="#">Decreto pendiente de revisión</a></li>
                        <li><a class="dropdown-item" href="#">Pago procesado</a></li>
                    </ul>
                </div>
                <div class="dropdown">
                    <button class="btn btn-link dropdown-toggle d-flex align-items-center gap-2" data-bs-toggle="dropdown">
                        <img src="https://via.placeholder.com/40x40/1976d2/ffffff?text=U" class="rounded-circle" alt="Usuario">
                        <span>Admin Usuario</span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Mi Perfil</a></li>
                        <li><a class="dropdown-item" href="#">Configuración</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Cerrar Sesión</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container-fluid px-4">
            <!-- Dashboard Section -->
            <div id="dashboard" class="section">
                <!-- Stats Cards -->
                <div class="row mb-4">
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="stats-card">
                            <div class="d-flex align-items-center">
                                <div class="stats-icon bg-primary me-3">
                                    <span class="material-icons">input</span>
                                </div>
                                <div>
                                    <h3 class="mb-0">156</h3>
                                    <p class="text-muted mb-0">Entradas</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="stats-card">
                            <div class="d-flex align-items-center">
                                <div class="stats-icon bg-success me-3">
                                    <span class="material-icons">output</span>
                                </div>
                                <div>
                                    <h3 class="mb-0">89</h3>
                                    <p class="text-muted mb-0">Salidas</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="stats-card">
                            <div class="d-flex align-items-center">
                                <div class="stats-icon bg-warning me-3">
                                    <span class="material-icons">gavel</span>
                                </div>
                                <div>
                                    <h3 class="mb-0">42</h3>
                                    <p class="text-muted mb-0">Decretos</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="stats-card">
                            <div class="d-flex align-items-center">
                                <div class="stats-icon bg-danger me-3">
                                    <span class="material-icons">payments</span>
                                </div>
                                <div>
                                    <h3 class="mb-0">$125,430</h3>
                                    <p class="text-muted mb-0">Pagos Total</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Charts -->
                <div class="row mb-4">
                    <div class="col-lg-8 mb-4">
                        <div class="chart-container">
                            <h5 class="mb-3">Documentos por Mes</h5>
                            <canvas id="documentsChart"></canvas>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4">
                        <div class="chart-container">
                            <h5 class="mb-3">Distribución por Tipo</h5>
                            <canvas id="typeChart"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Recent Activity -->
                <div class="data-table">
                    <h5 class="table-header">Actividad Reciente</h5>
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Fecha</th>
                                    <th>Tipo</th>
                                    <th>Descripción</th>
                                    <th>Usuario</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>2025-07-02</td>
                                    <td><span class="badge bg-primary">Entrada</span></td>
                                    <td>Solicitud de presupuesto departamental</td>
                                    <td>Juan Pérez</td>
                                    <td><span class="badge-status bg-success text-white">Procesado</span></td>
                                </tr>
                                <tr>
                                    <td>2025-07-01</td>
                                    <td><span class="badge bg-success">Salida</span></td>
                                    <td>Respuesta a consulta ciudadana</td>
                                    <td>María García</td>
                                    <td><span class="badge-status bg-warning text-white">Pendiente</span></td>
                                </tr>
                                <tr>
                                    <td>2025-06-30</td>
                                    <td><span class="badge bg-warning">Decreto</span></td>
                                    <td>Decreto municipal N° 2025-001</td>
                                    <td>Carlos López</td>
                                    <td><span class="badge-status bg-success text-white">Aprobado</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Entradas Section -->
            <div id="entradas" class="section" style="display: none;">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2>Gestión de Entradas</h2>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#entradaModal">
                        <span class="material-icons me-2">add</span>
                        Nueva Entrada
                    </button>
                </div>

                <div class="data-table">
                    <h5 class="table-header">Lista de Entradas</h5>
                    <div class="p-3">
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <input type="text" class="form-control" placeholder="Buscar por número de registro...">
                            </div>
                            <div class="col-md-3">
                                <select class="form-select">
                                    <option>Todos los tipos</option>
                                    <option>Solicitud</option>
                                    <option>Oficio</option>
                                    <option>Carta</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <input type="date" class="form-control">
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-outline-primary w-100">Filtrar</button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>N° Registro</th>
                                    <th>Fecha Registro</th>
                                    <th>Tipo Doc.</th>
                                    <th>Descripción</th>
                                    <th>Usuario</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>ENT-2025-001</td>
                                    <td>2025-07-02</td>
                                    <td>Solicitud</td>
                                    <td>Solicitud de información pública</td>
                                    <td>Juan Pérez</td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary me-1">Ver</button>
                                        <button class="btn btn-sm btn-outline-warning me-1">Editar</button>
                                        <button class="btn btn-sm btn-outline-danger">Eliminar</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>ENT-2025-002</td>
                                    <td>2025-07-01</td>
                                    <td>Oficio</td>
                                    <td>Oficio de traspaso presupuestario</td>
                                    <td>María García</td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary me-1">Ver</button>
                                        <button class="btn btn-sm btn-outline-warning me-1">Editar</button>
                                        <button class="btn btn-sm btn-outline-danger">Eliminar</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="p-3">
                        <nav>
                            <ul class="pagination justify-content-center mb-0">
                                <li class="page-item disabled"><a class="page-link" href="#">Anterior</a></li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">Siguiente</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>

            <!-- Other sections will be similar but with different content -->
            <div id="salidas" class="section" style="display: none;">
                <h2>Gestión de Salidas</h2>
                <p class="text-muted">Aquí puedes gestionar todos los documentos de salida del sistema.</p>
            </div>

            <div id="decretos" class="section" style="display: none;">
                <h2>Gestión de Decretos</h2>
                <p class="text-muted">Administra los decretos y resoluciones oficiales.</p>
            </div>

            <div id="pagos" class="section" style="display: none;">
                <h2>Gestión de Pagos</h2>
                <p class="text-muted">Control y seguimiento de todos los pagos realizados.</p>
            </div>

            <div id="usuarios" class="section" style="display: none;">
                <h2>Gestión de Usuarios</h2>
                <p class="text-muted">Administra los usuarios del sistema y sus permisos.</p>
            </div>

            <div id="departamentos" class="section" style="display: none;">
                <h2>Gestión de Departamentos</h2>
                <p class="text-muted">Organiza y gestiona los departamentos de la institución.</p>
            </div>

            <div id="instituciones" class="section" style="display: none;">
                <h2>Gestión de Instituciones</h2>
                <p class="text-muted">Administra las instituciones y organizaciones relacionadas.</p>
            </div>

            <div id="reportes" class="section" style="display: none;">
                <h2>Reportes y Estadísticas</h2>
                <p class="text-muted">Genera reportes detallados y visualiza estadísticas del sistema.</p>
            </div>
        </div>
    </main>

    <!-- Modal for Nueva Entrada -->
    <div class="modal fade" id="entradaModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Nueva Entrada</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Número de Registro</label>
                                <input type="text" class="form-control" placeholder="ENT-2025-XXX">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Fecha de Registro</label>
                                <input type="date" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Tipo de Documento</label>
                                <select class="form-select">
                                    <option>Seleccionar tipo</option>
                                    <option>Solicitud</option>
                                    <option>Oficio</option>
                                    <option>Carta</option>
                                    <option>Memorándum</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Fecha de Firma</label>
                                <input type="date" class="form-control">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Descripción</label>
                            <textarea class="form-control" rows="3" placeholder="Descripción detallada del documento"></textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Palabras Clave</label>
                                <input type="text" class="form-control" placeholder="Separadas por comas">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Importe</label>
                                <input type="text" class="form-control" placeholder="0.00">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Archivo</label>
                            <input type="file" class="form-control">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary">Guardar Entrada</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5.3 JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
    <!-- Material Design Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.js"></script>

    <script>
        // Navigation functionality
        function showSection(sectionId) {
            // Hide all sections
            document.querySelectorAll('.section').forEach(section => {
                section.style.display = 'none';
            });
            
            // Show selected section
            document.getElementById(sectionId).style.display = 'block';
            
            // Update active nav link
            document.querySelectorAll('.nav-link').forEach(link => {
                link.classList.remove('active');
            });
            event.target.classList.add('active');
        }

        // Toggle sidebar for mobile
        function toggleSidebar() {
            document.querySelector('.sidebar').classList.toggle('show');
        }

        // Initialize charts
        document.addEventListener('DOMContentLoaded', function() {
            // Documents Chart
            const documentsCtx = document.getElementById('documentsChart').getContext('2d');
            new Chart(documentsCtx, {
                type: 'line',
                data: {
                    labels: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul'],
                    datasets: [{
                        label: 'Entradas',
                        data: [12, 19, 15, 25, 22, 30, 28],
                        borderColor: '#1976d2',
                        backgroundColor: 'rgba(25, 118, 210, 0.1)',
                        tension: 0.4
                    }, {
                        label: 'Salidas',
                        data: [8, 15, 12, 18, 16, 22, 20],
                        borderColor: '#4caf50',
                        backgroundColor: 'rgba(76, 175, 80, 0.1)',
                        tension: 0.4
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            // Type Distribution Chart
            const typeCtx = document.getElementById('typeChart').getContext('2d');
            new Chart(typeCtx, {
                type: 'doughnut',
                data: {
                    labels: ['Entradas', 'Salidas', 'Decretos', 'Pagos'],
                    datasets: [{
                        data: [156, 89, 42, 73],
                        backgroundColor: [
                            '#1976d2',
                            '#4caf50',
                            '#ff9800',
                            '#f44336'
                        ]
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'bottom'
                        }
                    }
                }
            });
        });

        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function(event) {
            const sidebar = document.querySelector('.sidebar');
            const toggleBtn = document.querySelector('[onclick="toggleSidebar()"]');
            
            if (window.innerWidth <= 768 && 
                !sidebar.contains(event.target) && 
                !toggleBtn.contains(event.target) &&
                sidebar.classList.contains('show')) {
                sidebar.classList.remove('show');
            }
        });
    </script>
</body>
</html>