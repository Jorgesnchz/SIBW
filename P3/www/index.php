<?php
    require_once "/usr/local/lib/php/vendor/autoload.php";
    require_once "models/mysql.php";

    $loader = new \Twig\Loader\FilesystemLoader('templates');
    $twig = new \Twig\Environment($loader);
    
    $mysqli = connect();
    $listaActividades = getListaActividades($mysqli);
    $mysqli->close();
    echo $twig->render('portada.html', [ 'listaActividades' => $listaActividades]);
?>
