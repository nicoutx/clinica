<?php
  require 'db.php';

  $message = '';

  if (!empty($_POST['usuario']) && !empty($_POST['pass']) && !empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['email'])) {
    $sql = "INSERT INTO usuarios (username, password, nombres, apellidos, email) VALUES (:usuario, :pass, :nombre, :apellido, :email)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':usuario', $_POST['usuario']);
    $password = password_hash($_POST['pass'], PASSWORD_BCRYPT);
    $stmt->bindParam(':pass', $password);
    $stmt->bindParam(':nombre', $_POST['nombre']);
    $stmt->bindParam(':apellido', $_POST['apellido']);
    $stmt->bindParam(':email', $_POST['email']);

    if ($stmt->execute()) {
      $message = 'Usuario creado de forma exitosa';
    } else {
      $message = 'A ocurrido un error creando su contraseña';
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


<!-- Custom styles for this template -->
<link href="css/login.css" rel="stylesheet">

</head>
<body class="text-center">
<main class="form-signin">


<form action="signup.php" method="POST">
<img class="mb-4" src="img/Logo-Web-colores.png" alt="">
<h1 class="h3 mb-3 fw-normal"><b>Crear Cuenta</b></h1>

<?php if(!empty($message)): ?>
  <p> <?= $message ?></p>
<?php endif; ?>


<div class="form-floating mb-3">
  <input type="text" class="form-control" id="floatingInput" placeholder="Nombre" name="nombre" required>
  <label for="floatingInput">Nombre</label>
</div>
<div class="form-floating mb-3">
  <input type="text" class="form-control" id="floatingInput" placeholder="Apellido" name="apellido" required>
  <label for="floatingInput">Apellido</label>
</div>
<div class="form-floating mb-3">
  <input type="email" class="form-control" id="floatingInput" placeholder="Correo Electrónico" name="email" required>
  <label for="floatingInput">Correo Electrónico</label>
</div>
<div class="form-floating mb-3">
  <input type="text" class="form-control" id="floatingInput" placeholder="Usuario" name="usuario" required>
  <label for="floatingInput">Nombre de Usuario</label>
</div>
<div class="form-floating">
  <input type="password" class="form-control" id="floatingPassword" placeholder="Contraseña" name="pass" required>
  <label for="floatingPassword">Contraseña</label>
</div>

<div class="checkbox mb-3">
  <label>
    <input type="checkbox" value="condiciones" required> Acepto los Términos y Condiciones
  </label>
</div>
<button class="w-100 btn btn-lg btn-primary" type="submit">Registrar</button>
<hr>
  <div class="text-center">
    <a class="small" href="login.php">Iniciar Sesión</a>
  </div>
<p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
</form>
</main>
</body>
</html>