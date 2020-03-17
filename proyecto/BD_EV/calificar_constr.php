<?php
    require("../sessionOnJuez.php");
    require("../connectionPDO.php");
    if (!empty($_POST["insp_gral"])  && !empty($_POST["libreta"])) {
        $conexion = new conexionServer();
        $conexion ->calificar_construccion($_GET["nombre"], $_GET["evento"], $_POST["insp_gral"],
        $_POST["libreta"]);
        $categoria = $_GET["categoria"];
        //echo $_POST["id"] ." ".$_POST["evento"].$_POST["insp_gral"];
        //echo "<a href'../home.php?categoria=$categoria'></a>";
        header("location:../home.php?categoria=$categoria");
    }
?>