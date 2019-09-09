<?php include "templates/header.php"; ?>

<div id="contenedor">
	<h4>Introducir película en la base de datos</h4>

	<form method="post">
		<label for="titulo">Título</label>
		<input type="text" name="titulo" id="titulo">
		<label for="director">Director</label>
		<input type="text" name="director" id="director">
		<label for="sinopsis">Sinopsis</label>
		<input type="text" name="sinopsis" id="sinopsis">
		<label for="valoracion">Valoración</label>
		<input type="text" name="valoracion" id="valoracion">
		<label for="comentario">Comentario</label>
		<input type="text" name="comentario" id="comentario">
		<input type="submit" name="submit" value="Submit">
	</form>

	<a href="index.php">Volver atrás</a>
</div>

<?php
   session_start();
   
   $user_check = $_SESSION['username'];
   
   if(!isset($_SESSION['username'])){
      header("location:login.php");
      die();
   }
?>

<?php
	if (isset($_POST['submit'])) {
		require "./config.php";

		try {
			$connection = new PDO($dsn, $username, $password, $options);
			$new_user = array(
			"titulo" => $_POST['titulo'],
			"director"  => $_POST['director'],
			"sinopsis"     => $_POST['sinopsis'],
			"valoracion"       => $_POST['valoracion'],
			"comentario"  => $_POST['comentario']
			);

			$sql = sprintf(
				"INSERT INTO %s (%s) values (%s)",
				"proyectocine",
				implode(", ", array_keys($new_user)),
				":" . implode(", :", array_keys($new_user))
			);

			$statement = $connection->prepare($sql);
			$statement->execute($new_user);

		} catch(PDOException $error) {
			echo $sql . "<br>" . $error->getMessage();
		}
	}
?>

<?php 
require "./common.php";
if (isset($_POST['submit']) && $statement) { ?>
  > <?php echo $_POST['titulo']; ?> añadido satisfactoriamente.
<?php } ?>

<?php include "templates/footer.php"; ?>
