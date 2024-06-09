<?php
    require_once "/usr/local/lib/php/vendor/autoload.php";
    require_once "../models/mysql.php";

    $loader = new \Twig\Loader\FilesystemLoader('../templates');
    $twig = new \Twig\Environment($loader);

    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $id = $_POST["id"];
        $nombre = $_POST["nombre"];
        $correo = $_POST["correo"];
        $tipo = $_POST["tipo"];
        $usuario = $_POST["usuario"];
        
        $mysqli = connect();
        if(editaUsuario($id, $nombre, $correo, $tipo, $usuario, $mysqli)){
            session_start();

            if($_SESSION['usuario'] == $usuario){
                
                $_SESSION['nombre'] = $nombre;
                $_SESSION['correo'] = $correo;
                $_SESSION['tipo'] = $tipo;
                $_SESSION['usuario'] = $usuario;
            }
        
        }
        $mysqli->close();

        header("Location: ../usuarios.php");
    }
    else{
        echo $twig->render('portada.html', ['error' => 'Error desconocido']);
    }