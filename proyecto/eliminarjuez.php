<?php
    require("sessionOnAdmin.php");
    require("connectionPDO.php");
    $conexion = new conexionServer();
    $conexion ->borrar_juez($_GET["idevento"]);
    header("location:adminhome.php");
?>