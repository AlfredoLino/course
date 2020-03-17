<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="styleHomeAdmin.css">
    <title>Document</title>
</head>
<body>
<?php
    require("sessionOnJuez.php");
?>
<?php
    require("connectionPDO.php");
    $conexion = new conexionServer();
?>
    <nav>
        <?php 
            $CAT = $_GET["categoria"];

        echo "<a class = 'btn btn-primary'href='home.php?categoria=$CAT'>Home</a>"?>
    </nav>
    <h1>Calificaciones de <?php echo $_GET["nombre_equipo"];?></h1>

    <div class="contenedorPadre tablas">
        <?php
            $nombre = $_GET["nombre_equipo"];
            $_idequipo = $_GET["id_equipo"];
            $evento = $_GET["evento"];
            $usuarioHome = $_GET["session"];
            $CAT = $_GET["categoria"];
        ?>
        <div class="contenedor">
            <h2>Construccion: </h2>
            <?php //echo $_GET["id_equipo"] . " ". $_GET["evento"] ?>
            <table>
                <tr>
                    <th>Inspeccion gral.</th>
                    <th>Libreta ing.</th>
                    <th>Prom</th>
                </tr>
                <?php
                    $registro=$conexion ->mostrar_calificacion_construc_equipo($_GET["id_equipo"], $_GET["evento"]);
                    while ($record = $registro ->fetch(PDO::FETCH_ASSOC)) {
                        $col1 = $record["insp_gral"];
                        $col2 = $record["libreta_ing"];
                        if(isset($col1) && isset($col2)){
                            $promedio = floatval((floatval($col1) + floatval($col2))/2);
                        }
                        echo "<tr id = 'cali_cons'><td>$col1</td><td>$col2</td><td class='promedio'>$promedio</td></tr>";
                         
                    }
            
                ?>   
                <tr><td rowspan = "2"><a id="btn_cons" class = "btn btn-primary" href=<?php echo "'BD_EV/for_construccion.php?
                nombre_equipo=$nombre&id_equipo=$_idequipo&evento=$evento&session=$usuarioHome&categoria=$CAT'"?>>Calificar</a></td></tr>
             
            </table>
        </div>        
        <div class="contenedor">        
            <h2>Programacion: </h2>
            <table>
                <tr>
                    <th>Inspeccion gral.</th>
                    <th>Sistema autonomo</th>
                    <th>Sistema manual</th>
                    <th>Demostracion</th>
                    <th>Prom</th>
                </tr>
                <?php
                    $registro=$conexion ->mostrar_calificacion_prog_equipo($_GET["id_equipo"], $_GET["evento"]);
                    while ($record = $registro ->fetch(PDO::FETCH_ASSOC)) {
                        $col1 = $record["insp_gral"];
                        $col2 = $record["sist_auto"];
                        $col3 = $record["sist_man"];
                        $col4 = $record["demo"];
                        if(isset($col1) && isset($col2) && isset($col3) && isset($col4)){
                            $promedio = round((floatval($col1) + floatval($col2) + floatval($col3) + floatval($col4))/4, PHP_ROUND_HALF_UP);
                        }
                        echo "<tr id = 'cali_prog'><td>$col1</td><td>$col2</td><td>$col3</td><td>$col4</td><td class='promedio'>$promedio</td></tr>";
                            
                    }
                
                ?>    
                <tr><td rowspan = "2"><a id="btn_prog" class = "btn btn-primary" href=<?php echo "'BD_EV/for_programacion.php?
                nombre_equipo=$nombre&id_equipo=$_idequipo&evento=$evento&session=$usuarioHome&categoria=$CAT'"?>>Calificar</a></td></tr>            
            </table>    
        </div>      
        <div class="contenedor">  
        <h2>Diseño: </h2>
            <table class = ".table">
                <tr>
                    <th>Bitacora</th>
                    <th>Medio digital</th>
                    <th>Prom</th>
                </tr>
                <?php
                    $registro=$conexion ->mostrar_calificacion_design_equipo($_GET["id_equipo"], $_GET["evento"]);
                    while ($record = $registro ->fetch(PDO::FETCH_ASSOC)){
                        $col1 = $record["bitacora"];
                        $col2 = $record["medio_digital"];
                        if(isset($col1) && isset($col2)){
                            $promedio = floor((floatval($col1) + floatval($col2))/2.0);
                        }
                        echo "<tr id = 'cali_design'><td>$col1</td><td>$col2</td><td class='promedio'>$promedio</td></tr>";
                    }
                ?>
                <tr><td rowspan = "2"><a id="btn_design"class = "btn btn-primary" href=<?php echo "'BD_EV/for_diseño.php?
                nombre_equipo=$nombre&id_equipo=$_idequipo&evento=$evento&session=$usuarioHome&categoria=$CAT'"?>>Calificar</a></td></tr>
            </table>
        </div>
    </div>
    <script src = "jquery.js"></script>
    <script src="script.js"></script>
</body>
</html>

