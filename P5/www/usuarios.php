<?php 
    require_once "/usr/local/lib/php/vendor/autoload.php";
    require_once "models/mysql.php";

    $loader = new \Twig\Loader\FilesystemLoader('templates');
    $twig = new \Twig\Environment($loader);
    
    session_start();
    $tipo = isset($_SESSION['tipo']) ? $_SESSION['tipo'] : 0;

    if($tipo != 3){
        echo '<h4>404 NOT FOUND</h4>';
    }
    else{
        $usuario = $_SESSION['usuario'];

        $mysqli = connect();
        $usuarios = getUsuarios($mysqli);
        $listaActividades = getListaActividades($mysqli, $tipo);
        $mysqli->close();

        echo $twig->render('usuarios.html', ['usuarios' => $usuarios, 'usuario' => $usuario, 'tipo' => $tipo, 'listaActividades' => $listaActividades]);
    }
?>
