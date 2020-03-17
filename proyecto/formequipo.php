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
            <a class = "btn btn-primary" href="adminhome.php">HOME</a>
        </nav>
</header>
    <?php require("sessionOnAdmin.php");?>
    <div class="contenedor-login">
        <h1>REGISTRA TU EQUIPO</h1>
        <form  action="altaequipo.php" method="POST">
            <label for="Nombre">Nombre</label>
            <input required class = "form-control"type="text" placeholder="Nombre del equipo" name = "nombre">
            <label for="numerointegrantes">Integrantes</label>
            <input required class = "form-control"type="number" min="2" name="integrantes" max="5" placeholder="numero de Integrantes">
            
            <label for="categoria">Categoria</label>
            <select class = "form-control"name="categoria">
                <option value="Primaria">Primaria</option>
                <option value="Secundaria">Secundaria</option>
                <option value="Preparatoria">Preparatoria</option>
                <option value="Universidad">Universidad</option>
            </select>
            
            <label for="escuelaprocedencia">Institución</label>
            <input class = "form-control"required type="text" placeholder="Escuela de procedencia" name = "esc_proc" >
            <label for="evento">Seleccione el Evento:</label>
            <select class = "form-control"name="evento">
                <?php 
                    require("connectionPDO.php");
                    $conexion = new conexionServer();
                    $registro = $conexion ->mostrar_eventos();
                    while($record = $registro ->fetch(PDO::FETCH_ASSOC)){
                        $nombre=$record["nombre"];
                        $_idevento = $record["id"];
                        echo "<option value='$_idevento'>$nombre</option>";
                    }
                ?>
            </select>
            
            <input type="submit" value="Registrar">            
        </form>
        <?php if(isset($_GET["aviso"])){
            echo $_GET["aviso"];
        }
        if(isset($_POST["nombre"])){
            echo $_POST["nombre"];
        }
        
        ?>
    </div>    
</body>

</html>