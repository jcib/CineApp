<?php include "templates/header.php"; ?>

<div id="contenedor">
    <h4>Buscar películas por director</h4>

    <form method="post">
        <label for="director">Director</label>
        <input type="text" id="director" name="director">
        <input type="submit" name="submit" value="View Results">
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
        try {
        require "./config.php";
        require "./common.php";
        
        $connection = new PDO($dsn, $username, $password, $options);
        $sql = "SELECT *
        FROM proyectocine
        WHERE director = :director";
        $director = $_POST['director'];

        $statement = $connection->prepare($sql);
        $statement->bindParam(':director', $director, PDO::PARAM_STR);
        $statement->execute();

        $result = $statement->fetchAll();

        } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
        }
    }

    if (isset($_POST['submit'])) {
    if ($result && $statement->rowCount() > 0) { ?>
        <div id="contenedor">
            <h2>Resultados:</h2>
            <?php foreach ($result as $row) { ?>
                
                    <p><strong>Título:</strong> <?php echo escape($row["titulo"]); ?></p>
                    <p><strong>Director:</strong> <?php echo escape($row["director"]); ?></p>
                    <p><strong>Sinopsis:</strong> <?php echo escape($row["sinopsis"]); ?></p>
                    <p><strong>Valoración:</strong> <?php echo escape($row["valoracion"]); ?></p>
                    <p><strong>Comentario:</strong> <?php echo escape($row["comentario"]); ?></p>
                    <p><hr></p>
            <?php } ?>
        </div>
    <?php } else { ?>
        > No hay resultados para <?php echo escape($_POST['director']); ?>.
    <?php }
    } 
?>

<?php include "templates/footer.php"; ?>