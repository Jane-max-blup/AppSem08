<?php
/*Una funcion que permite hacer la llamada de un archivo e incluir ese archivo en este nuevo archivo y que se hara solo una vez*/
include_once 'db_user.php';

/*codigo para la insercion de datos*/
if(isset($_POST['save']))
{
    $f_relacion = $MySQLiconn->real_escape_string($_POST['f_relacion']);
    $desc_relacion = $MySQLiconn->real_escape_string($_POST['desc_relacion']);
    $Pais = $MySQLiconn->real_escape_string($_POST['Pais']);

    $SQL = $MySQLiconn->query("INSERT INTO relacion_diplomatica(f_relacion,desc_relacion,Pais) VALUES('$f_relacion','$desc_relacion','$Pais')");

    if(!$SQL){
        echo $MySQLiconn->error;
    }
}

/*codigo para la eliminacion de datos*/
if(isset($_GET['del']))
{
    $SQL = $MySQLiconn->query("DELETE FROM relacion_diplomatica WHERE idDiplomatica=".$_GET['del']);

    header("Location: index.php");
}

/*codigo para la actualizacion de los datos */
if(isset($_GET['edit']))
{
    $SQL = $MySQLiconn->query("SELECT * FROM relacion_diplomatica WHERE idDiplomatica=".$_GET['edit']);
    /*fecth_array: convierte la data que esta como un objeto a un arreglo */
    $getROW = $SQL->fetch_array();
}

if(isset($_POST['update']))
{
    $SQL = $MySQLiconn->query("UPDATE relacion_diplomatica SET f_relacion='".$_POST['f_relacion']."', desc_relacion='".$_POST['desc_relacion']."', Pais='".$_POST['Pais']."'WHERE idDiplomatica=".$_GET['edit']);
    header("Location: rdiplomatica.php");
    
}
?>