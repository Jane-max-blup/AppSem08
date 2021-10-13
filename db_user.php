<?php 

/*Archivo de conexion*/

/*contenga la informarcion que se requiere de la base de datos*/
define('_HOST_NAME','localhost');
define('_DATABASE_NAME','sistema_relaciones');
define('_DATABASE_USER_NAME','root');
define('_DATABASE_PASSWORD','');

$MySQLiconn = new MySQLi(_HOST_NAME,_DATABASE_USER_NAME,_DATABASE_PASSWORD,_DATABASE_NAME);



if($MySQLiconn->connect_errno)
{
    /*Para verificar el intento de conexion a traido un error*/
    die("ERROR: ->".$MySQLiconn->connect_error);
}

?>