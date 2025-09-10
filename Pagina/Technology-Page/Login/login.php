<?php
session_start();

$servidor = "localhost";
$usuario = "root";
$clave = "";
$bd = "tc";

$conn = mysqli_connect($servidor, $usuario, $clave, $bd);

if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
}

$user = $_POST['usuario'];
$pass = $_POST['password'];

$query = "SELECT * FROM usuarios WHERE usuario='$user' AND password='$pass' AND rol='usuario'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    $_SESSION['usuario'] = $user;
    header("Location: ../Inicio.html");
    exit();
} else {
    echo "<script>alert('❌ Usuario o contraseña incorrectos'); window.location.href='login.html';</script>";
}
?>
