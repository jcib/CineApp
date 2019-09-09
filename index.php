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
  </ul>

  <div id="imagen">
    <img id ="imagen1" src="https://media.giphy.com/media/GAQmPS2LbaEXm/giphy.gif" alt="12 hombres sin piedad" />
  </div>
  <h5 id="firma">Creado por José Carlos Ibarra</h5>
</div>


<?php include "templates/footer.php"; ?>
