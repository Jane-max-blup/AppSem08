<?php
include_once 'crud_login.php';
/*Para que utilice el archivo crud.php para las operaciones*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link  rel = "shortcut icon"  href = "img/peru.png"  type = "image / ico">
    <link rel="stylesheet" href="assets/css/estilos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>CRUD Administrador</title>
</head>
<style>
    body{
    background-image: url("img/acoi.jpg");
	background-position: center center;
	background-size: cover;
	background-repeat: no-repeat;
	position: relative;
    margin: 1%;
    padding: 15px
}
td{
    color: white;
}
#listado{
    background-color: black;
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
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link active" aria-current="page" href="logout.php">Cerrar Sesión</a>
                    </div>
                    </div>
                </div>
            </nav> 

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
                            <input type="text" name="id" placeholder="id" value="<?php if(isset($_GET['edit'])) echo  $getROW[0]['id']; ?>">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <input type="text" name="email" placeholder="email" value="<?php if(isset($_GET['edit'])) echo  $getROW[0]['email']; ?>">
                        </td>

                    </tr>

                    <tr>
                        <td>
                            <input type="password" name="password" placeholder="password" value="" >
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
            </center>
            <!--Tabla que servirá para listar los registros que se encuentran en la base de datos-->
            <table class="table" id="listado" width="100%" border="1" cellpadding="15" align="center">
                <thead>
                    <td>ID del usuario</td>
                    <td>Email del usuario</td>
                    <td>Contraseña cifrada del usuario</td>
                    <td>Acción</td>
                    <td>Acción</td>

                </thead>
                <?php

                $res = $MySQLiconn->query("SELECT * FROM users WHERE id != 1 ");

                $row_ = $res->fetchAll();
                foreach ($row_ as $row)
                {
                ?>
 
                    <tr>
                        <td><?php echo $row['id'];?></td>
                        <td><?php echo $row['email'];?></td>
                        <td><?php echo $row['password'];?></td>

                        <td><a href="?edit=<?php echo $row['id']?>" onclick="return confirm('Confirmar edición')">Editar</a></td>
                        <td><a href="?del=<?php echo $row['id']?>" onclick="return confirm('Confirmar eliminación')">Eliminar</a></td>
                    </tr>
                            
                    <?php
                }

                ?>
            </table>


            </div>
        
    </div>  
</body>
</html>