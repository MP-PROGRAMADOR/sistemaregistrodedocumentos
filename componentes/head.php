<?php

require '../conexion/conexion.php';
session_start();
if (!isset($_SESSION['usuario'])) {

    header('Location:../index.php');
}

$usuario = $_SESSION['usuario'];

$usuario_id = $_SESSION['codigo'];











$anio_actual = date("Y");

//grafico por usuario
$entradas_por_mes25 = array_fill(1, 12, 0);
$salidas_por_mes25 = array_fill(1, 12, 0);

// Consultar entradas por mes
$sql_entradas25 = "SELECT MONTH(FechaRegistro) AS mes, COUNT(*) AS total 
                 FROM entradas 
                 WHERE YEAR(FechaRegistro) = $anio_actual 
                 GROUP BY mes";
$res_entradas25 = mysqli_query($conn, $sql_entradas25);
while ($row = mysqli_fetch_assoc($res_entradas25)) {
    $entradas_por_mes25[(int)$row['mes']] = (int)$row['total'];
}

// Consultar salidas por mes
$sql_salidas25 = "SELECT MONTH(FechaRegistro) AS mes, COUNT(*) AS total 
                FROM salidas 
                WHERE YEAR(FechaRegistro) = $anio_actual 
                GROUP BY mes";
$res_salidas25 = mysqli_query($conn, $sql_salidas25);
while ($row = mysqli_fetch_assoc($res_salidas25)) {
    $salidas_por_mes25[(int)$row['mes']] = (int)$row['total'];
}

// Nombres de los meses
$meses = [1 => 'Enero', 2 => 'Febrero', 3 => 'Marzo', 4 => 'Abril', 5 => 'Mayo', 6 => 'Junio',
          7 => 'Julio', 8 => 'Agosto', 9 => 'Septiembre', 10 => 'Octubre', 11 => 'Noviembre', 12 => 'Diciembre'];



// Ahora tienes los conteos por mes en los arrays:
// $numero_entradas['01'], $numero_salidas['01'], ... $numero_entradas['12'], $numero_salidas['12']







//grafico por usuario
$entradas_por_mes = array_fill(1, 12, 0);
$salidas_por_mes = array_fill(1, 12, 0);

// Consultar entradas por mes
$sql_entradas = "SELECT MONTH(FechaRegistro) AS mes, COUNT(*) AS total 
                 FROM entradas 
                 WHERE YEAR(FechaRegistro) = $anio_actual AND Usuario = $usuario_id 
                 GROUP BY mes";
$res_entradas = mysqli_query($conn, $sql_entradas);
while ($row = mysqli_fetch_assoc($res_entradas)) {
    $entradas_por_mes[(int)$row['mes']] = (int)$row['total'];
}

// Consultar salidas por mes
$sql_salidas = "SELECT MONTH(FechaRegistro) AS mes, COUNT(*) AS total 
                FROM salidas 
                WHERE YEAR(FechaRegistro) = $anio_actual AND Usuario = $usuario_id 
                GROUP BY mes";
$res_salidas = mysqli_query($conn, $sql_salidas);
while ($row = mysqli_fetch_assoc($res_salidas)) {
    $salidas_por_mes[(int)$row['mes']] = (int)$row['total'];
}

// Nombres de los meses
$meses = [1 => 'Enero', 2 => 'Febrero', 3 => 'Marzo', 4 => 'Abril', 5 => 'Mayo', 6 => 'Junio',
          7 => 'Julio', 8 => 'Agosto', 9 => 'Septiembre', 10 => 'Octubre', 11 => 'Noviembre', 12 => 'Diciembre'];










// eso en el grafico circular
$anio_actual = date("Y");

// Entradas del año actual
$sql_entradas_total = "SELECT * FROM entradas 
    WHERE YEAR(FechaRegistro) = $anio_actual AND Usuario = $usuario_id";
$resultado_entradas_total = mysqli_query($conn, $sql_entradas_total);
$numero_entradas_total = mysqli_num_rows($resultado_entradas_total);

// Salidas del año actual
$sql_salidas_total = "SELECT * FROM salidas 
    WHERE YEAR(FechaRegistro) = $anio_actual AND Usuario = $usuario_id";
$resultado_salidas_total = mysqli_query($conn, $sql_salidas_total);
$numero_salidas_total = mysqli_num_rows($resultado_salidas_total);


// Entradas del año actual
$sql_entradas_total1 = "SELECT * FROM entradas 
    WHERE YEAR(FechaRegistro) = $anio_actual";
$resultado_entradas_total1 = mysqli_query($conn, $sql_entradas_total1);
$numero_entradas_total1 = mysqli_num_rows($resultado_entradas_total1);

// Salidas del año actual
$sql_salidas_total1 = "SELECT * FROM salidas 
    WHERE YEAR(FechaRegistro) = $anio_actual";
