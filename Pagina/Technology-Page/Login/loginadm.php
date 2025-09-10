
<?php
session_start();

$user = $_POST['usuario'];
$pass = $_POST['password'];

// Aquí puedes validar directamente con los datos fijos:
if ($user === "ADM777" && $pass === "12345678") {
    $_SESSION['usuario'] = $user;
    $_SESSION['rol'] = "admin";
    header("Location: ../InicioAdm.html");
    exit();
} else {
    echo "<h2>❌ Usuario o contraseña incorrectos (Admin)</h2>";
}
?>
