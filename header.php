<!--
  NICOLÁS URBINA TAPIA
  IPP 2021
  INGENIERÍA EN INFORMÁTICA
-->

<?php
      session_start(); 
      $nombre = $_SESSION['user_id'];
  
      if(isset($_SESSION['user_id'])){
?>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
 
    <!-- CSS PERSONAL-->
    <link href="css/estilos.css" rel="stylesheet">

    <!-- ICONO PERSONALIZADO NAVEGADOR WEB -->
    <link rel="shortcut icon" href="img/icon.png">
    <title>Centro Médico SEDENT</title>  
  </head>
  
  <body>

     <!-- BARRA DE NAVEGACIÓN -->
     <header id="header">
      <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="img/Logo-Web.png" alt="" width="220" height="70">
              </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#nosotros">Nosotros</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#servicios">Servicios</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#medicos">Equipo Medico</a>
              </li>
              <li class="nav-item dropdown">
              <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: #60269d;">
                Enlaces de Interés
              </a>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <li><a class="dropdown-item" href="https://www.colegiodentistas.cl/inicio/">Colegio de Dentistas</a></li>
                <li><a class="dropdown-item" href="https://sioch.cl/sitio/">Sociedad de Implantología</a></li>
              </ul>

              <li class="nav-item">
               <a>Hola</a> <?php echo $nombre?>
               <a class="nav-link" href="logout.php">Cerrar Sesión</a>
              </li>
            </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
    <?php 
    }else{

        header('Location: login.php');

    }

?>