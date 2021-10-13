<?php
include_once 'crudrc.php';
/*Para que utilice el archivo crud.php para las operaciones*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link  rel = "shortcut icon"  href = "img/peru.png"  type = "image / ico">
    <link rel="stylesheet" type="text/css" href="css/estilos.css"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <title>Relacion Comercial</title>
</head>

<style>
body{
    background-image: url("img/acoi.jpg");
	background-position: center center;
	background-size: cover;
	background-repeat: no-repeat;
	position: relative;
    margin: 1%;
    padding: 15px;

}

table a{
      background: linear-gradient(white,greenyellow, orange);
        -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
        text-decoration: none;
        font-size: 18px;
        font-weight: bold;
      }

</style>

<body>

<div class="container">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class="container-fluid">
    <li><img src="img/comercioexterior.png" alt="" width="60%" style="padding:5px; float:left;"></li>
    <a class="navbar-brand" href="rcomercial.php">Relaciones Comerciales</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
        <a class="nav-link" href="/php_LabS8">Home</a>
        <a class="nav-link" href="pais.php">País</a>
        <a class="nav-link" href="producto.php">Productos</a>
        <a class="nav-link" href="rdiplomatica.php">Relaciones Diplomaticas</a>
        <a class="nav-link" href="logout.php">Cerrar Sesión</a>
    </div>
    </div>
</div>
</nav> 

</div>
    <center>
        <br><br><br>
            <h1 >Relaciones Comerciales</h1>
    </center>
    <!--  center: para mantener todos los elementos del texto-->
    <center>
        <br><br>

        <div id="form">
          <form  method="post">
              <!--Para organizar la infromacion un table-->
              <table width="100%" border="1" cellpadding="15">
                  <!-- cellpadding: especifica el espacio, en píxeles, entre la pared de la celda y su contenido-->
                  <tr>
                      <td>
                          <label for="f_relacion">Fecha de relación</label><br>
                          <input type="text" name="f_relacion" placeholder="Fecha de relación" value="<?php
                          if(isset($_GET['edit'])) echo $getROW['f_relacion']; ?>">
                      </td>
                  </tr>

                  <tr>
                      <td>
                          <Label  for="desc_relacion">Describa la relación</Label><br>
                          <input type="text" name="desc_relacion" placeholder="Descripción de relación" value="<?php
                          if(isset($_GET['edit'])) echo $getROW['desc_relacion']; ?>">
                      </td>
                  </tr>

                  <tr>
                      <td>
                        <label for="Pais">Seleccione el País</label><br>
                        <select name="Pais">

                        <?php
                            $pais1=$getROW['Pais'];
                            $res = $MySQLiconn->query("SELECT * FROM pais Where idPais='$pais1'");
                            while ($row=$res->fetch_array())
                            {
                            ?>
                            <option value="<?php if(isset($_GET['edit'])) echo $row['idPais']; ?>"><?php if(isset($_GET['edit'])) echo $row['nom_pais']; ?></option>
                            <?php
                            }
                            ?>

                        <?php
                        $res = $MySQLiconn->query("SELECT idPais,nom_pais FROM pais ");
                        while ($row=$res->fetch_array())
                        {
                        ?>
                        <option value="<?php echo $row['idPais']; ?>"><?php echo $row['nom_pais']; ?></option>
                        <?php
                        }
                        ?>
                          </select>
                      </td>
                  </tr>
                <tr>
                  <td>
                        <label for="Producto">Seleccione producto</label><br>
                        <select name="Producto">

                        <?php
                            $producto=$getROW['Producto'];
                            $res = $MySQLiconn->query("SELECT idProducto,nom_produc FROM producto Where idProducto='$producto'");
                            while ($row=$res->fetch_array())
                            {
                        ?>
                            <option value="<?php if(isset($_GET['edit'])) echo $row['idProducto']; ?>"><?php if(isset($_GET['edit'])) echo $row['nom_produc']; ?></option>
                            <?php
                            }
                            ?>

                        <?php
                        $res = $MySQLiconn->query("SELECT idProducto,nom_produc FROM producto ");
                        while ($row=$res->fetch_array())
                        {
                        ?>
                        <option  value="<?php echo $row['idProducto']; ?>"><?php echo $row['nom_produc']; ?></option>
                        <?php
                        }
                        ?>
                        </select>

                      </td>

                  </tr>

                  <tr>
                      <td>
                          <?php 
                          
                            if(isset($_GET['edit'])){
                                ?>
                                <button type="submit" name="update">Editar</button>
                                <?php 
                            }
                            else{
                                ?>
                                <button type="submit" name="save">Registrar</button>
                                <?php
                            }
                          ?>
                      </td>
                  </tr>
              </table>
          </form>
          <br><br>

          <h3>Listado de relaciones comerciales agregadas</h3>
          <br>
        </center>  
        <!--Tabla que servirá para listar los registros que se encuentran en la base de datos-->
          <table class="table" id="listado" width="100%" border="1" cellpadding="15" align="center">
            <thead>
                    <td>ID</td>
                    <td>Fecha de Relacion</td>
                    <td>Descripción de la relación</td>
                    <td>País</td>
                    <td>Producto</td>
                    <td>Accion</td>
                    <td>Accion</td>

                </thead>
              <?php
              /*una variable para el recorrido para los registros en la tabla */
              /*escribimos el objeto de conexion a la bd mysqliconn */
              $res = $MySQLiconn->query("SELECT idComercial,f_relacion,desc_relacion,pais.nom_pais, producto.nom_produc FROM relacion_comercial INNER JOIN pais on pais.idPais = relacion_comercial.pais INNER JOIN producto on producto.idProducto = relacion_comercial.producto");
              while ($row=$res->fetch_array())
              {
              ?>
                <tr>
                    <td ><?php echo $row['idComercial'];?></td>
                    <td><?php echo $row['f_relacion'];?></td>
                    <td><?php echo $row['desc_relacion'];?></td>
                    <td><?php echo $row['nom_pais'];?></td>
                    <td><?php echo $row['nom_produc'];?></td>
                  
                   
                    <td><a href="?edit=<?php echo $row['idComercial']?>" onclick="return confirm('Confirmar edición')">Editar</a></td>
                    <td><a href="?del=<?php echo $row['idComercial']?>" onclick="return confirm('Confirmar eliminación')">Eliminar</a></td>
                    
                </tr>
                        
                <?php
              }

              ?>
          </table>


        </div>
</body>
