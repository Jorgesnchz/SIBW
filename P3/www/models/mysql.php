<?php

    function connect(){
        $mysqli = new mysqli('database', 'Jorgesnchz', 'jorgesnchz', 'SIBW');
        if ($mysqli->connect_errno) {
            echo ('Connect failed: '.$mysqli->connect_error);
            exit();
        }
        return $mysqli;
    }

    function getActividad($id, $mysqli){
        $actividad = array();
        $resultado = $mysqli->query("SELECT * FROM actividades WHERE id = $id");
        if($resultado->num_rows > 0){
            $row = $resultado->fetch_assoc();
            $actividad['nombre'] = $row['nombre'];
            $actividad['precio'] = $row['precio'];
            $actividad['fecha'] = $row['fecha'];
            $actividad['imagen1'] = $row['imagen1'];
            $actividad['imagen2'] = $row['imagen2'];
            $actividad['imagen3'] = $row['imagen3']; 
            $actividad['descripcion'] = $row['descripcion'];
        }
        return $actividad;
    }

    function getValoraciones($id, $mysqli){

        $valoraciones = array();
        $resultado = $mysqli->query("SELECT * FROM valoraciones WHERE actividad_id = $id");
        if( $resultado->num_rows > 0){
            $contador = 0;
            while($row = $resultado->fetch_assoc()){
                $valoraciones[$contador] = array('nombre' => $row['nombre'], 'comentario' => $row['comentario'], 'fecha' => $row['fecha']);
                $contador++;
            }
        }

        return $valoraciones;
    }

    function getPalabrasProhibidas($mysqli){
        $palabras = array();
        $resultado = $mysqli->query("SELECT * FROM palabras_prohibidas");
        if($resultado->num_rows > 0){
            $contador = 0;
            while($row = $resultado->fetch_assoc()){
                $palabras[$contador] = $row['palabra'];
                $contador++;
            }
        }
        return $palabras;
    }

    function getListaActividades($mysqli){
        $actividades = array();
        $resultado = $mysqli->query("SELECT * FROM actividades");
        if($resultado->num_rows > 0){
            $contador = 0;
            while($row = $resultado->fetch_assoc()){
                $actividades[$contador] = array( 'nombre' => $row['nombre'], 'enlace' => $row['enlace'], 'imagen1' => $row['imagen1']);
                $contador++;
            }
        }
        return $actividades;
    }

?>
