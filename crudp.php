<?php
/*Una funcion que permite hacer la llamada de un archivo e incluir ese archivo en este nuevo archivo y que se hara solo una vez*/
include_once 'db_user.php';

/*pais*/
if(isset($_POST['save']))
{
    $nom_pais = $MySQLiconn->real_escape_string($_POST['nom_pais']);
   

    $SQL = $MySQLiconn->query("INSERT INTO pais (nom_pais) VALUES ('$nom_pais')");

    if(!$SQL){
        echo $MySQLiconn->error;
    }
}

/*codigo para la eliminacion de datos*/
if(isset($_GET['del']))
{
    $SQL = $MySQLiconn->query("DELETE FROM pais WHERE idPais=".$_GET['del']);

    header("Location: pais.php");
}

/*codigo para la actualizacion de los datos */
if(isset($_GET['edit']))
{
    $SQL = $MySQLiconn->query("SELECT * FROM pais WHERE idPais=".$_GET['edit']);
    $getROW=$SQL->fetch_array();
    /*fecth_array: convierte la data que esta como un objeto a un arreglo */
}

if(isset($_POST['update']))
{
    $SQL = $MySQLiconn->query("UPDATE pais SET nom_pais='".$_POST['nom_pais']."'WHERE idPais=".$_GET['edit']);
    header("Location: pais.php");
}

?>


