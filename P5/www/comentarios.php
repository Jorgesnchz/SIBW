<?php
    require_once "/usr/local/lib/php/vendor/autoload.php";
    require_once "models/mysql.php";

    $loader = new \Twig\Loader\FilesystemLoader('templates');
    $twig = new \Twig\Environment($loader);

    session_start();
    $tipo = isset($_SESSION['tipo']) ? $_SESSION['tipo'] : 0;
    

    if($tipo < 1){
        echo '<h4>404 NOT FOUND</h4>';
        return;
    }
    else{
        $usuario = $_SESSION['usuario'];

        $mysqli = connect();
        $comentarios = getComentarios($mysqli);
        $listaActividades = getActividadesCompletas($mysqli, $tipo);
        $mysqli->close();

        echo $twig->render('comentarios.html', ['comentarios' => $comentarios, 'usuario' => $usuario, 'tipo' => $tipo, 'listaActividades' => $listaActividades]);
    }
?>