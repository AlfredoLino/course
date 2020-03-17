<?php
include_once("connectionPDO.php");
if(!empty($_POST["user"]) && !empty($_POST["pass"])){
    $server = new conexionServer();
    $record = $server -> verificar_exist($_POST["user"]);
}else{
    header("location:index.php?aviso='Llene todos los campos'");
}
if(!empty($record)){
    if(($record["nombre"] === $_POST["user"]) && (password_verify($_POST["pass"], $record["pass"]))){
        session_start();
        $cosa = $_POST["user"];
        $cat = $record["categoria"];   
        $_SESSION["usuario"] = $record["nombre"];
        header("location:home.php?id=$cosa&categoria=$cat");
    }else{
        $cosa = $record["pass"] . "Pass: ". password_hash($_POST["pass"], PASSWORD_DEFAULT);
        header("location:index.php?aviso='No existen sus credenciales $cosa'");
    }
}else{
    $cosa = "aaaaaaaaaaa";
    header("location:index.php?aviso='No existen sus credenciales $cosa'");
}
?>