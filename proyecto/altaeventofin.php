<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head> 
<body>
    <?php
        require("sessionOnAdmin.php");
        require("connectionPDO.php");
        $alta = new conexionServer();
        if(!empty($_POST["nombre"]) && (!empty($_POST["fecha"]) && strlen($_POST["fecha"])) && !empty($_POST["lugar"])){
            $verificar_existencia = $alta ->buscar_evento_NOMBRE($_POST["nombre"]);
            if($verificar_existencia["nombre"] === $_POST["nombre"]){
                echo "<h1>El evento nombrado ya existe</h1>";
            }
            else{
                $alta -> alta_evento($_POST["nombre"],$_POST["fecha"], $_POST["lugar"]);
                $record = $alta -> buscar_evento_NOMBRE($_POST["nombre"]);
            }
        }else{
            header("location:altaevento.php?aviso='Llene todo los datos por favor.'");
        }

        if(!empty($record)){
            $nombreEvento = $record["nombre"];
            echo "<h2> El evento $nombreEvento ha sido registrado.</h2>";
        }else{
            echo "<h2>Ha ocurrido un error.</h2>";
        }
    ?>
    <a href="adminhome.php">Home</a>
</body>
</html>