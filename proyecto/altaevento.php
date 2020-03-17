<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registro usuario | CONCURSO</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="styleindex.css">
</head>
<body>
    <header>
        <nav>
            <a class = "btn btn-primary"href="adminhome.php">HOME</a>
        </nav>
    </header>
<?php  require("sessionOnAdmin.php");?>

    <div class="contenedor-login">
        <h1>REGISTRAR EVENTO</h1>

        <form action = "altaeventofin.php" method = "POST">
            <label for="nombre">Nombre</label>
            <input class = "form-control"type="text" name = "nombre" placeholder="Nombre del Evento" maxlength = "50">
            <label for="fecha">Fecha</label>
            <input class = "form-control"type="date" name = "fecha">
            <label for="lugar">Lugar</label>
            <input class = "form-control"type="text" name = "lugar" placeholder="Lugar del evento" maxlength = "50">
            <input type="submit" class = "btn btn-primary"value="Registrar">

        </form>
        <p><?php
            if(isset($_GET["aviso"])){
                echo $_GET["aviso"];
            }
        ?></p>

</body>

</html>