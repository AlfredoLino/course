<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Evaluación Programación</title>    
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../styleindex.css">
    <link rel="stylesheet" href="styles_calificaciones.css">
</head>

<body>

    <header>
        <nav>
            <h1>Construccion</h1>
            <?php
                $nombre = $_GET["nombre_equipo"];
                $_idequipo = $_GET["id_equipo"];
                $evento = $_GET["evento"];    
                $usuarioHome = $_GET["session"];
                $CAT = $_GET["categoria"];
            ?>
            <h1><a class = "btn btn-primary"href=<?php echo "'../calificaciones.php?
                nombre_equipo=$nombre&id_equipo=$_idequipo&evento=$evento&session=$usuarioHome&categoria=$CAT'" ?>>Regresar</a></h1>
        </nav>
    </header>
    <div class="contenedor-login">
        <form action="calificar_constr.php?nombre=<?php echo $_idequipo;?>&evento=<?php echo $evento;?>&categoria=<?php echo $CAT;?>" method="POST">
            <h1>Construccion</h1>
                <h2>Inspección General</h2>
                <input type="number" class = "form-control"name="insp_gral" min="1" max="5" step="1" value="0">
                <h2>Libreta de ingenieria</h2>
                <input type="number" class = "form-control" name="libreta" min="1" max="5" step="1" value="0">
                <input type="submit" class = "btn btn-info" value="Registrar">
        </form>
    </div>
</body>

</html>