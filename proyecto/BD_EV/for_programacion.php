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
            <h1>Programacion
            </h1>
            <?php
                $nombre = $_GET["nombre_equipo"];
                $_idequipo = $_GET["id_equipo"];
                $evento = $_GET["evento"];    
                $usuarioHome = $_GET["session"];
                $CAT = $_GET["categoria"];
            ?>
            <h1><a class = "btn btn-primary" href=<?php echo "'../calificaciones.php?
                nombre_equipo=$nombre&id_equipo=$_idequipo&evento=$evento&session=$usuarioHome&categoria=$CAT'" ?>>Regresar</a></h1>
        </nav>

    </header>
    <div class="contenedor-login">
        <form action="calificar_pro.php?nombre=<?php echo $_idequipo;?>&evento=<?php echo $evento;?>&categoria=<?php echo $CAT;?>" method="POST">
                
                <h2>Sistema Autonomo</h2>
                <input required type="number" class = "form-control" name="sist_aut" min="0" max="2.5" step="0.1" >
                <h2>Inspección General</h2>
                <input required type="number" class = "form-control" name="insp_gral" min="0" max="2.5" step="0.1" >
                <h2>Sistema Manipulado</h2>
                <input required type="number" class = "form-control" name="sist_man" min="0" max="2.5" step="0.1">
                <h2>DEMOSTRACIÓN</h2>
                <input required type="number" class = "form-control" name="demostracion" min="0" max="2.5" step="0.1">
                <input type="submit" class = "btn btn-primary" value="Registrar">
        </form>
    </div>

</body>

</html>