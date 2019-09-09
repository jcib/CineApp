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

  <table id="customers">
    <thead>
      <tr>
        <th>Título</th>
        <th>Director</th>
        <th>Sinopsis</th>
        <th>Valoración</th>
        <th>Comentario</th>
        <th>#</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($result as $row) : ?>
      <tr>
        <td><?php echo escape($row["titulo"]); ?></td>
        <td><?php echo escape($row["director"]); ?></td>
        <td><?php echo escape($row["sinopsis"]); ?></td>
        <td><?php echo escape($row["valoracion"]); ?></td>
        <td><?php echo escape($row["comentario"]); ?></td>
        <td><a href="update-single.php?id=<?php echo escape($row["id"]); ?>">Editar</a></td>
    </tr>
    <?php endforeach; ?>
    </tbody>
  </table>

  <a href="index.php">Volver atrás</a>
</div>