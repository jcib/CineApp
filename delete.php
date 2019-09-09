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
        <td><a href="delete.php?id=<?php echo escape($row["id"]); ?>">Borrar</a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
    </table>

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