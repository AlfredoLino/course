<?php

    class conexionServer{
        var $conexion;
        var $sqlquery;
        var $statment;

        function __construct(){
            try {
                $this ->conexion = new PDO("mysql:host=localhost; dbname=proyecto", "root", "");
                //$conexion -> setAttribute(PDO::ATTR_ERRMOD, PDO::ERRMOD_EXCEPTION);
                $this ->conexion -> exec("set character set utf8");

            } catch (Exception $th) {
                die("Error ". $th->GetMessage());
            }
        }
        //INSERTS
        function alta_evento($nombre, $fecha, $lugar){ //Dar de alta evento
            $this ->sqlquery = "insert into evento(nombre, fecha,lugar) values(:NOMBRE, :FECHA, :LUGAR)";
            $this ->statment = $this ->conexion ->prepare($this ->sqlquery);
            $nombre = htmlentities(addslashes($nombre));
            $fecha = htmlentities(addslashes($fecha));
            $lugar = htmlentities(addslashes($lugar));
            $this ->statment ->bindParam(":NOMBRE", $nombre);
            $this ->statment ->bindParam(":FECHA",$fecha);
            $this ->statment ->bindParam(":LUGAR",$lugar);
            $this ->statment ->execute();
        }
        function alta_integrante($nombre, $edad, $equipo){ //Dar de alta evento
            $this ->sqlquery = "insert into integrante(nombre, edad, equipo) values(:NOMBRE, :EDAD, :EQUIPO)";
            $this ->statment = $this ->conexion ->prepare($this ->sqlquery);
            $nombre = htmlentities(addslashes($nombre));
            $edad = htmlentities(addslashes($edad));
            $equipo = htmlentities(addslashes($equipo));
            $this ->statment ->bindParam(":NOMBRE", $nombre);
            $this ->statment ->bindParam(":EDAD", $edad);
            $this ->statment ->bindParam(":EQUIPO",$equipo);
            $this ->statment ->execute();

        }
        function alta_juez($nombre, $categoria, $pass){ // Dar de a un juez
            $this ->sqlquery = "insert into juez(nombre, categoria, pass) values(:NOMBRE, :CATEGORIA, :PASS)";
            $this ->statment = $this ->conexion ->prepare($this ->sqlquery);
            $nombre = htmlentities(addslashes($nombre));
            $categoria = htmlentities(addslashes($categoria));
            $pass = htmlentities(addslashes($pass));
            $this ->statment ->bindParam(":NOMBRE", $nombre);
            $this ->statment ->bindParam(":CATEGORIA",$categoria);
            $this ->statment ->bindParam(":PASS",$pass);
            $this ->statment ->execute();

        }
        function alta_equipo($nombre, $categoria, $escuela, $evento, $inte_max){
            $this ->sqlquery = "insert into equipo(nombre, categoria, escuela, evento, integrantes_max)values
            (:NOMBRE, :CAT, :ESCUELA, :EVENTO, :INTE)";
            $this ->statment = $this ->conexion ->prepare($this ->sqlquery);
            $nombre = htmlentities(addslashes($nombre));
            $categoria = htmlentities(addslashes($categoria));
            $escuela = htmlentities(addslashes($escuela));
            $evento = htmlentities(addslashes($evento));
            $inte_max = htmlentities(addslashes($inte_max));
            $this ->statment ->bindParam(":NOMBRE", $nombre);
            $this ->statment ->bindParam(":CAT",$categoria);
            $this ->statment ->bindParam(":ESCUELA",$escuela);
            $this ->statment ->bindParam(":EVENTO",$evento);
            $this ->statment ->bindParam(":INTE", $inte_max);
            $this ->statment ->execute();
        }
        function calificar_programacion($id, $evento, $insp_gral, $sist_auto, $sist_man, $demo){
            $this ->sqlquery = "insert into programacion values(:ID, :EVENTO, :INSP_GRAL, :SIST_AUTO, :SIST_MAN, :DEMO)";
            $this ->statment = $this ->conexion ->prepare($this ->sqlquery);
            $this ->statment ->bindParam(":ID", $id);
            $this ->statment ->bindParam(":INSP_GRAL", $insp_gral);
            $this ->statment ->bindParam(":SIST_AUTO",$sist_auto);
            $this ->statment ->bindParam(":EVENTO",$evento);
            $this ->statment ->bindParam(":SIST_MAN", $sist_man);
            $this ->statment ->bindParam(":DEMO", $demo);
            $this ->statment ->execute();
        }
        function calificar_construccion($id, $evento, $insp, $libreta){
            $this ->sqlquery = "insert into construccion values(:ID, :EVENTO, :INSP, :LIBRETA)";
            $this ->statment = $this ->conexion ->prepare($this ->sqlquery);
            $this ->statment ->bindParam(":ID", $id);
            $this ->statment ->bindParam(":INSP", $insp);
            $this ->statment ->bindParam(":LIBRETA",$libreta);
            $this ->statment ->bindParam(":EVENTO",$evento);
            $this ->statment ->execute();
        }
        function calificar_design($id, $evento, $bitacora, $medio){
            $this ->sqlquery = "insert into design values(:ID, :EVENTO, :BITACORA, :MEDIO)";
            $this ->statment = $this ->conexion ->prepare($this ->sqlquery);
            $this ->statment ->bindParam(":ID", $id);
            $this ->statment ->bindParam(":BITACORA", $bitacora);
            $this ->statment ->bindParam(":MEDIO",$medio);
            $this ->statment ->bindParam(":EVENTO",$evento);
            $this ->statment ->execute();
        }
        // DELETES
        function borrar_evento($nombre){
            $this ->sqlquery = "delete from evento where nombre = :NOMBRE";
            $this ->statment = $this ->conexion ->prepare($this ->sqlquery);
            $this ->statment ->bindParam(":NOMBRE", $nombre);
            $this ->statment ->execute();
        }

        function borrar_equipo($id){
            $this ->sqlquery = "delete from equipo where id = :ID";
            $this ->statment = $this ->conexion ->prepare($this ->sqlquery);
            $this ->statment ->bindParam(":ID", $id);
            $this ->statment ->execute();
        }
        function borrar_juez($id){
            $this ->sqlquery = "delete from juez where id = :ID";
            $this ->statment = $this ->conexion ->prepare($this ->sqlquery);
            $this ->statment ->bindParam(":ID", $id);
            $this ->statment ->execute();
        }
        //SELECTS
        function verificar_exist($nombre){
            $this ->sqlquery = "select * from juez where nombre = :NOMBRE";
            $this ->statment = $this ->conexion ->prepare($this ->sqlquery);
            $nombre = htmlentities(addslashes($nombre));
            $this ->statment ->bindParam(":NOMBRE", $nombre);
            $this ->statment ->execute();
            $d_f = $this ->statment ->fetch(PDO::FETCH_ASSOC);

            return $d_f;
        }


        function verificar_existAdmin($user, $contra){
            $this ->sqlquery = "select * from admin where admin = :user and pass = :pass";
            $this ->statment = $this ->conexion ->prepare($this ->sqlquery);
            $contra = htmlentities(addslashes($contra));
            $user = htmlentities(addslashes($user));
            $this ->statment ->bindParam(":user", $user);
            $this ->statment ->bindParam(":pass", $contra);
            $this ->statment ->execute();
            $d_f = $this ->statment ->fetch(PDO::FETCH_ASSOC);
            return $d_f;
        }

        function mostrar_eventos(){
            $this ->sqlquery = "select * from evento";
            $this ->statment = $this ->conexion ->prepare($this ->sqlquery);
            $this ->statment ->execute();
            //$d_f = $this ->statment ->fetch(PDO::FETCH_ASSOC);
            return $this ->statment;
        }
        function mostrar_equipos(){
            $this ->sqlquery = "select * from equipo";
            $this ->statment = $this ->conexion ->prepare($this ->sqlquery);
            $this ->statment ->execute();
            //$d_f = $this ->statment ->fetch(PDO::FETCH_ASSOC);
            return $this ->statment;
        }
        function mostrar_integrantes(){
            $this ->sqlquery = "select * from integrante";
            $this ->statment = $this ->conexion ->prepare($this ->sqlquery);
            $this ->statment ->execute();
            //$d_f = $this ->statment ->fetch(PDO::FETCH_ASSOC);
            return $this ->statment;
        }

        function mostrar_equipos_Juez($categoria){
            $this ->sqlquery = "select nombre, escuela, categoria, id, evento from equipo where categoria = :CATEGORIA";
            $this ->statment = $this ->conexion ->prepare($this ->sqlquery);
            $this ->statment ->bindParam(":CATEGORIA", $categoria);
            $this ->statment ->execute();
            //$d_f = $this ->statment ->fetch(PDO::FETCH_ASSOC);
            return $this ->statment;
        }

        function mostrar_calificacion_construc_equipo($id, $evento){
            $this ->sqlquery = "select * from construccion where id = :ID and evento = :EVENTO";
            $this ->statment = $this ->conexion ->prepare($this ->sqlquery);
            //$this ->statment ->bindParam(":TABLA", $tabla);
            $this ->statment ->bindParam(":ID", $id);
            $this ->statment ->bindParam(":EVENTO", $evento);
            $this ->statment ->execute();
            //$d_f = $this ->statment ->fetch(PDO::FETCH_ASSOC);
            return $this ->statment;
        }



        function mostrar_calificacion_prog_equipo($id, $evento){
            $this ->sqlquery = "select * from programacion where id = :ID and evento = :EVENTO";
            $this ->statment = $this ->conexion ->prepare($this ->sqlquery);
            //$this ->statment ->bindParam(":TABLA", $tabla);
            $this ->statment ->bindParam(":ID", $id);
            $this ->statment ->bindParam(":EVENTO", $evento);
            $this ->statment ->execute();
            //$d_f = $this ->statment ->fetch(PDO::FETCH_ASSOC);
            return $this ->statment;
        }

        function mostrar_calificacion_design_equipo($id, $evento){
            $this ->sqlquery = "select * from design where id = :ID and evento = :EVENTO";
            $this ->statment = $this ->conexion ->prepare($this ->sqlquery);
            //$this ->statment ->bindParam(":TABLA", $tabla);
            $this ->statment ->bindParam(":ID", $id);
            $this ->statment ->bindParam(":EVENTO", $evento);
            $this ->statment ->execute();
            //$d_f = $this ->statment ->fetch(PDO::FETCH_ASSOC);
            return $this ->statment;
        }



        function mostrar_juecez(){
            $this ->sqlquery = "select nombre, id, categoria from juez";
            $this ->statment = $this ->conexion ->prepare($this ->sqlquery);
            $this ->statment ->execute();
            //$d_f = $this ->statment ->fetch(PDO::FETCH_ASSOC);
            return $this ->statment;
        }
        function mostrarEquipos($_juez){
            $this ->sqlquery = "select juez.ID, equipo.categoria, equipo.Nombre from
            juez join equipo on juez.ID = equipo.juez_ID where equipo.juez_ID = :id";
            $this ->statment = $this ->conexion ->prepare($this ->sqlquery);
            $this ->statment ->bindParam(":id", $_juez);
            $this ->statment ->execute();
            echo"<h2>Equipos: </h2>";
            while($d_f = $this ->statment ->fetch(PDO::FETCH_ASSOC)){
            $cat = $d_f['categoria'];
            $Nom = $d_f['Nombre'];
            echo " <p>Categoria: $cat <br> Equipo: $Nom</p> <br>";
            }
            return $d_f;
        }

        function buscar_equipo_NOMBRE($nombre){
            $this ->sqlquery = "select * from equipo where nombre = :NOMBRE";
            $this ->statment = $this ->conexion->prepare($this ->sqlquery);
            $this ->statment ->bindParam(":NOMBRE", $nombre);
            $this ->statment ->execute();
            $d_f = $this ->statment ->fetch(PDO::FETCH_ASSOC);
            return $d_f;
        }
        function buscar_equipo_ID($id){
            $this ->sqlquery = "select * from equipo where id = :ID";
            $this ->statment = $this ->conexion->prepare($this ->sqlquery);
            $this ->statment ->bindParam(":ID", $id);
            $this ->statment ->execute();
            $d_f = $this ->statment ->fetch(PDO::FETCH_ASSOC);
            return $d_f;
        }

        function buscar_evento_NOMBRE($nombre){
            $this ->sqlquery = "select * from evento where nombre = :NOMBRE";
            $this ->statment = $this ->conexion->prepare($this ->sqlquery);
            $this ->statment ->bindParam(":NOMBRE", $nombre);
            $this ->statment ->execute();
            $d_f = $this ->statment ->fetch(PDO::FETCH_ASSOC);
            return $d_f;
        }
        function buscar_evento($id){
            $this ->sqlquery = "select * from evento where id = :ID";
            $this ->statment = $this ->conexion->prepare($this ->sqlquery);
            $id = htmlentities(addslashes($id));
            $this ->statment ->bindParam(":ID", $id);
            $this ->statment ->execute();
            $d_f = $this ->statment ->fetch(PDO::FETCH_ASSOC);
            return $d_f;
        }
        function update_integrantes($integrantes, $equipo){
            $this ->sqlquery = "update equipo set integrantes_in = :I where id = :EQUIPO";
            $this ->statment = $this ->conexion ->prepare($this ->sqlquery);
            $this ->statment ->bindParam(":I", $integrantes);
            $this ->statment ->bindParam(":EQUIPO", $equipo);
            $this ->statment ->execute();
        }
    }
?>
