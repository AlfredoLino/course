<?php

    require("connectionPDO.php");
    require("sessionOnAdmin.php");
    $conexion = new conexionServer();
    $conexion ->borrar_equipo($_GET["id"]);
    header("location:adminhome.php");

?>
