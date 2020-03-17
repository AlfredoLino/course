<?php
        function fechaFormated($fecha){
            $array = preg_split("/\//", $fecha);
            $array = array_reverse($array);
            $date = "";
            for ($i=0; $i < 3; $i++) { 
                $date = $date.$array[$i];
                if($i === 2){
                    break;
                }
                $date = $date."/";
            }
            return $date;
        }
?>