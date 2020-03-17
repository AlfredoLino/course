<?php 
    require("sessionOnAdmin.php");
    if(!empty($_POST["nombre"]) && !empty($_POST["edad"]) &&!empty($_POST["equipo"])){
        require("connectionPDO.php");
        $conexion = new conexionServer();
        $record = $conexion ->buscar_equipo_ID($_POST["equipo"]);
        $integrantes_nuevos = intval($record["integrantes_in"])+1;
        if(intval($record["integrantes_in"]) === intval($record["integrantes_max"])){
            header("location:altaintegrante.php?aviso='Ya no hay espacio en el equipo pa'");
            $insertar = false;
        }
        $record = $conexion ->mostrar_integrantes();
        $insertar = true;
        while ($record2 = $record ->fetch(PDO::FETCH_ASSOC)) {
            if(strtolower($_POST["nombre"]) === strtolower($record2["nombre"])){
                header("location:altaintegrante.php?aviso='Nombre de usuario ocupado'");
                $insertar = false;
            }    
        }
        if($insertar){
            $conexion ->update_integrantes($integrantes_nuevos,$_POST["equipo"]);
            $conexion ->alta_integrante($_POST["nombre"], $_POST["edad"],$_POST["equipo"]);
            echo "<h1>Integrante dado de alta con exito.</h1>
                   <a href ='adminhome.php'>Home</a>";
        }
    }
?>