<?php
include_once("connectionPDO.php");
if(isset($_POST["user"]) && isset($_POST["pass"])){
    $server = new conexionServer();
    $record = $server -> verificar_existAdmin($_POST["user"],$_POST["pass"]);
}else{
    header("location:registroadmin.php?aviso='Llene todos los campos'");
}
if(isset($record)){
    if(($record["admin"] === $_POST["user"]) && ($record["pass"] === $_POST["pass"])){
        session_start();
        $info = $_POST["user"];
        $_SESSION["admin"] = "Admin";
        header("location:adminhome.php?id=$info");
    }else{
        header("location:registroadmin.php?aviso='No existen sus credenciales'");
    }
}
?>