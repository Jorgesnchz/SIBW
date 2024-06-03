<?php
    require_once "/usr/local/lib/php/vendor/autoload.php";
    require_once "models/mysql.php";

    $loader = new \Twig\Loader\FilesystemLoader('templates');
    $twig = new \Twig\Environment($loader);
    
    $mysqli = connect();

    $listaActividades = getListaActividades($mysqli);
    $mysqli->close();
    session_start();

    
    if(isset($_SESSION['usuario'])){
        $usuario = $_SESSION['usuario'];
        $tipo = $_SESSION['tipo'];
        if (isset($_SESSION['error'])){
            $error = $_SESSION['error'];
            $_SESSION['error'] = null;

            echo $twig->render('portada.html', ['usuario' => $usuario, 'tipo' => $tipo, 
            'listaActividades' => $listaActividades, 'error' => $error]);
        }
        else{
            echo $twig->render('portada.html', ['usuario' => $usuario, 'tipo' => $tipo, 
            'listaActividades' => $listaActividades]);
        }
        return;
    }
    else{
        if(isset($_SESSION['error'])){
            $error = $_SESSION['error'];
            $_SESSION['error'] = null;
            echo $twig->render('portada.html', [ 'listaActividades' => $listaActividades, 
                'error' => $error]);
            return;
        }
        else{
            echo $twig->render('portada.html', [ 'listaActividades' => $listaActividades]);
            return;
        }
    }


?>
