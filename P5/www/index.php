<?php
    require_once "/usr/local/lib/php/vendor/autoload.php";
    require_once "models/mysql.php";

    $loader = new \Twig\Loader\FilesystemLoader('templates');
    $twig = new \Twig\Environment($loader);

    session_start();
    $tipo = isset($_SESSION['tipo']) ? $_SESSION['tipo'] : 0;
    $busqueda = isset($_POST['busqueda']) ? $_POST['busqueda'] : null;

    $mysqli = connect();
    $listaActividades = getListaActividades($mysqli, $tipo);
    $json = getActividadJson($mysqli, $tipo);
    if($busqueda != null){
        $id = getActividadPorNombre($mysqli, $busqueda);
    }
    else{
        $id = null;
    }

    $mysqli->close();

    if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['value'])){
        $busqueda = $_GET['value'];

        header('Content-Type: application/json');

        echo (json_encode($json));
        return;
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        if($id != null){
            header("Location: actividad.php?id=$id");
            return;
        }
        else{
            echo '<h4>404 NOT FOUND</h4>';
            return;
        }
        
    }

    if(isset($_SESSION['usuario'])){
        $usuario = $_SESSION['usuario'];
        if (isset($_SESSION['error'])){
            $error = $_SESSION['error'];
            $_SESSION['error'] = null;

            echo $twig->render('portada.html', ['usuario' => $usuario, 'tipo' => $tipo, 
            'listaActividades' => $listaActividades, 'error' => $error]);
        } else {
            echo $twig->render('portada.html', ['usuario' => $usuario, 'tipo' => $tipo, 
            'listaActividades' => $listaActividades]);
        }
        return;
    } else {
        if(isset($_SESSION['error'])){
            $error = $_SESSION['error'];
            $_SESSION['error'] = null;
            echo $twig->render('portada.html', [ 'listaActividades' => $listaActividades, 
                'error' => $error]);
            return;
        } else {
            echo $twig->render('portada.html', [ 'listaActividades' => $listaActividades]);
            return;
        }
    }
?>
