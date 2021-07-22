<?php
      session_start(); 
      $nombre = $_SESSION['user_id'];
  
      if(isset($_SESSION['user_id'])){
?>

<body>
<footer>
    <div class="container">
        <a><b>Diseñado por Nicolás Urbina Tapia | Centro Medico SEDENT</b></a>
    </div>
</footer>
<?php 
    }else{

        header('Location: login.php');

    }

?>