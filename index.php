<?php
  session_start();

  require 'database.php';

  if (isset($_SESSION['user_id'])) {
    $records = $MySQLiconn->prepare('SELECT id, email, password FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
      $user = $results;
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Welcome to you WebApp</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link  rel = "shortcut icon"  href = "img/peru.png"  type = "image / ico">
    <link rel="stylesheet" type="text/css" href="assets/css/estilos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
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
    padding: 2px;
    color: white;

}
.enlace{
  background: linear-gradient(white,greenyellow, orange);
    -webkit-background-clip: text;
-webkit-text-fill-color: transparent;
    text-decoration: none;
    font-size: 25px;
  }
.logout{
  background: linear-gradient(yellow,grey, orange);
    -webkit-background-clip: text;
-webkit-text-fill-color: transparent;
    text-decoration: none;
    font-weight: bold;
}
.fondo{
  margin: 5%;
  padding:15px;
  background-color: rgba(182, 182, 182, 0.484);
}
.fondo1{
  margin: 5%;
  padding:15px;
  background-color: rgba(82, 66, 66, 0.5);
  /*background-color: rgba(66, 66, 66, 0.384);*/
}
p{
  font-family: Arial;
}
ul{
  margin: 2%;
  text-align:left;
  font-family: Arial;
  
}

  </style>
  <body>
    <class class="container">
    <?php require 'partials/header.php' ?>
    <?php if(!empty($user)): ?>
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
          <li><img src="img/comercioexterior.png" alt="" width="60%" style="padding:5px; float:left;"></li>
          <a class="navbar-brand" href="/php_LabS8">Home</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
              <a class="nav-link" href="pais.php">Paises</a>
              <a class="nav-link" href="producto.php">Productos</a>
              <a class="nav-link" href="rcomercial.php">Relaciones Comerciales</a>
              <a class="nav-link" href="rdiplomatica.php">Relaciones Diplomaticas</a>
              <a class="nav-link" href="logout.php">Cerrar Sesión</a>
          </div>
          </div>
      </div>
      </nav> 
      <div class="fondo">
          <strong><br><h2>You are Successfully Logged In</h2></strong>
          <strong><br><h3>Bienvenido. <?= $user['email']; ?></h3></strong><br>
          <br>
          <!--Poniendo contenido en la página principal-->
      </div>
      <div class="fondo1">
        <h4>
          ¿De qué trata esta aplicación?
        </h4>
      <p>un sistema de información sobre relaciones comerciales y diplomáticas del Perú con otros países. 
        Cada país  se identifica por su nombre</p>
      <p>Y se desarrolló un flujo de productos de un país a otro</p>
      <div class="row">
        <div class="col-sm-6">
        <img src="img/ministro.jpg" class="img-fluid" alt="" style="height:100%; weight:30%;">
        <br><h7>Ministro de Comercio Exterior y Turismo <br> Roberto Sánchez Palomino</h7>
        <br><br>
        </div>
        <br>
        <div class="col-sm-6">
          <br><br><br>
        <div class="accordion" id="accordionExample">
        <div class="accordion-item ">
            <h2 class="accordion-header" id="headingOne">
              <button class="accordion-button btn-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                Artículo 5.- Funciones
              </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
              <div class="accordion-body alert-dark">
              <strong><p style="color: cornflowerblue;"> Son funciones del Ministerio de Comercio Exterior y Turismo: 
              Dirigir, coordinar, elaborar y ejecutar los planes y programas nacionales sectoriales de desarrollo en materia de comercio exterior, 
              integración, promoción de exportaciones, turismo y artesanía.</p></strong>
              </div>
            </div>
          </div>
        </div>
          
      </div>
      </div>
      <br>
      <div class="row">
        <div class="col-sm-7">
        <br><br><br>
        <img src="img/tlc.jpg" class="img-fluid" alt="" >
        </div>
        <div class="col-sm-5">
          <br><br><br><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
          Expedita dicta adipisci ipsum tempore blanditiis, error at suscipit aperiam iure fugit quidem laboriosam,
          eum enim itaque ipsam aspernatur dignissimos, maxime minus?
          </p> 
        </div>
      </div>
      <br>
      <p>Tambien puede visitar la página oficial del <a href="https://www.gob.pe/mincetur">Ministerio de Comercio Exterior y Turismo</a></p>
      </div>
      <footer>
        <div class="row">
          <div class="col">
          <br>
          <ul>
            <p>Integrantes que participaron en realización de esta aplicación</p>
            <li>Cáceres Serna Nicole Jane</li>
            <li>Cardenas Huaringa Youlserf</li>
            <li>Eguía Gonzales Gino Luis</li>
          </ul>
          <br>
          </div>
          <div class="col">
          <br><br>
          <p>Tecsup 2021-2</p>
          <h6>Copyright @2021 WebApp TercerCiclo</h6>
          <br>
          </div>
        </div>
      </footer>
        <?php else: ?>
      <div class="fondo">
          <h2 style="color:white;">Por favor ingresa o regístrate</h2>

          <strong><a class="enlace" href="login.php">Acceso</a> or
          <a class="enlace" href="signup.php">Inscribirse</a></strong>
          <?php endif; ?>
      </div>
  </body>
  </class>
</html>