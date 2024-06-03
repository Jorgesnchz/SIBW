<?php
    require_once "/usr/local/lib/php/vendor/autoload.php";
    require_once "../models/mysql.php";

    $loader = new \Twig\Loader\FilesystemLoader('../templates');
    $twig = new \Twig\Environment($loader);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST["id"];

        $comentario = $_POST["comentario"];
        
        $comentario = $comentario . " (Mensaje editado por el moderador)";
        $nombre = $_POST["nombre"];

        $mysqli = connect();
        editaComentario($id, $comentario, $nombre, $mysqli);
        $mysqli->close();

        header("Location: ../comentarios.php");
    } else {
        echo $twig->render('portada.html', ['error' => 'Error desconocido']);
    }
?>