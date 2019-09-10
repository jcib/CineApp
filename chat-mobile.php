<?php
   session_start();
   
   $user_check = $_SESSION['username'];
   
   if(!isset($_SESSION['username'])){
      header("location:login.php");
      die();
   }
?>

<?php include "templates/header.php"; ?>

<div id="contenedor">
    <div id="chat">
    <h4>SALA DE CHAT</h4>
    <iframe src="https://www5.cbox.ws/box/?boxid=915369&boxtag=lAroku" height="500px" allowtransparency="yes" allow="autoplay" frameborder="0" marginheight="0" marginwidth="0" scrolling="auto"></iframe>	
    </div>
    <a href="index.php">Volver atrás</a>
</div>

<?php include "templates/footer.php"; ?>