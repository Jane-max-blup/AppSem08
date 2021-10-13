<?php
/*Una funcion que permite hacer la llamada de un archivo e incluir ese archivo en este nuevo archivo y que se hara solo una vez*/
include_once 'db_user.php';

/*producto*/
if(isset($_POST['save']))
{
    $nom_produc = $MySQLiconn->real_escape_string($_POST['nom_produc']);
    $des_produc = $MySQLiconn->real_escape_string($_POST['des_produc']);
   

    $SQL = $MySQLiconn->query("INSERT INTO producto (nom_produc,des_produc) VALUES ('$nom_produc','$des_produc')");

    if(!$SQL){
        echo $MySQLiconn->error;
    }
}

/*codigo para la eliminacion de datos*/
if(isset($_GET['del']))
{
    $SQL = $MySQLiconn->query("DELETE FROM producto WHERE idProducto=".$_GET['del']);

    header("Location: producto.php");
}

/*codigo para la actualizacion de los datos */
if(isset($_GET['edit']))
{
    $SQL = $MySQLiconn->query("SELECT * FROM producto WHERE idProducto=".$_GET['edit']);
    $getROW=$SQL->fetch_array();
    /*fecth_array: convierte la data que esta como un objeto a un arreglo */
}

if(isset($_POST['update']))
{
    $SQL = $MySQLiconn->query("UPDATE producto SET nom_produc='".$_POST['nom_produc']."', des_produc='".$_POST['des_produc']."'WHERE idProducto=".$_GET['edit']);
    header("Location: producto.php");
}

?>


