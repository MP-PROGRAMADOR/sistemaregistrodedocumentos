<?php  

// obteniendo la hora acyaual
date_default_timezone_set('Africa/Malabo');
 
$hora_actual = date("h:i:s");

$hora_temprana=date("13:00:00");

if($hora_actual<$hora_temprana){
    $saludo= "Buenos Dias,";
}else{
    $saludo= "Buenas Tardes,";
}

// obteniendo los dias del mes
$fecha_actual=date("d-m-Y");

$vector = array(
    1 => $fecha_actual . " Nada nuevo hay bajo el sol, pero cuántas cosas viejas hay que no conocemos.",
    2 => $fecha_actual . " El verdadero amigo es aquel que está a tu lado cuando preferiría estar en otra parte.",
    3 => $fecha_actual . " La sabiduría es la hija de la experiencia.",
    4 => $fecha_actual . " Nunca hay viento favorable para el que no sabe hacia dónde va.",
    5 => $fecha_actual . " Señor JHON LE DESEO UN FELIZ DIA",
    );
    $texto= rand(1,5);


?>



<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
        <div class="me-3">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
                <span class="icon-menu"></span>
            </button>
        </div>
        <div>
            <a class="navbar-brand brand-logo" href="index.html">
                <img src="../images/logo.svg" alt="logo" />
            </a>
            <a class="navbar-brand brand-logo-mini" href="index.html">
                <img src="../images/logo-mini.svg" alt="logo" />
            </a>
        </div>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-top">
        <ul class="navbar-nav">
            <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
                <h1 class="welcome-text"><?php echo $saludo;    ?> <span class="text-black fw-bold">John Doe</span></h1>
                <h3 class="welcome-sub-text"><?php echo "$vector[$texto]";    ?></h3>
            </li>
        </ul>
        <ul class="navbar-nav ms-auto">
          
            <li class="nav-item dropdown">
                
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="notificationDropdown">
                   
                </div>
            </li>
           
            <li class="nav-item dropdown d-none d-lg-block user-dropdown">
                <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                    <img class="img-xs rounded-circle" src="../images/faces/face8.jpg" alt="Profile image"> </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                    <div class="dropdown-header text-center">
                        <img class="img-md rounded-circle" src="../images/faces/face8.jpg" alt="Profile image">
                        <p class="mb-1 mt-3 font-weight-semibold"><?php  echo $usuario;     ?></p>
                        <p class="fw-light text-muted mb-0">allenmoreno@gmail.com</p>
                    </div>
                   
                    <a href="../php/cerrar_sesion.php" class="dropdown-item"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Cerrar Sesion</a>
                </div>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
        </button>
    </div>
</nav>