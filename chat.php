<?php
   session_start();
   
   $user_check = $_SESSION['username'];
   
   if(!isset($_SESSION['username'])){
      header("location:login.php");
      die();
   }
?>

<?php
$android = strpos($_SERVER['HTTP_USER_AGENT'],"Android");
$bberry = strpos($_SERVER['HTTP_USER_AGENT'],"BlackBerry");
$iphone = strpos($_SERVER['HTTP_USER_AGENT'],"iPhone");
$ipod = strpos($_SERVER['HTTP_USER_AGENT'],"iPod");
$webos = strpos($_SERVER['HTTP_USER_AGENT'],"webOS");

if ($android || $bberry || $iphone || $ipod || $webos== true) { 
  header('location:chat-mobile.php');
}
?>

<?php include "templates/header.php"; ?>

<div id="contenedor">
    <div id="chat">
    <h4>SALA DE CHAT</h4>
    <iframe src="https://www5.cbox.ws/box/?boxid=915369&boxtag=lAroku" width="450px" height="450px" allowtransparency="yes" allow="autoplay" frameborder="0" marginheight="0" marginwidth="0" scrolling="auto"></iframe>	
    </div>
    <a href="index.php">Volver atrás</a>
</div>

<?php include "templates/footer.php"; ?>