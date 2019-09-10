<?php


// Delete a user

require "./config.php";
require "./common.php";

if (isset($_GET["id"])) {
  try {
    $connection = new PDO($dsn, $username, $password, $options);

    $id = $_GET["id"];

    $sql = "DELETE FROM proyectocine WHERE id = :id";

    $statement = $connection->prepare($sql);
    $statement->bindValue(':id', $id);
    $statement->execute();

    $success = "¡Película borrada!";
  } catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
  }
}

try {
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

<div id="contenedor">
    <h4>Borrar películas</h4>
    <?php foreach ($result as $row) { ?>
      <p><strong>Título:</strong> <?php echo escape($row["titulo"]); ?></p>
      <p><strong>Director:</strong> <?php echo escape($row["director"]); ?></p>
      <p><strong>Sinopsis:</strong> <?php echo escape($row["sinopsis"]); ?></p>
      <p><strong>Valoración:</strong> <?php echo escape($row["valoracion"]); ?></p>
      <p><strong>Comentario:</strong> <?php echo escape($row["comentario"]); ?></p>
      <a href="delete.php?id=<?php echo escape($row["id"]); ?>">Borrar</a></td>
      <p><hr></p>
    <?php } ?>
    <a href="index.php">Volver atrás</a>
</div>

<?php require "templates/footer.php"; ?>

<?php
   session_start();
   
   $user_check = $_SESSION['username'];
   
   if(!isset($_SESSION['username'])){
      header("location:login.php");
      die();
   }
?>