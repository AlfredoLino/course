<?php 

    require("sessionOnAdmin.php");
    if(!empty($_POST["nombre"]) && !empty($_POST["categoria"]) 
    &&!empty($_POST["passone"]) && !empty($_POST["passconfirm"])){
        if($_POST["passone"] !== $_POST["passconfirm"]){
            header("location:altajuez.php?aviso='Las contraseñas no coinciden'");
        }else{
            require("connectionPDO.php");
             $conexion = new conexionServer();
             $record = $conexion ->mostrar_juecez();
             $insertar = true;
             while ($record2 = $record ->fetch(PDO::FETCH_ASSOC)) {
                  if(strtolower($_POST["nombre"]) === strtolower($record2["nombre"])){
                      header("location:altajuez.php?aviso='Nombre de usuario ocupado'");
                      $insertar = false;
                  }    
             }
             if($insertar){
                $conexion ->alta_juez($_POST["nombre"], $_POST["categoria"], password_hash($_POST["passone"], PASSWORD_DEFAULT));
                echo "<h1>Juez dado de alta con exito.</h1>
                        <a href = 'adminhome.php'>Home</a>";
            }
        }
    }

?>