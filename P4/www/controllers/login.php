<?php 
    require_once "/usr/local/lib/php/vendor/autoload.php";
    require_once "../models/mysql.php";

    $loader = new \Twig\Loader\FilesystemLoader('../templates');
    $twig = new \Twig\Environment($loader);

    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["usuario"];
        $password = $_POST["contrasena"];
        $mysqli = connect();

        $user = getUser($username, $mysqli);
        $listaActividades = getListaActividades($mysqli);
        $mysqli->close();
        session_start();
        
        if($user != null){
            if(password_verify($password, $user['contrasena'])){
                $tipo = $user['tipo'];
                $_SESSION['tipo'] = $tipo;
                $_SESSION['usuario'] = $username;
                $_SESSION['id'] = $user['id'];
                $_SESSION['correo'] = $user['correo'];
                $_SESSION['nombre'] = $user['nombre'];
                $_SESSION['contrasena'] = $user['contrasena'];
                
                header("Location: ../index.php");
            }
            else{
                $_SESSION['error'] = "Contraseña incorrecta";
                header("Location: ../index.php");
            }
        }
        else{
            $_SESSION['error'] = "Usuario no encontrado";
            header("Location: ../index.php");
        }
    }
    else{
        $_SESSION['error'] = "Error desconocido";
        header("Location: ../index.php");
    }
?>