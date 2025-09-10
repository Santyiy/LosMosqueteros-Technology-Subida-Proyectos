<?php
include('DataBase.php')

$id_usuario = $_POST["id_usuario"];
$titulo = $_POST["titulo"];
$descripcion = $_POST["descripcion"];
$img = $_POST["imagen"];

$img = '';
if (isset($_FILES["imagen"]) && $_FILES["imagen"]["error"] == 0) {
    $tmp = $_FILES["imagen"]["tmp_name"];
    $nombreArchivo = basename($_FILES["imagen"]["name"]);
    $nombreUnico = uniqid() . "_" . $nombreArchivo;
    move_uploaded_file($tmp, 'images/' . $nombreUnico);
    $img = $nombreUnico;
}

$query = "INSERT INTO proyectos(id_usuario, titulo, descripcion)VALUES('".$id_usuario."','".$titulo."','".$descripcion."');"
or die ("Error".mysqli_error($link));
$result = $link->query($query);

if($result==1){
    echo("<h3>Datos Cargados</h3>");
    header("location: http://localhost/Technology-Page/Inicio.php");

}else{

echo("<h3>No se cargaron los datos</h3>");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <title>Subir Proyectos</title>
</head>
<body>
<div class="container mb-4">
        <nav class="navbar navbar-expand-sm navbar-light bg-light">
            <a class="navbar-brand" href="Inicio.php">Technology</a>
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="Proyectos.php">Proyectos</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="Subirproyectos.php">Subir Proyectos</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="Chat.php">Chat General</a>
                    </li>
                </ul>
            </div>
        </nav>
        

    </div>

    <div class="container mb-4">
        <form action="" method="post">
            <div>
            <label for="titulo">Titulo</label>
              <input type="text" name="titulo" id="titulo">
              </div>  
              <div>
            <label for="descripcion">Descripcion</label>
                <input type="color" name="" id="">
            </div>
            <input type="button" value="Guardar">


        </form>
    </div>
    
</body>
</html>