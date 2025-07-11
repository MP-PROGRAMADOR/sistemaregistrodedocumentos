<?php

// obteniendo la hora acyaual
date_default_timezone_set('Africa/Malabo');


$hora_actual = date("H");



$hora = date("H:i:s");
$hora2 = 13;
$hora3 = 20;

if ($hora_actual < $hora2) {
    $saludo = "Buenos días";
} else if ($hora_actual > $hora2 and $hora_actual < $hora3) {
    $saludo = "Buenas Tardes";
} else {
    $saludo = "Buenas Noches";
}



// obteniendo los dias del mes
$fecha_actual = ""; #date("d-m-y");


$vector = array(
    1 => $fecha_actual . " Nada nuevo hay bajo el sol, pero cuántas cosas viejas hay que no conocemos.",
    2 => $fecha_actual . " El verdadero amigo es aquel que está a tu lado cuando preferiría estar en otra parte.",
    3 => $fecha_actual . " La sabiduría es la hija de la experiencia.",
    4 => $fecha_actual . " Nunca hay viento favorable para el que no sabe hacia dónde va.",
    6 => $fecha_actual . " El único modo de hacer un gran trabajo es amar lo que haces - Steve Jobs",
    5 => $fecha_actual . " La felicidad es el verdadero sentimiento de plenitud que se consigue con el trabajo duro",
    7 => $fecha_actual . " Sé un punto de referencia de calidad. Algunas personas no están acostumbradas a un ambiente donde la excelencia es aceptada",
    8 => $fecha_actual . " La felicidad es el verdadero sentimiento de plenitud que se consigue con el trabajo duro",
    9 => $fecha_actual . " Si no haces que ocurran  cosas, las cosas te ocurrirán a ti",
    10 => $fecha_actual . " Trabajar en lo correcto es mucho más importante que trabajar duro",
    11 => $fecha_actual . " Los líderes son encantadores, generan mucha empatía, se ponen en el lugar del resto para saber cómo piensa y que le deben decir, utilizan bastante su inteligencia emocional",
    12 => $fecha_actual . " El trabajo obsesivo produce la locura, tanto como la pereza completa, pero con esta combinación se puede vivir",
    13 => $fecha_actual . " En medio de la dificultad yace la oportunidad",
    14 => $fecha_actual . " Los obstáculos son esas cosas espantosas que ves cuando quitas la mirada de tus metas",
    15 => $fecha_actual . " El hombre que mueve montañas comienza cargando pequeñas piedras",
    16 => $fecha_actual . " El fracaso no es lo opuesto al éxito: es parte del éxito",
    17 => $fecha_actual . " La habilidad es lo que eres capaz de hacer. La motivación determina lo que haces. La actitud determina qué tan bien lo haces",
    18 => $fecha_actual . " Somos lo que hacemos repetidamente. La excelencia, entonces, no es un acto, sino un hábito",
    19 => $fecha_actual . " No tienes que mirar toda la escalera. Para empezar, solo concéntrate en dar el primer paso",
    20 => $fecha_actual . " La felicidad no está en la mera posesión del dinero; radica en la alegría del logro, en la emoción del esfuerzo creativo",
    21 => $fecha_actual . " Haz lo único que crees que no puedes hacer. Falla en eso. Intenta otra vez. Hazlo mejor la segunda vez. Las únicas personas que nunca se caen son aquellas que nunca se suben a la cuerda floja",
    22 => $fecha_actual . " Nunca hay tiempo suficiente para hacerlo bien, pero siempre hay tiempo suficiente para hacerlo de nuevo",
    23 => $fecha_actual . " Enfócate en ser productivo en vez de enfocarte en estar ocupado",
    24 => $fecha_actual . " Trabajar en lo correcto es probablemente más importante que trabajar duro",
    25 => $fecha_actual . " El hombre no puede descubrir nuevos océanos a menos que tenga el coraje de perder de vista la costa",
    26 => $fecha_actual . " No aprendes a caminar siguiendo reglas. Aprendes haciendo y cayéndote",
    27 => $fecha_actual . " Los obstáculos no tienen por qué detenerte. Si te topas con una pared, no te des la vuelta y te rindas. Descubre cómo escalarla, atravesarla o sortearla",
    28 => $fecha_actual . " Nadie puede descubrirte hasta que tú lo hagas. Explota tus talentos, habilidades y fortalezas y haz que el mundo se siente y se dé cuenta",
    29 => $fecha_actual . " Si hay algo que te asusta, entonces podría significar que vale la pena intentarlo",
    30 => $fecha_actual . " El trabajo en equipo es el secreto que hace que gente común consiga resultados poco comunes",
);
$numero = rand(1, 30);





?>



<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
        <div class="me-3">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
                <span class="icon-menu"></span>
            </button>
        </div>
        <div class="">
            <a class="navbar-brand brand-logo" href="index.php">
                <img src="../images/LOGO-GRANDE.png" alt="logo" />
            </a>

        </div>
    </div>

    <div class="navbar-menu-wrapper d-flex align-items-top">
        <ul class="navbar-nav">
            <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
                <h1 class="welcome-text"><?php echo $saludo;    ?> <span class="text-black fw-bold"> <?= $usuario;   ?></span></h1>
                <h3 class="welcome-sub-text"><?php echo $fecha_actual;    ?> <?php echo "$vector[$numero] "; ?></h3>
            </li>
        </ul>

        <ul class="navbar-nav ms-auto">
            

            <button class="btn btn-outline-danger d-flex align-items-center btn-sm" data-bs-toggle="modal" data-bs-target="#logoutModal">
                <i class="bi bi-box-arrow-right me-2"></i> Cerrar Sesión
            </button>



            <li class="nav-item dropdown">

            </li>
            <li class="nav-item dropdown d-none d-lg-block user-dropdown">
                <?php
                $sqlPacientes1 = " SELECT  *
FROM usuarios where Id=$usuario_id";

                $pacientes1 = $conn->query($sqlPacientes1);

                $resultado_foto = mysqli_fetch_assoc($pacientes1);


                ?>

                <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                    <img class="img-xs rounded-circle" src="data:image/*;base64,<?= base64_encode($resultado_foto['Foto']); ?>" alt="Profile image"> </a>

                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">






                </div>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
        </button>
    </div>
</nav>


<!-- Modal Cerrar Sesión -->
<!-- Modal Cerrar Sesión -->
<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content rounded-4 shadow-lg border-0">
      <div class="modal-header border-0">
        <h5 class="modal-title fw-bold text-danger" id="logoutModalLabel">
          <i class="bi bi-box-arrow-right me-2"></i> ¿Cerrar Sesión?
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body text-center">
        <img src="data:image/*;base64,<?= base64_encode($resultado_foto['Foto']); ?>" alt="Foto de perfil" class="rounded-circle mb-3 shadow-sm border" width="100" height="100">
        <p class="text-muted mb-0">Hola <?=  $usuario; ?> Estás a punto de cerrar sesión. ¿Deseas continuar?</p>
      </div>
      <div class="modal-footer border-0 justify-content-center">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
          <i class="bi bi-x-circle me-1"></i> Cancelar
        </button>
        <a href="../php/cerrar_sesion.php" class="btn btn-danger">
          <i class="bi bi-box-arrow-right me-1"></i> Cerrar Sesión
        </a>
      </div>
    </div>
  </div>
</div>
