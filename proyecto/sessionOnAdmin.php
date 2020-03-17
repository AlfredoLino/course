<?php
        session_start();
        if(isset($_SESSION["admin"])){
            $usuarioAdmin = "Administrador";
        }else{
            header("location:index.php");
        }
?>
