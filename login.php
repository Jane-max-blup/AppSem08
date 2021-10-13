<?php

  session_start();

  if (isset($_SESSION['user_id'])) {
    header('Location: /php_LabS8');
  }
  require 'database.php';

  if (isset($_POST["email"]) && isset($_POST["password"])) {
    $records = $MySQLiconn->prepare('SELECT id, email, admin, password FROM users WHERE email = :email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
      if ($results['admin'] == 1)
    {
    // session como admin y la redireccion 
    $_SESSION['admin_id'] = $results['id'];
    header("Location: admin.php");
    die();
    }
      else {
    // usuario normal
    $_SESSION['user_id'] = $results['id'];
    header("Location: /php_LabS8");
    die();
    } 
  } else {
    $message= 'Losiento, ingresaste datos incorrectos';
  }
}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link  rel = "shortcut icon"  href = "img/peru.png"  type = "image / ico">
    <link rel="stylesheet" href="assets/css/styles.css">
  </head>
  <style>
    body{
        background-image: url("img/fondo1.jfif");
      background-position: center center;
      background-size: cover;
      background-repeat: no-repeat;
      position: relative;
        margin: 1%;
        padding: 15px;
        color: white;
        height: 520px;
    }
    a{
      background: linear-gradient(white,greenyellow, orange);
        -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
        text-decoration: none;
        font-size: 25px;
      }
  </style>
  <body>
    <?php require 'partials/header.php' ?>

    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>

    <h1>Acceso</h1>
    <span><strong>or</strong> <a href="signup.php">SignUp</a></span>

    <form action="login.php" method="POST">
      <input name="email" type="text" placeholder="Introduce tu correo electrónico">
      <input name="password" type="password" placeholder="Ingresa tu contraseña">
      <input type="submit" value="Enviar">
    </form>
  </body>
</html>