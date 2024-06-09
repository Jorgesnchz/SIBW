<?php
    require_once "/usr/local/lib/php/vendor/autoload.php";
    require_once "../models/mysql.php";

    $loader = new \Twig\Loader\FilesystemLoader('../templates');
    $twig = new \Twig\Environment($loader);
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $nombre = $_POST["nombre"];
        $comentario = $_POST["comentario"];
        $correo = $_POST["email"];
        $id = $_POST["id"];
        $fecha = date("Y-m-d H:i:s");

        $mysqli = connect();
        addValoracion($nombre, $comentario, $correo, $fecha, $id, $mysqli);
        $mysqli->close();

        header("Location: ../actividad.php?id=$id");
        
    }
    else{
        echo $twig->render('portada.html', ['error' => 'Error desconocido']);
    }