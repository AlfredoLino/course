<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registro equipo | CONCURSO</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="styleindex.css">
</head>
<body>
<header>
        <nav>
            <a class = "btn btn-info"href="adminhome.php">HOME</a>
        </nav>
</header>
    <?php require("sessionOnAdmin.php");?>
    <div class="contenedor-login">
        <h1>REGISTRAR INTEGRANTE</h1>
        <form  action="altaintegrantefin.php" method="POST">
            <label for="Nombre">Nombre</label>
            <input required type="text" class = "form-control" placeholder="Nombre del integrante" name = "nombre" maxlength="50">
            <label for="numerointegrantes">Edad</label>
            <input required type="number"class = "form-control" name="edad" placeholder="Edad" max="25">
            <label for="evento">Seleccione el Equipo:</label>
            <select class = "form-control"name="equipo">
                <?php 
                    require("connectionPDO.php");
                    $conexion = new conexionServer();
                    $registro = $conexion ->mostrar_equipos();
                    while($record = $registro ->fetch(PDO::FETCH_ASSOC)){
                        $nombre=$record["nombre"];
                        $_idevento = $record["id"];
                        echo "<option value='$_idevento'>$nombre</option>";
                    }
                ?>
            </select>
            <input type="submit" class = "btn btn-primary" value="Registrar">            
        </form>
        <?php  if(isset($_GET["aviso"])){
             echo $_GET["aviso"];
        }
        // if(isset($_POST["nombre"])){
        //     echo $_POST["nombre"];
        // }
        ?>
    </div>    
</body>

</html>