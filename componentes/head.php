<?php

require '../conexion/conexion.php';
session_start();
if (!isset($_SESSION['usuario'])) {

    header('Location:../index.php');
}

$usuario = $_SESSION['usuario'];

$usuario_id = $_SESSION['codigo'];






// cogiendo los datos por meses
$sql_enero = "SELECT * FROM entradas WHERE FechaRegistro BETWEEN '2023-01-01' AND '2023-01-31'";
$resultado_enero = mysqli_query($conn, $sql_enero);
$numero_enero = mysqli_num_rows($resultado_enero);

$sql_enero2 = "SELECT * FROM salidas WHERE FechaRegistro BETWEEN '2023-01-01' AND '2023-01-31'";
$resultado_salidas2 = mysqli_query($conn, $sql_enero2);
$numero_enero2 = mysqli_num_rows($resultado_salidas2);

// febrero
$sql_febrero = "SELECT * FROM entradas WHERE FechaRegistro BETWEEN '2023-02-01' AND '2023-02-31'";
$resultado_febrero = mysqli_query($conn, $sql_febrero);
$numero_febrero = mysqli_num_rows($resultado_febrero);

$sql_febrero2 = "SELECT * FROM salidas WHERE FechaRegistro BETWEEN '2023-02-01' AND '2023-02-31'";
$resultado_febrero2 = mysqli_query($conn, $sql_febrero2);
$numero_febrero2 = mysqli_num_rows($resultado_febrero2);

// Marzo
$sql_marzo = "SELECT * FROM entradas WHERE FechaRegistro BETWEEN '2023-03-01' AND '2023-03-31'";
$resultado_marzo = mysqli_query($conn, $sql_marzo);
$numero_marzo = mysqli_num_rows($resultado_marzo);

$sql_marzo2 = "SELECT * FROM salidas WHERE FechaRegistro BETWEEN '2023-03-01' AND '2023-03-31'";
$resultado_marzo2 = mysqli_query($conn, $sql_marzo2);
$numero_marzo2 = mysqli_num_rows($resultado_marzo2);



// ABRIL
$sql_abril = "SELECT * FROM entradas WHERE FechaRegistro BETWEEN '2023-04-01' AND '2023-04-31'";
$resultado_abril = mysqli_query($conn, $sql_abril);
$numero_abril = mysqli_num_rows($resultado_abril);

$sql_abril2 = "SELECT * FROM salidas WHERE FechaRegistro BETWEEN '2023-04-01' AND '2023-04-31'";
$resultado_abril2 = mysqli_query($conn, $sql_abril2);
$numero_abril2 = mysqli_num_rows($resultado_abril2);

// MAYO
$sql_mayo = "SELECT * FROM entradas WHERE FechaRegistro BETWEEN '2023-05-01' AND '2023-05-31'";
$resultado_mayo = mysqli_query($conn, $sql_mayo);
$numero_mayo = mysqli_num_rows($resultado_mayo);

$sql_mayo2 = "SELECT * FROM salidas WHERE FechaRegistro BETWEEN '2023-05-01' AND '2023-05-31'";
$resultado_mayo2 = mysqli_query($conn, $sql_mayo2);
$numero_mayo2 = mysqli_num_rows($resultado_mayo2);

// JUNIO
$sql_junio = "SELECT * FROM entradas WHERE FechaRegistro BETWEEN '2023-06-01' AND '2023-06-31'";
$resultado_junio = mysqli_query($conn, $sql_junio);
$numero_junio = mysqli_num_rows($resultado_junio);

$sql_junio2 = "SELECT * FROM salidas WHERE FechaRegistro BETWEEN '2023-06-01' AND '2023-06-31'";
$resultado_junio2 = mysqli_query($conn, $sql_junio2);
$numero_junio2 = mysqli_num_rows($resultado_junio2);

// JULIO
$sql_julio = "SELECT * FROM entradas WHERE FechaRegistro BETWEEN '2023-07-01' AND '2023-07-31'";
$resultado_julio = mysqli_query($conn, $sql_julio);
$numero_julio = mysqli_num_rows($resultado_julio);

