<!--
  NICOLÁS URBINA TAPIA
  IPP 2021
  INGENIERÍA EN INFORMÁTICA
-->

<?php session_start(); ?>
 
<!-- Conexión con Base de Datos --> 
<?php require 'db.php'; ?>

<!-- Comprobación Inicio de Sesión --> 

<?php
if (isset($_SESSION['user_id'])) {
  header("Location: index.php");
}

$usuario = $_POST['user'];

if (!empty($_POST['user']) && !empty($_POST['pass'])) {
  $records = $conn->prepare('SELECT id_usuario, username, password FROM usuarios WHERE username = :user');
  $records->bindParam(':user', $_POST['user']);
  $records->execute();
  $results = $records->fetch(PDO::FETCH_ASSOC);

  $message = '';

  if (password_verify($_POST['pass'], $results['password'])) {
    $_SESSION['user_id'] = $results['username'];
    header("Location: index.php");
  }
  else {
    $message = ('La contraseña no es correcta. Compruébala');
  }
}    
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Centro Médico Sedent</title>
</head>
<body>
<link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">
 

<!-- Bootstrap core CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico">
<meta name="theme-color" content="#7952b3">


<style>
  .bd-placeholder-img {
    font-size: 1.125rem;
    text-anchor: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    user-select: none;
  }

  @media (min-width: 768px) {
    .bd-placeholder-img-lg {
      font-size: 3.5rem;
    }
  }
</style>


<!-- Formulario de Login -->
<link href="css/login.css" rel="stylesheet">
</head>

<body class="text-center">

<main class="form-signin">
<form action="login.php" method="POST">
  <img class="mb-4" src="img/Logo-Web-colores.png" alt="">
  <h1 class="h3 mb-3 fw-normal"><b>Ingreso</b></h1>
  
  <!-- Mensaje de Alerta --> 
  <?php if(!empty($message)): ?>
  <p> <?= $message ?></p>
  <?php endif; ?> 


  <div class="form-floating">
    <input type="text" class="form-control" id="floatingInput" placeholder="Usuario" name="user">
    <label for="floatingInput">Usuario</label>
  </div>
  <div class="form-floating">
    <input type="password" class="form-control" id="floatingPassword" placeholder="Contraseña" name="pass">
    <label for="floatingPassword">Contraseña</label>
  </div>
  <div class="checkbox mb-3">
  <label>
    <input type="checkbox" value="remember-me"> Recuérdame
  </label>
  </div>
  <button class="w-100 btn btn-lg btn-primary" type="submit" name="login">Iniciar Sesión</button>
  <hr>
  <div class="text-center">
    <a>¿No tienes una cuenta?</a> <a href="signup.php">Regístrate Aquí!</a>
  </div>
  <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
</form>
</main>
</body>
</html>