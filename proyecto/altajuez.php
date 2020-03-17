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
        <h1>REGISTRAR JUEZ</h1>
        <form action="altajuezfin.php" method="POST">
            <label for="Nombre">Nombre</label>
            <input class = "form-control" required type="text" placeholder="Nombre del equipo" name = "nombre">
            <label for="categoria">Categoria</label>
            <select class = "form-control" name="categoria">
                <option value="Primaria">Primaria</option>
                <option value="Secundaria">Secundaria</option>
                <option value="Preparatoria">Preparatoria</option>
                <option value="Universidad">Universidad</option>
            </select>
            <label for="passone">Ingrese la contraseña</label>
            <input class = "form-control" required type="password" placeholder="password" name = "passone" >
            <label for="passconfirm">Confirme contraseña</label>
            <input class = "form-control" required type="password" placeholder="password" name = "passconfirm" >
            
            <input type="submit" class = "btn btn-primary" value="Registrar">            
        </form>
        <?php if(isset($_GET["aviso"])){
            echo $_GET["aviso"];
        } 
        ?>
    </div>    
</body>

</html>