<?php
include('DataBase.php');

session_start();

if (!isset($_SESSION["id_usuario"])) {
    die("Error: No hay usuario logueado.");
}

$id_usuario = $_SESSION["id_usuario"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id_usuario = $_POST["id_usuario"];
    $titulo = $_POST["titulo"];
    $descripcion = $_POST["descripcion"];
    $img = '';

   
    if (isset($_FILES["imagen"]) && $_FILES["imagen"]["error"] == 0) {
        $tmp = $_FILES["imagen"]["tmp_name"];
        $nombreArchivo = basename($_FILES["imagen"]["name"]);
        $nombreUnico = uniqid() . "_" . $nombreArchivo;
        move_uploaded_file($tmp, 'images/' . $nombreUnico);
        $img = $nombreUnico;
    }

   
    $query = "INSERT INTO proyectos(id_usuario, titulo, descripcion) 
              VALUES('".$id_usuario."', '".$titulo."', '".$descripcion."');";
    $result = $link->query($query);

    if ($result) {
       
        $id_proyecto = $link->insert_id;

        
        $queryImg = "INSERT INTO img_proyectos(id_proyecto, imagen) 
                     VALUES('".$id_proyecto."', '".$img."');";
        $resultImg = $link->query($queryImg);

        if ($resultImg) {
            echo "<h3>Datos cargados correctamente!</h3><br>";
            header("location: http://localhost/Technology-Page/Inicio.php");
            exit;
        } else {
            echo "<h3>Error al guardar la imagen!</h3><br>";
        }
    } else {
        echo "<h3>No se cargaron los datos del proyecto</h3><br>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Subir Proyectos</title>
</head>
<body>
<div class="container mb-4">
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_usuario" value="1">

        <div>
            <label for="titulo">Titulo</label>
            <input type="text" name="titulo" id="titulo">
        </div>  
        <div>
            <label for="descripcion">Descripcion</label>
            <input type="text" name="descripcion" id="descripcion">
        </div>
        <div>
            <label for="imagen">Imagen</label>
            <input type="file" name="imagen" id="imagen">
        </div>
        <input type="submit" class="btn btn-primary mt-3" value="Guardar">
    </form>
</div>
</body>
</html>
