<?php

try {
  require "./config.php";
  require "./common.php";

  $connection = new PDO($dsn, $username, $password, $options);

  $sql = "SELECT * FROM proyectocine";

  $statement = $connection->prepare($sql);
  $statement->execute();

  $result = $statement->fetchAll();

} catch(PDOException $error) {
  echo $sql . "<br>" . $error->getMessage();
}
?>

<?php require "templates/header.php"; ?>

<?php
   session_start();
   
   $user_check = $_SESSION['username'];
   
   if(!isset($_SESSION['username'])){
      header("location:login.php");
      die();
   }
?>

<div id="contenedor">
  <h4>Películas</h4>
    <?php foreach ($result as $row) { ?>       
      <p><strong>Título:</strong> <?php echo escape($row["titulo"]); ?></p>
      <p><strong>Director:</strong> <?php echo escape($row["director"]); ?></p>
      <p><strong>Sinopsis:</strong> <?php echo escape($row["sinopsis"]); ?></p>
      <p><strong>Valoración:</strong> <?php echo escape($row["valoracion"]); ?></p>
      <p><strong>Comentario:</strong> <?php echo escape($row["comentario"]); ?></p>
      <a href="update-single.php?id=<?php echo escape($row["id"]); ?>">Editar</a>
      <p><hr></p>
    <?php } ?>
  <a href="index.php">Volver atrás</a>
</div>