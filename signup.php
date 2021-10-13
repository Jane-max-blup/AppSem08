<?php

  require 'database.php';

  $message = '';

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
    $stmt = $MySQLiconn->prepare($sql);
    $stmt->bindParam(':email', $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password);

    if ($stmt->execute()) {
      $message = 'Nuevo usuario creado con exito';
    } else {
      $message = 'Lo sentimos, debe haber un problema al crear su cuenta.';
    }
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>SignUp</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
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

    <h1>Registrarse</h1>
    <span>or <a href="login.php">Login</a></span>

    <form action="signup.php" method="POST">
      <input name="email" type="text" placeholder="Introduce tu correo electrónico">
      <input name="password" type="password" placeholder="Ingresa tu contraseña">
      <input name="confirm_password" type="password" placeholder="confirmar Contraseña">
      <input type="submit" value="Enviar">
    </form>

  </body>
</html>