$sql_julio2 = "SELECT * FROM salidas WHERE FechaRegistro BETWEEN '2023-07-01' AND '2023-07-31'";
$resultado_julio2 = mysqli_query($conn, $sql_julio2);
$numero_julio2 = mysqli_num_rows($resultado_julio2);


// AGOSTO
$sql_agosto = "SELECT * FROM entradas WHERE FechaRegistro BETWEEN '2023-08-01' AND '2023-08-31'";
$resultado_agosto = mysqli_query($conn, $sql_agosto);
$numero_agosto = mysqli_num_rows($resultado_agosto);

$sql_agosto2 = "SELECT * FROM salidas WHERE FechaRegistro BETWEEN '2023-08-01' AND '2023-08-31'";
$resultado_agosto2 = mysqli_query($conn, $sql_agosto2);
$numero_agosto2 = mysqli_num_rows($resultado_agosto2);


// SEPTIEMBRE
$sql_septiembre = "SELECT * FROM entradas WHERE FechaRegistro BETWEEN '2023-09-01' AND '2023-09-31'";
$resultado_septiembre = mysqli_query($conn, $sql_septiembre);
$numero_septiembre = mysqli_num_rows($resultado_septiembre);

$sql_septiembre2 = "SELECT * FROM salidas WHERE FechaRegistro BETWEEN '2023-09-01' AND '2023-09-31'";
$resultado_septiembre2 = mysqli_query($conn, $sql_septiembre2);
$numero_septiembre2 = mysqli_num_rows($resultado_septiembre2);

// OCTUBRE
$sql_octubre = "SELECT * FROM entradas WHERE FechaRegistro BETWEEN '2023-10-01' AND '2023-10-31'";
$resultado_octubre = mysqli_query($conn, $sql_octubre);
$numero_octubre = mysqli_num_rows($resultado_octubre);

$sql_octubre2 = "SELECT * FROM salidas WHERE FechaRegistro BETWEEN '2023-10-01' AND '2023-10-31'";
$resultado_octubre2 = mysqli_query($conn, $sql_octubre2);
$numero_octubre2 = mysqli_num_rows($resultado_octubre2);

// NOVIEMBRE
$sql_noviembre = "SELECT * FROM entradas WHERE FechaRegistro BETWEEN '2023-11-01' AND '2023-11-31'";
$resultado_noviembre = mysqli_query($conn, $sql_noviembre);
$numero_noviembre = mysqli_num_rows($resultado_noviembre);

$sql_noviembre2 = "SELECT * FROM salidas WHERE FechaRegistro BETWEEN '2023-11-01' AND '2023-11-31'";
$resultado_noviembre2 = mysqli_query($conn, $sql_noviembre2);
$numero_noviembre2 = mysqli_num_rows($resultado_noviembre2);


// DICIEMBRE
$sql_diciembre = "SELECT * FROM entradas WHERE FechaRegistro BETWEEN '2023-12-01' AND '2023-12-31'";
$resultado_diciembre = mysqli_query($conn, $sql_diciembre);
$numero_diciembre = mysqli_num_rows($resultado_diciembre);

$sql_diciembre2 = "SELECT * FROM salidas WHERE FechaRegistro BETWEEN '2023-12-01' AND '2023-12-31'";
$resultado_diciembre2 = mysqli_query($conn, $sql_diciembre2);
$numero_diciembre2 = mysqli_num_rows($resultado_diciembre2);






// filtrando los meses para cada usuario
$sql_enero4 = "SELECT * FROM entradas WHERE FechaRegistro BETWEEN '2023-01-01' AND '2023-01-31' AND Usuario=$usuario_id";
$resultado_enero4 = mysqli_query($conn, $sql_enero4);
$numero_enero4 = mysqli_num_rows($resultado_enero4);

$sql_enero5 = "SELECT * FROM salidas WHERE FechaRegistro BETWEEN '2023-01-01' AND '2023-01-31' AND Usuario=$usuario_id";
$resultado_salidas5 = mysqli_query($conn, $sql_enero5);
$numero_enero5 = mysqli_num_rows($resultado_salidas5);

// febrero
$sql_febrero4 = "SELECT * FROM entradas WHERE FechaRegistro BETWEEN '2023-02-01' AND '2023-02-31' AND Usuario=$usuario_id";
$resultado_febrero4 = mysqli_query($conn, $sql_febrero4);
$numero_febrero4 = mysqli_num_rows($resultado_febrero4);

