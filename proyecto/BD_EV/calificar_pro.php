<?php
    require("../sessionOnJuez.php");
    require("../connectionPDO.php");
    echo $_POST["sist_aut"];
    if (!empty($_POST["sist_aut"])  && !empty($_POST["insp_gral"])  && !empty($_POST["sist_man"]) && !empty($_POST["demostracion"])) {
        $conexion = new conexionServer();
        $conexion ->calificar_programacion($_GET["nombre"], $_GET["evento"], $_POST["insp_gral"],
        $_POST["sist_aut"], $_POST["sist_man"], $_POST["demostracion"]);
        $categoria = $_GET["categoria"];
        //echo $_POST["id"] ." ".$_POST["evento"].$_POST["insp_gral"];
        //echo "<a href'../home.php?categoria=$categoria'></a>";
        header("location:../home.php?categoria=$categoria");
    }
?>