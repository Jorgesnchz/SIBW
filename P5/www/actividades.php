<?php
    require_once "/usr/local/lib/php/vendor/autoload.php";
    require_once "models/mysql.php";

    $loader = new \Twig\Loader\FilesystemLoader('templates');
    $twig = new \Twig\Environment($loader);
    
    session_start();
    $tipo = isset($_SESSION['tipo']) ? $_SESSION['tipo'] : 0;
    
    if($tipo < 2){
        echo '<h4>404 NOT FOUND</h4>';
    }
    else{
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $hashtag = "#". $_POST["busqueda"];
    
            if($hashtag == "#"){
                header("Location: ../actividades.php");
            }
            $mysqli = connect();
            $actividades = getActividadesByHashtag($hashtag, $mysqli);
            $listaActividades = getListaActividades($mysqli, $tipo);
            $mysqli->close();
            
            $usuario = $_SESSION['usuario'];
            
            echo $twig->render('actividades.html', ['actividades' => $actividades, 'usuario' => $usuario, 'tipo' => $tipo, 'listaActividades' => $listaActividades]);
        }
        else{
            $usuario = $_SESSION['usuario'];
            $mysqli = connect();
            $actividades = getActividadesCompletas($mysqli);
            $listaActividades = getListaActividades($mysqli, $tipo);
            $mysqli->close();
    
            echo $twig->render('actividades.html', ['actividades' => $actividades, 'usuario' => $usuario, 'tipo' => $tipo, 'listaActividades' => $listaActividades]);
        }
    }
?>