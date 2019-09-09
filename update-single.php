<?php

  // Use an HTML form to edit an entry in the
  // users table.

require "./config.php";
require "./common.php";

if (isset($_POST['submit'])) {
  try {
    $connection = new PDO($dsn, $username, $password, $options);
    $proyectocine =[
      "id"        => $_POST['id'],
      "titulo"        => $_POST['titulo'],
      "director" => $_POST['director'],
      "sinopsis"  => $_POST['sinopsis'],
      "valoracion"     => $_POST['valoracion'],
      "comentario"       => $_POST['comentario']
    ];

    $sql = "UPDATE proyectocine
            SET id = :id,
            titulo = :titulo,
            director = :director,
            sinopsis = :sinopsis,
            valoracion = :valoracion,
            comentario = :comentario
            WHERE id = :id";

  $statement = $connection->prepare($sql);
  $statement->execute($proyectocine);
  } catch(PDOException $error) {
      echo $sql . "<br>" . $error->getMessage();
  }
}

if (isset($_GET['id'])) {
  try {
    $connection = new PDO($dsn, $username, $password, $options);
    $id = $_GET['id'];
    $sql = "SELECT * FROM proyectocine WHERE id = :id";
    $statement = $connection->prepare($sql);
    $statement->bindValue(':id', $id);
    $statement->execute();

    $user = $statement->fetch(PDO::FETCH_ASSOC);
  } catch(PDOException $error) {
      echo $sql . "<br>" . $error->getMessage();
  }
} else {
    echo "¡Algo ha fallado!";
    exit;
}
?>

<?php require "templates/header.php"; ?>

<?php if (isset($_POST['submit']) && $statement) : ?>
  <?php echo escape($_POST['titulo']); ?> actualizada satisfactoriamente.
<?php endif; ?>

<div id="contenedor">
  <h2>Editar una película</h2>

  <form method="post">
      <?php foreach ($user as $key => $value) : ?>
        <label for="<?php echo $key; ?>"><?php echo ucfirst($key); ?></label>
        <input type="text" name="<?php echo $key; ?>" id="<?php echo $key; ?>" value="<?php echo escape($value); ?>" <?php echo ($key === 'id' ? 'readonly' : null); ?>>
      <?php endforeach; ?>
      <input type="submit" name="submit" value="Submit">
  </form>

  <a href="index.php">Volver atrás</a>
</div>

<?php require "templates/footer.php"; ?>