$sql_febrero5 = "SELECT * FROM salidas WHERE FechaRegistro BETWEEN '2023-02-01' AND '2023-02-31' AND Usuario=$usuario_id";
$resultado_febrero5 = mysqli_query($conn, $sql_febrero5);
$numero_febrero5 = mysqli_num_rows($resultado_febrero5);

// Marzo
$sql_marzo4 = "SELECT * FROM entradas WHERE FechaRegistro BETWEEN '2023-03-01' AND '2023-03-31' AND Usuario=$usuario_id";
$resultado_marzo4 = mysqli_query($conn, $sql_marzo4);
$numero_marzo4 = mysqli_num_rows($resultado_marzo4);

$sql_marzo5 = "SELECT * FROM salidas WHERE FechaRegistro BETWEEN '2023-03-01' AND '2023-03-31' AND Usuario=$usuario_id";
$resultado_marzo5 = mysqli_query($conn, $sql_marzo5);
$numero_marzo5 = mysqli_num_rows($resultado_marzo5);



// ABRIL
$sql_abril4 = "SELECT * FROM entradas WHERE FechaRegistro BETWEEN '2023-04-01' AND '2023-04-31' AND Usuario=$usuario_id";
$resultado_abril4 = mysqli_query($conn, $sql_abril4);
$numero_abril4 = mysqli_num_rows($resultado_abril4);

$sql_abril5 = "SELECT * FROM salidas WHERE FechaRegistro BETWEEN '2023-04-01' AND '2023-04-31' AND Usuario=$usuario_id";
$resultado_abril5 = mysqli_query($conn, $sql_abril5);
$numero_abril5 = mysqli_num_rows($resultado_abril5);

// MAYO
$sql_mayo4 = "SELECT * FROM entradas WHERE FechaRegistro BETWEEN '2023-05-01' AND '2023-05-31' AND Usuario=$usuario_id";
$resultado_mayo4 = mysqli_query($conn, $sql_mayo4);
$numero_mayo4 = mysqli_num_rows($resultado_mayo4);

$sql_mayo5 = "SELECT * FROM salidas WHERE FechaRegistro BETWEEN '2023-05-01' AND '2023-05-31' AND Usuario=$usuario_id";
$resultado_mayo5 = mysqli_query($conn, $sql_mayo5);
$numero_mayo5 = mysqli_num_rows($resultado_mayo5);

// JUNIO
$sql_junio4 = "SELECT * FROM entradas WHERE FechaRegistro BETWEEN '2023-06-01' AND '2023-06-31' AND Usuario=$usuario_id";
$resultado_junio4 = mysqli_query($conn, $sql_junio4);
$numero_junio4 = mysqli_num_rows($resultado_junio4);

$sql_junio5 = "SELECT * FROM salidas WHERE FechaRegistro BETWEEN '2023-06-01' AND '2023-06-31' AND Usuario=$usuario_id";
$resultado_junio5 = mysqli_query($conn, $sql_junio5);
$numero_junio5 = mysqli_num_rows($resultado_junio5);

// JULIO
$sql_julio4 = "SELECT * FROM entradas WHERE FechaRegistro BETWEEN '2023-07-01' AND '2023-07-31' AND Usuario=$usuario_id";
$resultado_julio4 = mysqli_query($conn, $sql_julio4);
$numero_julio4 = mysqli_num_rows($resultado_julio4);

$sql_julio5 = "SELECT * FROM salidas WHERE FechaRegistro BETWEEN '2023-07-01' AND '2023-07-31' AND Usuario=$usuario_id";
$resultado_julio5 = mysqli_query($conn, $sql_julio5);
$numero_julio5 = mysqli_num_rows($resultado_julio5);


// AGOSTO
$sql_agosto4 = "SELECT * FROM entradas WHERE FechaRegistro BETWEEN '2023-08-01' AND '2023-08-31' AND Usuario=$usuario_id";
$resultado_agosto4 = mysqli_query($conn, $sql_agosto4);
$numero_agosto4 = mysqli_num_rows($resultado_agosto4);

