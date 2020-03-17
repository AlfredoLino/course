<?php
    require("../sessionOnJuez.php");
    require("../connectionPDO.php");
    if (!empty($_POST["bitacora"])  && !empty($_POST["medio"])) {
        $conexion = new conexionServer();
        $conexion ->calificar_design($_GET["nombre"], $_GET["evento"], $_POST["bitacora"],
        $_POST["medio"]);
        $categoria = $_GET["categoria"];
        //echo $_POST["id"] ." ".$_POST["evento"].$_POST["insp_gral"];
        //echo "<a href'../home.php?categoria=$categoria'></a>";
        header("location:../home.php?categoria=$categoria");
    }
?>