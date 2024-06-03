<?php
    require_once "/usr/local/lib/php/vendor/autoload.php";
    require_once "models/mysql.php";

    $loader = new \Twig\Loader\FilesystemLoader('templates');
    $twig = new \Twig\Environment($loader);

    session_start();
    if(isset($_SESSION['id'])){
        $id = $_SESSION['id'];
        $usuario = $_SESSION['usuario'];
        $tipo = $_SESSION['tipo'];
        $correo = $_SESSION['correo'];
        $nombre = $_SESSION['nombre'];

        $mysqli = connect();
        $listaActividades = getListaActividades($mysqli);
        $mysqli->close();

        echo $twig->render('perfil.html', ['id' => $id, 'usuario' => $usuario, 'tipo' => $tipo, 'correo' => $correo, 'nombre' => $nombre, 'listaActividades' => $listaActividades]);
    }
    else{
        echo '<h4>404 NOT FOUND</h4>';
    }