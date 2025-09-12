<?php
include ("../Config/DataBase.php");
session_start();

$servidor = "localhost";
$usuario = "root";
$clave = "";
$bd = "technologydb";

$link = mysqli_connect($servidor, $usuario, $clave, $bd);

if (!$link) {
    die("Error de conexión: " . mysqli_connect_error());
}

$user = $_POST['usuario'];   
$pass = $_POST['password'];


$query = "SELECT * FROM usuarios WHERE nombre='$user' AND PASSWORD='$pass'";
$result = mysqli_query($link, $query);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    
    $_SESSION['id_usuario'] = $row['id'];
    $_SESSION['nombre'] = $row['nombre'];
    $_SESSION['rol'] = $row['rol'];

    header("Location: ../Inicio.php");
    exit();
} else {
    echo "<script>alert('❌ Usuario o contraseña incorrectos'); window.location.href='login.html';</script>";
}
?>

