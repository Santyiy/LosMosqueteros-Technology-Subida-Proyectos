<?php
// Datos de conexión
$servidor = "localhost";
$usuario = "root";   // cambia si tu MySQL tiene otro usuario
$clave = "";         // pon tu contraseña si tiene
$bd = "tc";          // tu base de datos

$conn = mysqli_connect($servidor, $usuario, $clave, $bd);

// Verificar conexión
if (!$conn) {
    die("❌ Error de conexión: " . mysqli_connect_error());
}

// Recibir datos del formulario
$user = $_POST['usuario'];
$email = $_POST['email'];
$pass = $_POST['password'];
$confirm = $_POST['confirm_password'];

// Validar contraseñas
if ($pass !== $confirm) {
    echo "<script>alert('❌ Las contraseñas no coinciden'); window.location.href='register.html';</script>";
    exit();
}

// Verificar si ya existe usuario o email
$check = "SELECT * FROM usuarios WHERE usuario='$user' OR email='$email'";
$result = mysqli_query($conn, $check);

if (mysqli_num_rows($result) > 0) {
    echo "<script>alert('⚠️ Ese usuario o correo ya está registrado'); window.location.href='register.html';</script>";
    exit();
}

// Insertar usuario nuevo
$query = "INSERT INTO usuarios (usuario, email, password, rol) 
          VALUES ('$user', '$email', '$pass', 'usuario')";

if (mysqli_query($conn, $query)) {
    echo "<script>alert('✅ Registro exitoso, ahora inicia sesión'); window.location.href='login.html';</script>";
} else {
    echo "❌ Error al registrar: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
