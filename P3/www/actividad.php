<?php
    require_once "/usr/local/lib/php/vendor/autoload.php";
    require_once "models/mysql.php";

    $loader = new \Twig\Loader\FilesystemLoader('templates');
    $twig = new \Twig\Environment($loader);

    if(isset($_GET['id'])){
        if($_GET['id'] >= 1 && $_GET['id'] <= 9){
            $id = $_GET['id'];
            $mysqli = connect();
            $actividad = getActividad($id, $mysqli);
            $valoraciones = getValoraciones($id, $mysqli);
            $listaActividades = getListaActividades($mysqli);
            $random_image = rand(1, 3);
            $palabrasProhibidas = getPalabrasProhibidas($mysqli);
            $mysqli->close();
            echo $twig->render('actividad.html', ['actividad' => $actividad, 'valoraciones' => $valoraciones, 'listaActividades' => $listaActividades, 
            'id' => $id, 'random_image' => $random_image, 'palabrasProhibidas' => $palabrasProhibidas]);
        }
        else{
            echo '<h4>404 NOT FOUND</h4>';
        }

        }
    else{
        echo '<h4>404 NOT FOUND</h4>';
    }

    
    
?>
