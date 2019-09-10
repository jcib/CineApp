<?php include "templates/header.php"; ?>

<?php
   session_start();
   
   $user_check = $_SESSION['username'];
   
   if(!isset($_SESSION['username'])){
      header("location:login.php");
      die();
   }
?>

<div id="contenedor">
  <ul>
    <li>
      <a href="create.php"><strong>Introducir</strong></a>
    </li>
    <li>
      <a href="read.php"><strong>Buscar</strong></a>
    </li>
    <li>
      <a href="update.php"><strong>Listar</strong></a>
    </li>
    <li>
      <a href="delete.php"><strong>Borrar</strong></a>
    </li>
    <li>
      <a href="chat.php"><strong>Chat</strong></a>
    </li>
  </ul>

  <div id="imagen">
    <img id ="imagen1" src="https://cadenaser00.epimg.net/ser/imagenes/2013/01/29/cultura/1359418635_740215_0000000000_noticia_normal.jpg" alt="12 hombres sin piedad" height="150px" width="200px" />
    <p></p>
    <a href="//24timezones.com/es_husohorario/barcelona_hora_actual.php" style="text-decoration: none" class="clock24" id="tz24-1568071699-c131-eyJob3VydHlwZSI6MTIsInNob3dkYXRlIjoiMSIsInNob3dzZWNvbmRzIjoiMCIsInNob3d0aW1lem9uZSI6IjAiLCJ0eXBlIjoiZCIsImxhbmciOiJlcyJ9" title="Reloj Mundial - Barcelona" target="_blank" rel="nofollow">Barcelona</a>
    <script type="text/javascript" src="//w.24timezones.com/l.js" async></script>
  </div>
  <h5 id="firma">Creado por José Carlos Ibarra</h5>
  <h6 id="firma">versión - 0.0.2</h6>
</div>

<?php include "templates/footer.php"; ?>