$sql_agosto5 = "SELECT * FROM salidas WHERE FechaRegistro BETWEEN '2023-08-01' AND '2023-08-31' AND Usuario=$usuario_id";
$resultado_agosto5 = mysqli_query($conn, $sql_agosto5);
$numero_agosto5 = mysqli_num_rows($resultado_agosto5);


// SEPTIEMBRE
$sql_septiembre4 = "SELECT * FROM entradas WHERE FechaRegistro BETWEEN '2023-09-01' AND '2023-09-31' AND Usuario=$usuario_id";
$resultado_septiembre4 = mysqli_query($conn, $sql_septiembre4);
$numero_septiembre4 = mysqli_num_rows($resultado_septiembre4);

$sql_septiembre5 = "SELECT * FROM salidas WHERE FechaRegistro BETWEEN '2023-09-01' AND '2023-09-31' AND Usuario=$usuario_id";
$resultado_septiembre5 = mysqli_query($conn, $sql_septiembre5);
$numero_septiembre5 = mysqli_num_rows($resultado_septiembre5);

// OCTUBRE
$sql_octubre4 = "SELECT * FROM entradas WHERE FechaRegistro BETWEEN '2023-10-01' AND '2023-10-31' AND Usuario=$usuario_id";
$resultado_octubre4 = mysqli_query($conn, $sql_octubre4);
$numero_octubre4 = mysqli_num_rows($resultado_octubre4);

$sql_octubre5 = "SELECT * FROM salidas WHERE FechaRegistro BETWEEN '2023-10-01' AND '2023-10-31' AND Usuario=$usuario_id";
$resultado_octubre5 = mysqli_query($conn, $sql_octubre5);
$numero_octubre5 = mysqli_num_rows($resultado_octubre5);

// NOVIEMBRE
$sql_noviembre4 = "SELECT * FROM entradas WHERE FechaRegistro BETWEEN '2023-11-01' AND '2023-11-31' AND Usuario=$usuario_id";
$resultado_noviembre4 = mysqli_query($conn, $sql_noviembre4);
$numero_noviembre4 = mysqli_num_rows($resultado_noviembre4);

$sql_noviembre5 = "SELECT * FROM salidas WHERE FechaRegistro BETWEEN '2023-11-01' AND '2023-11-31' AND Usuario=$usuario_id";
$resultado_noviembre5 = mysqli_query($conn, $sql_noviembre5);
$numero_noviembre5 = mysqli_num_rows($resultado_noviembre5);


// DICIEMBRE
$sql_diciembre4 = "SELECT * FROM entradas WHERE FechaRegistro BETWEEN '2023-12-01' AND '2023-12-31' AND Usuario=$usuario_id";
$resultado_diciembre4 = mysqli_query($conn, $sql_diciembre4);
$numero_diciembre4 = mysqli_num_rows($resultado_diciembre4);

$sql_diciembre5 = "SELECT * FROM salidas WHERE FechaRegistro BETWEEN '2023-12-01' AND '2023-12-31' AND Usuario=$usuario_id";
$resultado_diciembre5 = mysqli_query($conn, $sql_diciembre5);
$numero_diciembre5 = mysqli_num_rows($resultado_diciembre5);





// trayendo todas las entradas y salidas para el grafico circular
$sql_entradas_total = "SELECT * FROM entradas WHERE  Usuario=$usuario_id";
$resultado_entradas_total = mysqli_query($conn, $sql_entradas_total);
$numero_entradas_total = mysqli_num_rows($resultado_entradas_total);

