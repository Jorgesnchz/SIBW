<?php
    require_once "/usr/local/lib/php/vendor/autoload.php";
    require_once "models/mysql.php";

    $loader = new \Twig\Loader\FilesystemLoader('templates');
    $twig = new \Twig\Environment($loader);
    
    if(isset($_GET['id'])){
        $mysqli = connect();
        $id = $_GET['id'];
        if(existe($mysqli, $id)){
            
            
            $actividad = getActividad($id, $mysqli);
            $valoraciones = getValoraciones($id, $mysqli);
            $listaActividades = getListaActividades($mysqli);

            $numimagenes = getNumeroImagenes($id, $mysqli);
            $random_image = rand(0, $numimagenes);
            $palabrasProhibidas = getPalabrasProhibidas($mysqli);
            
            $mysqli->close();
            
            session_start();
            if(isset($_SESSION['usuario'])){
                $usuario = $_SESSION['usuario'];
                $tipo = $_SESSION['tipo'];
                echo $twig->render('actividad.html', ['actividad' => $actividad, 'valoraciones' => $valoraciones, 'listaActividades' => $listaActividades, 
                'id' => $id, 'random_image' => $random_image, 'palabrasProhibidas' => $palabrasProhibidas, 'usuario' => $usuario, 'tipo' => $tipo]);
                return;
            }
            else{
                echo $twig->render('actividad.html', ['actividad' => $actividad, 'valoraciones' => $valoraciones, 'listaActividades' => $listaActividades, 
                'id' => $id, 'random_image' => $random_image, 'palabrasProhibidas' => $palabrasProhibidas]);
            }
            
        }
        else{
            echo '<h4>404 NOT FOUND</h4>';
        }

        }
    else{
        echo '<h4>404 NOT FOUND</h4>';
    }

    
    
?>
