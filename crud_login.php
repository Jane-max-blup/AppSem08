<?php
/*Una funcion que permite hacer la llamada de un archivo e incluir ese archivo en este nuevo archivo y que se hara solo una vez*/
include_once 'database.php';

/*codigo para la insercion de datos*/
if(isset($_POST['save']))
{
    $id = $_POST['id'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cifrado = password_hash($password, PASSWORD_BCRYPT);
    

    $SQL = $MySQLiconn->prepare("INSERT INTO users(id, email, password) VALUES(?,?,?)");
    $SQL = $SQL->execute([$id, $email, $cifrado]);
    if(!$SQL){
        echo $MySQLiconn->error;
    }
}

/*codigo para la eliminacion de datos*/
if(isset($_GET['del']))
{
    $SQL = $MySQLiconn->prepare("DELETE FROM users WHERE id=?");
    $SQL = $SQL->execute([$_GET['del']]);
    header("Location: admin.php");
}

/*codigo para la actualizacion de los datos */
if(isset($_GET['edit']))
{
    $SQL = $MySQLiconn->prepare("SELECT * FROM users WHERE id=?");
    $SQL->execute([$_GET['edit']]);
    /*fecth_array: convierte la data que esta como un objeto a un arreglo */
    $getROW = $SQL->fetchAll();
}

if(isset($_POST['update']))
{
    $SQL = $MySQLiconn->prepare("UPDATE users SET id=?, email=?, password=? WHERE id=?");
    $cifrado = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $SQL->execute([$_POST['id'],$_POST['email'],$cifrado ,$_GET['edit']]);
    header("Location: admin.php");

}
?>
