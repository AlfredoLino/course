<?php
    require("sessionOnAdmin.php");
    require("connectionPDO.php");
    $conexion = new conexionServer();
    if(!empty($_POST["nombre"]) && !empty($_POST["esc_proc"]) 
    && !empty($_POST["integrantes"]) && !empty($_POST["categoria"]) && !empty($_POST["evento"])){
        
        $verificar_exist = $conexion ->buscar_equipo_NOMBRE($_POST["nombre"]);
        if($verificar_exist["nombre"] === $_POST["nombre"]){
            header("location:formequipo.php?aviso='Ya hay un equipo con ese nombre, crack.'");    
        }else{
            $conexion ->alta_equipo($_POST["nombre"],$_POST["categoria"],$_POST["esc_proc"], $_POST["evento"] ,$_POST["integrantes"]);
            echo "Equipo dado de alta con exito";
            echo "<a href='adminhome.php'>Admin Home</a>";
        }
    }else{
        header("location:formequipo.php?aviso='llene todos los campos'");
    }
?>