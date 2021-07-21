<!--
  NICOLÁS URBINA TAPIA
  IPP 2021
  INGENIERÍA EN INFORMÁTICA
-->

<!-- CONEXIÓN DE SESIÓN CON BASE DE DATOS -->

<?php
  session_start();

  require 'db.php';

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id_usuario, username, password FROM usuarios WHERE id_usuario = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
      $user = $results;
    }
  }
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

<header>

  <?php include('header.php') ?>  

</header>

    <!-- DECLARACIÓN DE VARIABLES -->
    <?php
    $parrafo1 = '<p>Centro Médico Odontológico Integral de primer nivel, con el cual poder cubrir las necesidades de nuestra población. Nuestro Centro Médico cuenta con un Pabellón de Cirugía Menor autorizado por la Seremi de Salud, esto significa que, en una sala completamente equipada y estéril, podemos realizar procedimientos invasivos como: cirugías de implantes dentales, exodoncias (extracciones) de terceros molares, cirugías de encías, entre otras.</p>';

    $parrafo2 = '<p>La implantología oral es la especialidad de la Odontología que se encarga de reemplazar los dientes perdidos, ya sea por una infección en las encías o en el hueso o producto de un traumatismo dental, a través de implantes dentales.</p>';

    $parrafo3 = '<p>Se llama endodoncia, de endo (interior) y odontos (diente), a un tipo de tratamiento que se realiza en odontología. Consiste en la extirpación de la pulpa dental y el posterior relleno y sellado de la cavidad pulpar con un material inerte.</p>';

    $parrafo4 = '<p>La Ortodoncia es una especialidad de la odontología que se encarga de la corrección de los dientes y huesos posicionados incorrectamente.</p>';

    $parrafo5 = '<p>Ante la emergencia sanitaria que estamos enfrentando por la propagación del virus COVID-19, El Centro Médico SEDENT, ha decidido atender sólo casos de <b>URGENCIA</b>, a partir del 23 de Marzo. Todas las citas serán reagendadas tan pronto regresemos a la normalidad.
    <br>
    <br>
    Ante cualquier situación de <b>REAL URGENCIA ODONTOLÓGICA</b>, que requiera atención profesional, estaremos atentos para resolverlas. Se puede comunicar con nosotros a los siguientes números: 342-535469 / 342-506218.
    <br>
    <br>
    Agradecemos su comprensión y colaboración. <b>Cuidémonos entre todos.</b></p>';
    

    $slider = array("img/Clinica1.jpg", "img/Clinica2.jpg", "img/Clinica3.jpg");

    $roundedcircle = array("img/centro1.png", "img/centro2.png");

    $medicos = array("img/mauricio.jpg", "img/sebastian.jpg", "img/rodrigo.jpg");

    ?>

    <!-- SLIDER CENTRO MÉDICO -->
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="<?php echo $slider[0]?>" class="d-block w-100" alt="Clinica 1">
          </div>
          <div class="carousel-item">
            <img src="<?php echo $slider[1]?>" class="d-block w-100" alt="Clinica 2">
          </div>
          <div class="carousel-item">
            <img src="<?php echo $slider[2]?>" class="d-block w-100" alt="Clinica 3">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
    </div>
    <br>

    <!-- NOSOTROS -->
    <section class='us' type='section'>
      <div class="container">
        <div id="nosotros" class="main row">
          <article class="nosotros col-xs-12 col-sm-8 col-md-9 col-lg-9">
            <p>
              <h1><b>Nosotros</b></h1>
              <?php
              echo $parrafo1;
              ?>
            </p>
        </article>
        <div class="align-self-center col-xs-12 col-sm-4 col-md-3 col-lg-3">
          <img src="<?php echo $roundedcircle[0]?>" class="rounded-circle" alt="Cinque Terre">
          <br>
          <br>
          <img src="<?php echo $roundedcircle[1]?>" class="rounded-circle" alt="Cinque Terre">
        </div>       
    </section>

    <!-- SERVICIOS DEL CENTRO MÉDICO -->
    <section>
    <div class="container">
    <div id="servicios" class="med"> 
        <h1><b>Nuestros Servicios</b></h1>
      </div>
      <br>
      <div class="row">     
        <div class="implantes col-xs-12 col-sm-4 col-md-4 col-lg-4">
          <h4><b>Implantología</b></h4>
          <?php echo $parrafo2; ?>
        </div>
        <div class="endodoncia col-xs-12 col-sm-4 col-md-4 col-lg-4">
          <h4><b>Endodoncia</b></h4>
          <?php echo $parrafo3; ?>
        </div>
        <div class="ortodoncia col-xs-12 col-sm-4 col-md-4 col-lg-4">
          <h4><b>Ortodoncia</b></h4>
          <?php echo $parrafo4; ?>
        </div>
      </div>                               
    </div>
    </section>

    <!-- EQUIPO MÉDICO -->
    <section>
    <div class="container">
    <div id="medicos" class="row">
        <h1><b>Nuestro Equipo</b></h1>
      </div>
      <br>
      <div class="row" >
       <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
         <h4>Dr. Mauricio Sepulveda</h4>
          <img src="<?php echo $medicos[0]?>" class="rounded" alt="Cinque Terre">
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
          <h4>Dr. Sebastian Sepulveda</h4>
          <img src="<?php echo $medicos[1]?>" class="rounded" alt="Cinque Terre">
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
          <h4>Dr. Hernán Cataldo</h4>
          <img src="<?php echo $medicos[2]?>" class="rounded" alt="Cinque Terre">
        </div>                          
      </div>
    </div>
    </section>

  <!-- INFORMACIÓN ATENCIÓN COVID -->
  <section>
    <div class="container">
      <div class="covid">
          <p>
            <h1><b>Comunicado COVID-19</b></h1>
            <?php echo $parrafo5; ?>
          </p>    
  </section>

  <!-- FOOTER -->
  <footer>
    <div footer>
      <?php include('footer.php'); ?>
    </div>
  </footer> 


    <!-- Optional JavaScript; choose one of the two! -->
    
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>
