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
            $actividad['descripcion'] = $row['descripcion'];
            $actividad['publicada'] = $row['publicada'];
        }

        $imagenes = $mysqli->query("SELECT * FROM imagenes WHERE actividad_id = $id");
        if($imagenes->num_rows > 0){
            $contador = 0;
            while($row = $imagenes->fetch_assoc()){
                $actividad['imagenes'][$contador] = $row['direccion'];
                $contador++;
            }
            $actividad['num_imagenes'] = $contador;
        }

        $hashtags = $mysqli->query("SELECT * FROM hashtags WHERE actividad_id = $id");
        if($hashtags->num_rows > 0){
            $contador = 0;
            while($row = $hashtags->fetch_assoc()){
                $actividad['hashtags'][$contador] = $row['hashtag'];
                $contador++;
            }
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

    function getListaActividades($mysqli, $tipo){
        $actividades = array();

        if($tipo < 2){
            $resultado = $mysqli->query("SELECT * FROM actividades WHERE publicada = 1");
        }
        else{
            $resultado = $mysqli->query("SELECT * FROM actividades");
        }

        if($resultado->num_rows > 0){
            $contador = 0;
            while($row = $resultado->fetch_assoc()){
                $actividades[$contador] = array( 'nombre' => $row['nombre'], 'enlace' => $row['enlace'], 'id' => $row['id'], 'publicada' => $row['publicada']);
                $contador++;
            }
        }
        
        foreach ($actividades as &$actividad) {
            $actividad_id = $actividad['id'];
            $imagenes_actividad = $mysqli->query("SELECT * FROM imagenes WHERE actividad_id = $actividad_id");
            if ($imagenes_actividad->num_rows > 0) {
                $actividad['imagen'] = $imagenes_actividad->fetch_assoc()['direccion'];
            }
        }
        return $actividades;
    }

    function getUser($usuario, $mysqli){
        $resultado = $mysqli->query("SELECT * FROM usuarios WHERE usuario = '$usuario'");
        if($resultado->num_rows > 0){
            return $resultado->fetch_assoc();
        }
        else{
            return null;
        }
    }

    function getUsuarios($mysqli){
        $usuarios = array();
        $resultado = $mysqli->query("SELECT * FROM usuarios");
        if($resultado->num_rows > 0){
            $contador = 0;
            while($row = $resultado->fetch_assoc()){
                $usuarios[$contador] = array('usuario' => $row['usuario'],
                    'correo' => $row['correo'], 'nombre' => $row['nombre'], 'tipo' => $row['tipo'], 'id' => $row['id']);
                $contador++;
            }
        }
        return $usuarios;
    }

    function addUsuario($usuario, $contrasena, $correo, $nombre, $mysqli){
        $sql = "INSERT INTO usuarios (usuario, contrasena, correo, nombre, tipo) VALUES ('$usuario', '$contrasena', '$correo', '$nombre', 0)";
        if($mysqli->query($sql) === TRUE){
            return true;
        }
        else{
            return false;
        }
    }

    function addValoracion($nombre, $comentario, $correo, $fecha, $id, $mysqli){
        $sql = "INSERT INTO valoraciones (nombre, comentario, correo, fecha, actividad_id) VALUES ('$nombre', '$comentario', '$correo', '$fecha', $id)";
        if($mysqli->query($sql) === TRUE){
            return true;
        }
        else{
            return false;
        }
    }

    function getNumeroImagenes($id, $mysqli){
        $resultado = $mysqli->query("SELECT * FROM imagenes WHERE actividad_id = $id");
        return (($resultado->num_rows)-1);
    }   

    function getIdUsuario($usuario, $mysqli){
        $resultado = $mysqli->query("SELECT * FROM usuarios WHERE usuario = '$usuario'");
        if($resultado->num_rows > 0){
            $row = $resultado->fetch_assoc();
            return $row['id'];
        }
        else{
            return null;
        }
    }

    function editarUsuario($id, $usuario, $correo, $nombre, $contrasena, $mysqli){
        $sql = "UPDATE usuarios SET usuario = '$usuario', correo = '$correo', nombre = '$nombre', contrasena = '$contrasena' WHERE id = $id";
        if($mysqli->query($sql) === TRUE){
            return true;
        }
        else{
            return false;
        }
    }

    function getComentarios($mysqli){
        $comentarios = array();
        $resultado = $mysqli->query("SELECT * FROM valoraciones");
        if($resultado->num_rows > 0){
            $contador = 0;
            while($row = $resultado->fetch_assoc()){
                $comentarios[$contador] = array('nombre' => $row['nombre'], 'comentario' => $row['comentario'], 
                    'fecha' => $row['fecha'], 'actividad_id' => $row['actividad_id'] , 'id' => $row['id']);
                $contador++;
            }
        }
        return $comentarios;
    }

    function getNumeroComentarios( $mysqli){
        $resultado = $mysqli->query("SELECT * FROM valoraciones");
        return $resultado->num_rows;
    }

    function borrarComentario($id, $mysqli){
        $sql = "DELETE FROM valoraciones WHERE id = $id";
        if($mysqli->query($sql) === TRUE){
            return true;
        }
        else{
            return false;
        }
    }

    function editaComentario($id, $comentario, $nombre, $mysqli){

        $sql = "UPDATE valoraciones SET comentario = '$comentario', nombre = '$nombre' WHERE id = $id";
        if($mysqli->query($sql) === TRUE){
            return true;
        }
        else{
            return false;
        }
    }

    function getNumSudo($mysqli){
        $resultado = $mysqli->query("SELECT * FROM usuarios WHERE tipo = 3");
        return $resultado->num_rows;
    }

    function getuserbyId($id, $mysqli){
        $resultado = $mysqli->query("SELECT * FROM usuarios WHERE id = $id");
        if($resultado->num_rows > 0){
            return $resultado->fetch_assoc();
        }
        else{
            return null;
        }
    }

    function borrarUsuario($id, $mysqli){
        $usuario = getuserbyId($id, $mysqli);
        
        if($usuario['tipo'] == 3){
            if(getNumSudo($mysqli) == 1){
                return false;
            }
        }
        
        $sql = "DELETE FROM usuarios WHERE id = $id";
        if($mysqli->query($sql) === TRUE){
            return true;
        }
        else{
            return false;
        }
        
    }

    function editaUsuario($id, $nombre, $correo, $tipo, $usuario, $mysqli){
        $usuarioCompleto = getuserbyId($id, $mysqli);
        if($usuarioCompleto['tipo'] == 3 && $tipo != 3){
            if(getNumSudo($mysqli) == 1){
                return false;
            }
        }
        $sql = "UPDATE usuarios SET nombre = '$nombre', correo = '$correo', tipo = $tipo, usuario = '$usuario' WHERE id = $id";
        if($mysqli->query($sql) === TRUE){
            return true;
        }
        else{
            return false;
        }
    }

    function getActividades($mysqli) {
        $actividades = array();
        $resultado = $mysqli->query("SELECT * FROM actividades");
        if ($resultado->num_rows > 0) {
            while ($row = $resultado->fetch_assoc()) {
                $actividades[] = array(
                    'id' => $row['id'],
                    'nombre' => $row['nombre'],
                    'precio' => $row['precio'],
                    'fecha' => $row['fecha'],
                    'descripcion' => $row['descripcion'],
                    'hashtags' => array(),
                    'imagenes' => array(),
                    'publicada' => $row['publicada']
                );
            }
        }
        return $actividades;
    }

    function getActividadesCompletas($mysqli) {
        $actividades = getActividades($mysqli);
    
        foreach ($actividades as &$actividad) {
            $actividad_id = $actividad['id'];
            
            $hashtags_actividad = $mysqli->query("SELECT * FROM hashtags WHERE actividad_id = $actividad_id");
            if ($hashtags_actividad->num_rows > 0) {
                $actividad['hashtags'] = array();
                $contador = 0;
                while ($row = $hashtags_actividad->fetch_assoc()) {
                    $actividad['hashtags'][$contador] = $row['hashtag'];
                    $contador++;
                }
            }

            $imagenes_actividad = $mysqli->query("SELECT * FROM imagenes WHERE actividad_id = $actividad_id");
            if ($imagenes_actividad->num_rows > 0) {
                $actividad['imagenes'] = array();
                $contador = 0;
                while ($row = $imagenes_actividad->fetch_assoc()) {
                    $actividad['imagenes'][$contador] = $row['direccion'];
                    $contador++;
                }
            }
        }
    
        return $actividades;
    }

    function getHastagsId($id, $mysqli){
        $hashtags = array();
        $resultado = $mysqli->query("SELECT * FROM hashtags WHERE actividad_id = $id");
        if($resultado->num_rows > 0){
            $contador = 0;
            while($row = $resultado->fetch_assoc()){
                $hashtags[$contador] = $row['hashtag'];
                $contador++;
            }
        }
        return $hashtags;
    }

    function addHashtag($id, $hashtag, $mysqli){
        $sql = "INSERT INTO hashtags (actividad_id, hashtag) VALUES ( $id, '$hashtag')";
        if($mysqli->query($sql) === TRUE){
            return true;
        }
        else{
            return false;
        }
    }

    function getImagenesId($id, $mysqli){
        $imagenes = array();
        $resultado = $mysqli->query("SELECT * FROM imagenes WHERE actividad_id = $id");
        if($resultado->num_rows > 0){
            $contador = 0;
            while($row = $resultado->fetch_assoc()){
                $imagenes[$contador] = $row['direccion'];
                $contador++;
            }
        }
        return $imagenes;
    }

    function addImagen($id, $imagen, $mysqli){
        $sql = "INSERT INTO imagenes (direccion, actividad_id) VALUES ('$imagen', $id)";
        if($mysqli->query($sql) === TRUE){
            return true;
        }
        else{
            return false;
        }
    }

    function editarActividad($id, $nombre, $precio, $fecha, $descripcion, $publicada, $mysqli){
        
        $sql = "UPDATE actividades SET nombre = '$nombre', precio = '$precio', fecha = '$fecha', descripcion = '$descripcion', publicada = $publicada WHERE id = $id";
        if($mysqli->query($sql) === TRUE){
            return true;
        }
        else{
            return false;
        }
    }

    function borrarActividad($id, $mysqli){
        $sql = "DELETE FROM actividades WHERE id = $id";
        if($mysqli->query($sql) === TRUE){
            return true;
        }
        else{
            return false;
        }
    }

    function borrarfotosActividad($id, $mysqli){
        $sql = "DELETE FROM imagenes WHERE actividad_id = $id";
        if($mysqli->query($sql) === TRUE){
            return true;
        }
        else{
            return false;
        }
    }

    function borrarHashtagsActividad($id, $mysqli){
        $sql = "DELETE FROM hashtags WHERE actividad_id = $id";
        if($mysqli->query($sql) === TRUE){
            return true;
        }
        else{
            return false;
        }
    }

    function addActividad($nombre, $precio, $fecha, $descripcion, $publicada, $mysqli){
        
        $sql = "INSERT INTO actividades (nombre, precio, fecha, descripcion, publicada) VALUES ('$nombre', '$precio', '$fecha', '$descripcion', '$publicada')";
        if($mysqli->query($sql) === TRUE){
            $id = $mysqli->insert_id;
            $enlace = "actividad.php?id=$id";
            $sql = "UPDATE actividades SET enlace = '$enlace' WHERE id = $id";
            if($mysqli->query($sql) === TRUE){
                return $id;
            }
            else{
                return false;
            }
        }
        else{
            return false;
        }
    }

    function existe($mysqli, $id){
        $resultado = $mysqli->query("SELECT * FROM actividades WHERE id = $id ");
        if($resultado->num_rows > 0){
            return true;
        }
        else{
            return false;
        }
    }

    function getActividadesByHashtag($hashtag, $mysqli){
        $actividades = array();
        $resultado = $mysqli->query("SELECT * FROM hashtags WHERE hashtag = '$hashtag'");
        if($resultado->num_rows > 0){
            $contador = 0;
            while($row = $resultado->fetch_assoc()){
                $actividades[$contador] = getActividad($row['actividad_id'], $mysqli);
                $contador++;
            }
        }
        return $actividades;
    }

    function borrarComentariosActividad($id, $mysqli){
        $sql = "DELETE FROM valoraciones WHERE actividad_id = $id";
        if($mysqli->query($sql) === TRUE){
            return true;
        }
        else{
            return false;
        }
    }

    function accesible($mysqli, $tipo, $id){
        if($tipo > 1){
            $resultado = $mysqli->query("SELECT * FROM actividades WHERE id = $id ");
            if($resultado->num_rows > 0){
                return true;
            }
            else{
                return false;
            }
        }
        else{
            $resultado = $mysqli->query("SELECT * FROM actividades WHERE id = $id AND publicada = 1");
            if($resultado->num_rows > 0){
                return true;
            }
            else{
                return false;
            }
        }
    }

    function getActividadPorNombre($mysqli, $nombre){
        $resultado = $mysqli->query("SELECT * FROM actividades WHERE nombre = '$nombre'");
        if($resultado->num_rows > 0){
            $id = $resultado->fetch_assoc()['id'];
            return $id;
        }
        else{
            return null;
        }
    }

    function getActividadJson($mysqli, $tipo){
        $actividades = getListaActividades($mysqli, $tipo);
        $actividadesJson = json_encode($actividades);
        return $actividadesJson;
    }

?>
