<?php
   ob_start();
   session_start();
?>

<?
   // error_reporting(E_ALL);
   // ini_set("display_errors", 1);
?>

<head>
    <link rel="stylesheet" href="css/style2.css" />
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>El rincón cinéfilo</title>
    <link rel="icon" 
      type="image/png" 
      href="https://image.flaticon.com/icons/png/512/129/129461.png">
  </head>
</head>

<div id="contenedor_grande">
    <body>
        <div id="cabecera">
        <h1>EL RINCÓN DEL CINÉFILO</h1>
        <hr width="70%"/>
        <br/>
        </div>
    </body>

    <div id="login">
        <div class = "container form-signin">
            <?php
                $msg = '';
                
                if (isset($_POST['login']) && !empty($_POST['username']) 
                && !empty($_POST['password'])) {
                    
                if ($_POST['username'] == 'admin' && 
                    $_POST['password'] == 'begoñalovers') {
                    $_SESSION['valid'] = true;
                    $_SESSION['timeout'] = time();
                    $_SESSION['username'] = 'admin';
                    
                    header('Refresh: 2; URL = index.php');
                    }else {
                    $msg = '¡Usuario o contraseña inválidos!';
                }
                }
            ?>
        </div> <!-- /container -->
        
        <div class = "container">
        
            <form class = "form-signin" role = "form" 
                action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); 
                ?>" method = "post">
                <h4 class = "form-signin-heading"><?php echo $msg; ?></h4>
                <p>User</p>
                <input type = "text" class = "form-control" 
                name = "username" 
                required autofocus></br>
                <p>Password</p>
                <input type = "password" class = "form-control"
                name = "password" required>
                <p>
                    <button class = "btn btn-lg btn-primary btn-block" type = "submit" 
                    name = "login">Login</button>
                </p>
            </form>
                
            Click <a href = "logout.php" tite = "Logout">aquí</a> para limpiar sesión.
        </div> 
    </div>
</div>