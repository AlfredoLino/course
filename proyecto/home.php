<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="styleHomeAdmin.css">

    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet">
</head>
<body>
    <?php
        session_start();
        if(isset($_SESSION["usuario"])){
            $usuarioHome = $_SESSION["usuario"];
        }else{
            header("location:index.php");
        }
    ?>
    <nav>
        <a class = "btn btn-primary" href="closeSession.php">Cerrar sesion.</a>
    </nav>
    <h1><?php echo $usuarioHome;?></h1>
    <section class = "tablas">
        <table>
            <tr><th>Equipo</th> <th>Escuela</th> <th>Categoria</th><th>Evento</th><th>ID</th></tr>
            <?php
                $CAT = $_GET["categoria"];
                require("connectionPDO.php");
                $conexion = new conexionServer();
                $registro = $conexion ->mostrar_equipos_Juez($CAT);
                while($record = $registro ->fetch(PDO::FETCH_ASSOC)){
                $nombre = $record["nombre"];
                $escuela = $record["escuela"];
                $categoria = $record["categoria"];
                $evento = $record["evento"];
                $evento_nombre = $conexion ->buscar_evento($evento);
                $eve = $evento_nombre["nombre"];
                $_idequipo = $record["id"];
                echo "<tr>
                        <td>$nombre</td>
                        <td>$escuela</td>
                        <td>$categoria</td>
                        <td>$eve</td>
                        <td>$_idequipo</td>
                        <td><a class = 'btn btn-primary'href = 'calificaciones.php?nombre_equipo=$nombre&id_equipo=$_idequipo&evento=$evento&session=$usuarioHome&categoria=$CAT'>calificaciones</a></td>
                    </tr>";
                }
            ?>
        </table>
     </section>

</body>
</html>