$resultado_salidas_total1 = mysqli_query($conn, $sql_salidas_total1);
$numero_salidas_total1 = mysqli_num_rows($resultado_salidas_total1);



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>TESORERIA </title>
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
    <!-- Bootstrap Icons CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <script src="../ckeditor/ckeditor.js"></script>
    <script src="../js/jquery.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>



    <!-- graficas  -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>




    <style>
        .table th,
        .table td {
            vertical-align: middle;
        }

        .table th {
            font-weight: 600;
        }
    </style>
    <style>
        .bg-light-subtle {
            background-color: #f8f9fa;
            /* más suave que blanco puro */
        }
    </style>



    <style>
        .info-card {
            background: #ffffff;
            border-radius: 20px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05);
            transition: 0.3s ease;
        }

        .info-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.08);
        }

        .info-icon {
            font-size: 2.5rem;
            margin-bottom: 10px;
            display: inline-block;
            padding: 15px;
            border-radius: 50%;
        }

        .bg-entrada {
            background: linear-gradient(135deg, #28a745, #218838);
            color: #fff;
        }

        .bg-salida {
            background: linear-gradient(135deg, #dc3545, #c82333);
            color: #fff;
        }

        .bg-decreto {
            background: linear-gradient(135deg, #ffc107, #e0a800);
            color: #fff;
        }

        .bg-fecha {
            background: #eef0f4;
            color: #343a40;
        }

        .bg-hora {
            background: #f8f9fa;
            color: #495057;
        }

        .info-title {
            font-size: 0.9rem;
            color: #6c757d;
        }

        .info-value {
            font-size: 1.6rem;
            font-weight: 700;
            color: #212529;
        }
    </style>



    <style>
        /* Clases únicas para el modal del cheque */
        .cheque-modal-content {
            border-radius: 1rem;
            /* Bordes más redondeados para el modal */
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
            /* Sombra sutil */
        }

        .cheque-modal-header {
            border-bottom: none;
            padding-bottom: 0;
        }

        .cheque-modal-title {
            font-weight: 600;
            color: #343a40;
        }

        /* El botón de cerrar (btn-close) es una clase de Bootstrap y no se debe modificar */
        .cheque-modal-card {
            background-color: #f8f9fa;
            /* Fondo gris claro para un look moderno */
            border: 1px solid #dee2e6;
            /* Borde suave */
            border-radius: 0.75rem;
            /* Bordes redondeados */
            padding: 2rem;
            box-shadow: 0 0.3rem 0.6rem rgba(0, 0, 0, 0.08);
            /* Sombra sutil */
            position: relative;
            overflow: hidden;
            min-height: 380px;
        }

        .cheque-modal-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(to right, #007bff, #6610f2);
            /* Línea de color superior */
            border-top-left-radius: 0.75rem;
            border-top-right-radius: 0.75rem;
        }

        .cheque-modal-top-section {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 1.5rem;
        }

        .cheque-modal-bank-logo-text {
            font-size: 1.8rem;
            font-weight: bold;
            color: #007bff;
            display: flex;
            align-items: center;
        }

        .cheque-modal-bank-logo-text i {
            font-size: 2.2rem;
            margin-right: 0.8rem;
            color: #0056b3;
        }

        .cheque-modal-ref-info {
            text-align: right;
            font-size: 0.9rem;
            color: #6c757d;
        }

        .cheque-modal-ref-info strong {
            color: #343a40;
        }

        .cheque-modal-payee-amount {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            margin-bottom: 1.5rem;
            padding-bottom: 1rem;
            border-bottom: 1px dashed #ced4da;
        }

        .cheque-modal-payee-details {
            flex-grow: 1;
        }

        .cheque-modal-payee-details p {
            margin-bottom: 0.5rem;
            font-size: 1.1rem;
            color: #343a40;
        }

        .cheque-modal-payee-details strong {
            font-weight: 600;
        }

        .cheque-modal-amount-box {
            font-size: 2.5rem;
            font-weight: bold;
            color: #28a745;
            /* Verde para el importe */
            border: 2px solid #28a745;
            padding: 0.5rem 1.2rem;
            border-radius: 0.5rem;
            background-color: #e9f7ef;
            display: inline-block;
            box-shadow: 0 0.2rem 0.4rem rgba(40, 167, 69, 0.2);
        }

        .cheque-modal-details-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .cheque-modal-detail-item {
            display: flex;
            align-items: center;
            font-size: 0.95rem;
            color: #495057;
        }

        .cheque-modal-detail-item i {
            margin-right: 0.75rem;
            color: #6c757d;
            width: 20px;
            text-align: center;
        }

        .cheque-modal-concept-signature {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            margin-top: 1.5rem;
            padding-top: 1rem;
            border-top: 1px dashed #ced4da;
        }

        .cheque-modal-concept {
            flex-grow: 1;
            font-size: 0.95rem;
            color: #495057;
        }

        .cheque-modal-concept strong {
            display: block;
            margin-bottom: 0.3rem;
        }

        .cheque-modal-signature-area {
            text-align: right;
            margin-left: 2rem;
            flex-shrink: 0;
        }

        .cheque-modal-signature-area span {
            display: block;
            border-top: 1px solid #000;
            padding-top: 0.2rem;
            font-style: italic;
            font-size: 0.9rem;
            color: #444;
            min-width: 180px;
        }

        .cheque-modal-footer-info {
            margin-top: 2rem;
            font-size: 0.8rem;
            color: #888;
            text-align: center;
            padding-top: 1rem;
            border-top: 1px dashed #e9ecef;
        }

        .cheque-modal-footer {
            border-top: none;
            padding-top: 0;
        }
    </style>




    <style>
        /* Clases únicas para el modal del cheque */
        .cheque-modal-content {
            border-radius: 1rem;
            /* Bordes más redondeados para el modal */
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
            /* Sombra sutil */
        }

        .cheque-modal-header {
            border-bottom: none;
            padding-bottom: 0;
        }

        .cheque-modal-title {
            font-weight: 600;
            color: #343a40;
        }

        /* El botón de cerrar (btn-close) es una clase de Bootstrap y no se debe modificar */
        .cheque-modal-card {
            background: linear-gradient(135deg, #f0f2f5 0%, #e0e2e6 100%);
            /* Degradado suave para el fondo del cheque */
            border: 1px solid #dcdcdc;
            border-radius: 0.75rem;
            /* Bordes redondeados para el cheque */
            padding: 1.5rem;
            box-shadow: 0 0.25rem 0.5rem rgba(0, 0, 0, 0.08);
            /* Sombra más pronunciada para el cheque */
            position: relative;
            overflow: hidden;
        }

        .cheque-modal-card::before {
            content: '';
            position: absolute;
            top: -50px;
            left: -50px;
            width: 150px;
            height: 150px;
            background: rgba(255, 255, 255, 0.1);
            transform: rotate(45deg);
            z-index: 0;
        }

        .cheque-modal-cheque-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .cheque-modal-bank-logo {
            font-size: 1.5rem;
            font-weight: bold;
            color: #007bff;
        }

        .cheque-modal-details div {
            display: flex;
            align-items: center;
            margin-bottom: 0.5rem;
            font-size: 0.95rem;
            color: #495057;
        }

        .cheque-modal-details div i {
            margin-right: 0.75rem;
            color: #6c757d;
            width: 20px;
            /* Ancho fijo para los iconos */
            text-align: center;
        }

        .cheque-modal-amount {
            font-size: 1.8rem;
            font-weight: bold;
            color: #28a745;
            /* Color verde para el importe */
            text-align: right;
            margin-top: 1rem;
            padding: 0.5rem 1rem;
            background-color: #e9f7ef;
            border-radius: 0.5rem;
            border: 1px dashed #28a745;
        }

        .cheque-modal-signature {
            text-align: right;
            margin-top: 2rem;
            padding-top: 0.5rem;
            border-top: 1px dashed #adb5bd;
            font-style: italic;
            color: #6c757d;
        }

        .cheque-modal-footer-info {
            font-size: 0.8rem;
            color: #888;
            margin-top: 1.5rem;
            text-align: center;
        }

        .cheque-modal-footer {
            border-top: none;
            padding-top: 0;
        }
    </style>









<script type="text/javascript">
  google.charts.load('current', {'packages':['bar']});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Mes', 'Entradas', 'Salidas'],
      <?php
      foreach ($meses as $num => $nombre) {
          $e = $entradas_por_mes[$num];
          $s = $salidas_por_mes[$num];
          echo "['$nombre', $e, $s],";
      }
      ?>
    ]);

    var options = {
      chart: {
        title: 'Entradas y Salidas por Mes - Año <?= $anio_actual ?>',
      },
      bars: 'vertical',
      height: 400,
      colors: ['#1b9e77', '#d95f02'],
      vAxis: { format: 'decimal' }
    };

    var chart = new google.charts.Bar(document.getElementById('chart_div'));
    chart.draw(data, google.charts.Bar.convertOptions(options));
  }
</script>

<script type="text/javascript">
  google.charts.load('current', {'packages':['bar']});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Mes', 'Entradas', 'Salidas'],
      <?php
      foreach ($meses as $num => $nombre) {
          $e = $entradas_por_mes25[$num];
          $s = $salidas_por_mes25[$num];
          echo "['$nombre', $e, $s],";
      }
      ?>
    ]);

    var options = {
      chart: {
        title: 'Entradas y Salidas por Mes - Año <?= $anio_actual ?>',
      },
      bars: 'vertical',
      height: 400,
      colors: ['#1b9e77', '#d95f02'],
      vAxis: { format: 'decimal' }
    };

    var chart = new google.charts.Bar(document.getElementById('chart_div2'));
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
                ['Tipo', 'Cantidad'],
                ['Entradas', <?= $numero_entradas_total; ?>],
                ['Salidas', <?= $numero_salidas_total; ?>]
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


    <script type="text/javascript">
        google.charts.load("current", {
            packages: ["corechart"]
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Tipo', 'Cantidad'],
                ['Entradas', <?= $numero_entradas_total1; ?>],
                ['Salidas', <?= $numero_salidas_total1; ?>]
            ]);

            var options = {
                legend: 'none',
                pieSliceText: 'label',
                pieStartAngle: 100,
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart1'));
            chart.draw(data, options);
        }
    </script>








</head>

<body>