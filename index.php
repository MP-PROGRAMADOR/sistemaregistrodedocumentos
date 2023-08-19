<?php


require 'conexion/conexion.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){

   session_reset();

    $usuario=mysqli_real_escape_string($conn, $_POST['nombre_usuario'] ) ;
    
    $password=mysqli_real_escape_string($conn, $_POST['password'] )  ;



    if(!$usuario){
        echo 'porfavor el usuario es necesario';
    }



    if(!$password){
        echo 'porfavor el password es obligatorio';
    }

    if($usuario!=""){
        $sql="SELECT * FROM usuarios where Nombre='${usuario}'";
        $resultado= mysqli_query($conn,$sql);

       

     

      if($resultado->num_rows){


        // verificar si el password es corecto

        $usuario= mysqli_fetch_assoc($resultado);

        $auth= password_verify($password, $usuario['Pass'] );

        var_dump($auth);

        echo 'usuario verificado';

        if($auth){
            // cuando existe el usuario y la contrasena

        

        $tipo_user=$usuario['Tipo_Usuario'];

        // cuando el nombre de usuario existe

        if($tipo_user=="ADMINISTRADOR"){

            session_start();

            $_SESSION['usuario']=$_POST['nombre_usuario'];
           
           

            header('Location: admin/index.php');

        }


        if($tipo_user=="USUARIO"){
            
            session_start();

           $_SESSION['usuario']=$_POST['usuario'];

            header('Location: ENFERMERA/index.php');

        }
      

        }else{

            echo 'la contrasena es incorecta';
        }



       

      }else{
        echo 'este usuario no existe';
      }




       
        
        }




    }
    








?>




<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Star Admin2 </title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/typicons/typicons.css">
  <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="images/logo.svg" alt="logo">
              </div>
              <h4>Hola! Bienvenid@</h4>
              <h6 class="fw-light">Pon tus datos para continuar.</h6>
              <form class="pt-3" method="POST" action="" autocomplete="off">
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="nombre_usuario" name="nombre_usuario" placeholder="Nombre De Usuario" required>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Tu Contraseña" required>
                </div>
                <div class="mt-3">
                    <input type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"  value="ACCEDER">
                
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                  <a href="#" class="auth-link text-black">Olvidaste tu Contraseña?</a>
                </div>
               
               
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>