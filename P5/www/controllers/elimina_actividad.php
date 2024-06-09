<?php 
    require_once "/usr/local/lib/php/vendor/autoload.php";
    require_once "../models/mysql.php";

    $loader = new \Twig\Loader\FilesystemLoader('../templates');
    $twig = new \Twig\Environment($loader);

    
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $mysqli = connect();
        borrarActividad($id, $mysqli);
        
        
        borrarfotosActividad($id, $mysqli);
        borrarHashtagsActividad($id, $mysqli);
        borrarComentariosActividad($id, $mysqli);
        
        
        $mysqli->close();
        header("Location: ../actividades.php");
    }

?>