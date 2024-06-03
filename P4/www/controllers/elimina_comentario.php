<?php 
    require_once "/usr/local/lib/php/vendor/autoload.php";
    require_once "../models/mysql.php";

    $loader = new \Twig\Loader\FilesystemLoader('../templates');
    $twig = new \Twig\Environment($loader);

    
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $mysqli = connect();
        borrarComentario($id, $mysqli);
        $mysqli->close();
        
        header("Location: ../comentarios.php");
    }

?>