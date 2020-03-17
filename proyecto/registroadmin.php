<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login jurado | CONCURSO</title>    
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="styleindex.css">
</head>
<body>
    <nav>
        <h2>Login</h2>
    </nav>
    <div class = "contenedor-login">
        <h1>INICIAR SESIÓN</h1><br>
        <h1>ADMINISTRADOR</h1>
        <form action = "verificaradmin.php"  method = "post">
            <label for="username">Usuario</label>
            <input required type="text" class = "form-control" placeholder="usuario" name = "user">

            <label for="password">Contraseña</label>
            <input required type="password" class = "form-control" placeholder="contraseña" name ="pass">
            <input type="submit" class ="btn btn-primary" value="Acceder">
        </form>
        <a href="index.php" class = "btn btn-info">juez</a>
        <p><?php
            if(isset($_GET["aviso"])){
                echo $_GET["aviso"];
            }
        ?></p>
    </div>
</body>
</html>