$sql_salidas_total = "SELECT * FROM salidas WHERE  Usuario=$usuario_id";
$resultado_salidas_total = mysqli_query($conn, $sql_salidas_total);
$numero_salidas_total = mysqli_num_rows($resultado_salidas_total);



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Star Admin2 </title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../vendors/feather/feather.css">
    <link rel="stylesheet" href="../vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../vendors/typicons/typicons.css">
    <link rel="stylesheet" href="../vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- <link rel="stylesheet" href="../vendors/datatables.net-bs4/dataTables.bootstrap4.css"> -->
    <link rel="stylesheet" href="../js/select.dataTables.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="../css/vertical-layout-light/style.css">
    <!-- estilos personalizados -->
    <link rel="stylesheet" href="../css/estilosPersonalizados.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="../images/favicon.png" />


    <!-- datatables -->
    <!-- <link href="https://cdn.datatables.net/v/dt/dt-1.13.6/datatables.min.css" rel="stylesheet">

    css de datatables 
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css"> -->


    <!-- css datables nuevo -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
    <script src="../ckeditor/ckeditor.js"></script>
    <script src="../js/jquery.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>



    <!-- graficas  -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['bar']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Meses', 'Entradas', 'Salidas'],
                ['Enero', <?= $numero_enero;   ?>, <?= $numero_enero2;   ?>],
                ['Febrero', <?= $numero_febrero;   ?>, <?= $numero_febrero2;   ?>],
                ['Marzo', <?= $numero_marzo;   ?>, <?= $numero_marzo2;   ?>],
                ['Abril', <?= $numero_abril;   ?>, <?= $numero_abril2;   ?>],
                ['Mayo', <?= $numero_mayo;   ?>, <?= $numero_mayo2;   ?>],
                ['Junio', <?= $numero_junio;   ?>, <?= $numero_junio2;   ?>],
                ['Julio', <?= $numero_julio;   ?>, <?= $numero_julio2;   ?>],
                ['Agosto', <?= $numero_agosto;   ?>, <?= $numero_agosto2;   ?>],
                ['Septiembre', <?= $numero_septiembre;   ?>, <?= $numero_septiembre2;   ?>],
                ['Octubre', <?= $numero_octubre;   ?>, <?= $numero_octubre2;   ?>],
                ['Noviembre', <?= $numero_noviembre;   ?>, <?= $numero_noviembre2;   ?>],
                ['Diciembre', <?= $numero_diciembre;   ?>, <?= $numero_diciembre2;   ?>]
            ]);

            var options = {
                chart: {
                    // title: 'Company Performance',
                    // subtitle: 'Sales, Expenses, and Profit: 2014-2017',
                }
            };

            var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

            chart.draw(data, google.charts.Bar.convertOptions(options));
        }
    </script>


    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['bar']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Meses', 'Entradas', 'Salidas'],
                ['Enero', <?= $numero_enero4;   ?>, <?= $numero_enero5;   ?>],
                ['Febrero', <?= $numero_febrero4;   ?>, <?= $numero_febrero5;   ?>],
                ['Marzo', <?= $numero_marzo4;   ?>, <?= $numero_marzo5;   ?>],
                ['Abril', <?= $numero_abril4;   ?>, <?= $numero_abril5;   ?>],
                ['Mayo', <?= $numero_mayo4;   ?>, <?= $numero_mayo5;   ?>],
                ['Junio', <?= $numero_junio4;   ?>, <?= $numero_junio5;   ?>],
                ['Julio', <?= $numero_julio4;   ?>, <?= $numero_julio5;   ?>],
                ['Agosto', <?= $numero_agosto4;   ?>, <?= $numero_agosto5;   ?>],
                ['Septiembre', <?= $numero_septiembre4;   ?>, <?= $numero_septiembre5;   ?>],
                ['Octubre', <?= $numero_octubre4;   ?>, <?= $numero_octubre5;   ?>],
                ['Noviembre', <?= $numero_noviembre4;   ?>, <?= $numero_noviembre5;   ?>],
                ['Diciembre', <?= $numero_diciembre4;   ?>, <?= $numero_diciembre5;   ?>]
            ]);

            var options = {
                chart: {
                    // title: 'Company Performance',
                    // subtitle: 'Sales, Expenses, and Profit: 2014-2017',
                }
            };

            var chart = new google.charts.Bar(document.getElementById('columnchart_material2'));

            chart.draw(data, google.charts.Bar.convertOptions(options));
        }
    </script>


    <!-- grafico circular -->

    <script type="text/javascript">
        google.charts.load("current", {
            packages: ["corechart"]
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Language', 'Speakers (in millions)'],
                ['Entradas', <?= $numero_entradas_total;   ?>],
                ['Salidas', <?= $numero_salidas_total;   ?>]
            ]);

            var options = {
                legend: 'none',
                pieSliceText: 'label',
                pieStartAngle: 100,
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));
            chart.draw(data, options);
        }
    </script>



</head>

<body>