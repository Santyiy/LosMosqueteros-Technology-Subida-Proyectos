<?php

$host = "localhost";
$user = "root";
$pw = "";
$db = "technologydb";

$link = new mysqli($host, $user, $pw, $db);

if ($link->connect_error) {
    die("Error en la conexion: " . $link->connect_error); 
} else {
    echo "Conexion correcta";
}

?>
