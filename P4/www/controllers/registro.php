<?php

    require_once "/usr/local/lib/php/vendor/autoload.php";
    require_once "../models/mysql.php";

    $loader = new \Twig\Loader\FilesystemLoader('../templates');
    $twig = new \Twig\Environment($loader);


    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $username = $_POST["usuario"];
        $password = $_POST["contrasena"];
        $email = $_POST["email"];
        $nombre = $_POST["nombre"];
        
        $mysqli = connect();
        $usuarios = getUsuarios($mysqli);
        $listaActividades = getListaActividades($mysqli);

        session_start();
        foreach($usuarios as $usuario){
            if($usuario['usuario'] == $username){
                $_SESSION['error'] = "Usuario ya registrado";
                header("Location: ../index.php");
                return;
            }
            if($usuario['correo'] == $email){
                $_SESSION['error'] = "Correo ya registrado";
                header("Location: ../index.php");
                return;
            }
        }

        if(strlen($username) < 5){
            $_SESSION['error'] = "El usuario debe tener al menos 5 caracteres";
            header("Location: ../index.php");
            return;
        }

        if(strlen($password) < 5){
            $_SESSION['error'] = "La contraseña debe tener al menos 5 caracteres";
            header("Location: ../index.php");
            return;
        }

        if(strlen($email) < 5){
            $_SESSION['error'] = "El correo debe tener al menos 5 caracteres";
            header("Location: ../index.php");
            return;
        }

        if(strlen($nombre) < 5){
            $_SESSION['error'] = "El nombre debe tener al menos 5 caracteres";
            header("Location: ../index.php");
            return;
        }


        $password = password_hash($password, PASSWORD_DEFAULT);

        if(addUsuario($username, $password, $email, $nombre, $mysqli)){
            $id = getIdUsuario($username, $mysqli);


            $_SESSION['tipo'] = 1;
            $_SESSION['usuario'] = $username;
            $_SESSION['id'] = $id;
            $_SESSION['correo'] = $email;
            $_SESSION['nombre'] = $nombre;
            $_SESSION['contrasena'] = $password;
            
            header("Location: ../index.php");
        }
        else{
            $_SESSION['error'] = "Error al registrar el usuario";
            header("Location: ../index.php");
        }
        
        $mysqli->close();
    }