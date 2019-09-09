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

            <table>
            <thead>
                <tr>
                    <th>Titulo</th>
                    <th>Director</th>
                    <th>Sinopsis</th>
                    <th>Valoración</th>
                    <th>Comentario</th>
                    </tr>
                        </thead>
                        <tbody>
                    <?php foreach ($result as $row) { ?>
                        <tr>
                    <td><?php echo escape($row["titulo"]); ?></td>
                    <td><?php echo escape($row["director"]); ?></td>
                    <td><?php echo escape($row["sinopsis"]); ?></td>
                    <td><?php echo escape($row["valoracion"]); ?></td>
                    <td><?php echo escape($row["comentario"]); ?></td>
                </tr>
            <?php } ?>
            </tbody>
            </table>
        </div>
    <?php } else { ?>
        > No hay resultados para <?php echo escape($_POST['director']); ?>.
    <?php }
    } 
?>

<?php include "templates/footer.php"; ?>