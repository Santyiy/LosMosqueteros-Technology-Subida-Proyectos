<?php
include ("../Config/DataBase.php");

$servidor = "localhost";
$usuario = "root";   
$clave = "";         
$bd = "technologydb";          

$link = mysqli_connect($servidor, $usuario, $clave, $bd);

if (!$link) {
    die("❌ Error de conexión: " . mysqli_connect_error());
}

$user = $_POST['usuario'];  
$email = $_POST['email'];
$pass = $_POST['password'];
$confirm = $_POST['confirm_password'];

if ($pass !== $confirm) {
    echo "<script>alert('❌ Las contraseñas no coinciden'); window.location.href='register.html';</script>";
    exit();
}


$check = "SELECT * FROM usuarios WHERE nombre='$user' OR email='$email'";
$result = mysqli_query($link, $check);

if (mysqli_num_rows($result) > 0) {
    echo "<script>alert('⚠️ Ese usuario o correo ya está registrado'); window.location.href='register.html';</script>";
    exit();
}


$query = "INSERT INTO usuarios (nombre, email, PASSWORD, rol) 
          VALUES ('$user', '$email', '$pass', 'Empleado')";

if (mysqli_query($link, $query)) {
    echo "<script>alert('✅ Registro exitoso, ahora inicia sesión'); window.location.href='login.html';</script>";
} else {
    echo "❌ Error al registrar: " . mysqli_error($link);
}

mysqli_close($link);
?>
