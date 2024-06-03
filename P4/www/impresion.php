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
            $mysqli = connect();
            $actividad = getActividad($id, $mysqli);
            $mysqli->close();
            $random_image = rand(1, 3);
            echo $twig->render('impresion.html', ['actividad' => $actividad, 'random_image' => $random_image]);
        }
        else{
            echo '<h4>404 NOT FOUND</h4>';
        }
    }
    else{
        echo '<h4>404 NOT FOUND</h4>';
    }
?>