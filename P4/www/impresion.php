<?php
    require_once "/usr/local/lib/php/vendor/autoload.php";
    require_once "models/mysql.php";

    $loader = new \Twig\Loader\FilesystemLoader('templates');
    $twig = new \Twig\Environment($loader);

    if(isset($_GET['id'])){
        $mysqli = connect();
        $id = $_GET['id'];
        if(existe($mysqli, $id)){
            $id = $_GET['id'];
            
            $actividad = getActividad($id, $mysqli);
            $numimagenes = getNumeroImagenes($id, $mysqli);
            $mysqli->close();
            $random_image = rand(0, $numimagenes);
            echo $twig->render('impresion.html', ['actividad' => $actividad, 'random_image' => $random_image]);
        }
        else{
            echo '<h4>404 NOT FOUND</h4>';
            $mysqli->close();
        }
    }
    else{
        echo '<h4>404 NOT FOUND</h4>';
    }
?>