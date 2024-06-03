<?php
    require_once "/usr/local/lib/php/vendor/autoload.php";
    require_once "models/mysql.php";

    $loader = new \Twig\Loader\FilesystemLoader('templates');
    $twig = new \Twig\Environment($loader);

    $mysqli = connect();
    $actividades = getActividadesCompletas($mysqli);
    $mysqli->close();

    session_start();
    $usuario = $_SESSION['usuario'];
    $tipo = $_SESSION['tipo'];

    echo $twig->render('actividades.html', ['actividades' => $actividades, 'usuario' => $usuario, 'tipo' => $tipo]);
?>