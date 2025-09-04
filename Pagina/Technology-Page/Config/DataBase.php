<?php

$host = "localhost";
$user = "rust";
$pw = "";
$db = "technologydb";

$link = new mysqli("$host","$user","$pw","$db");
if ($link->connection_error){
    die("Error en la conexion ". $link->connection_error)
}
else{
    echo("Conexion correcta");
}

?>