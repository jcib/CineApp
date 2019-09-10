<?php include "templates/header.php"; ?>

<?php
   session_start();
   
   $user_check = $_SESSION['username'];
   
   if(!isset($_SESSION['username'])){
      header("location:login.php");
      die();
   }
?>

<?php
$android = strpos($_SERVER['HTTP_USER_AGENT'],"Android");
$bberry = strpos($_SERVER['HTTP_USER_AGENT'],"BlackBerry");
$iphone = strpos($_SERVER['HTTP_USER_AGENT'],"iPhone");
$ipod = strpos($_SERVER['HTTP_USER_AGENT'],"iPod");
$webos = strpos($_SERVER['HTTP_USER_AGENT'],"webOS");

if ($android || $bberry || $iphone || $ipod || $webos== true) { 
  header('location:index-mobile.php');
}
?>

<div id="contenedor">
  <ul id="list">
    <li>
      <a href="create.php"><strong>Introducir película en el sistema</strong></a>
    </li>
    <li>
      <a href="read.php"><strong>Buscar por director</strong></a>
    </li>
    <li>
      <a href="update.php"><strong>Lista de películas</strong></a>
    </li>
    <li>
      <a href="delete.php"><strong>Borrar películas</strong></a>
    </li>
    <li>
      <a href="chat.php"><strong>Chat</strong></a>
    </li>
  </ul>

  <div id="imagen">
    <img id ="imagen1" src="https://media.giphy.com/media/GAQmPS2LbaEXm/giphy.gif" alt="12 hombres sin piedad" />
    <p></p>
    <a href="//24timezones.com/es_husohorario/barcelona_hora_actual.php" style="text-decoration: none" class="clock24" id="tz24-1568071699-c131-eyJob3VydHlwZSI6MTIsInNob3dkYXRlIjoiMSIsInNob3dzZWNvbmRzIjoiMCIsInNob3d0aW1lem9uZSI6IjAiLCJ0eXBlIjoiZCIsImxhbmciOiJlcyJ9" title="Reloj Mundial - Barcelona" target="_blank" rel="nofollow">Barcelona</a>
    <script type="text/javascript" src="//w.24timezones.com/l.js" async></script>
  </div>
  <h6 id="firma">versión - 0.0.2</h6>
  <h6 id="firma2"><a href="mailto:a18josibacuc@iam.cat">¡Enviar sugerencia!</a></h6> 
</div>

<?php include "templates/footer.php"; ?>
