<?php
    require_once "/usr/local/lib/php/vendor/autoload.php";
    require_once "../models/mysql.php";

    $loader = new \Twig\Loader\FilesystemLoader('../templates');
    $twig = new \Twig\Environment($loader);

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        session_start();
        $id = $_SESSION['id'];
        $usuarioEditado = $_POST['usuario'];
        $correoEditado = $_POST['email'];
        $nombreEditado = $_POST['nombre'];
        $contrasenaEditada = $_POST['contrasena'];
        $contrasenaEditada2 = $_POST['contrasena2'];

        if($contrasenaEditada == $contrasenaEditada2){
            if(strlen($contrasenaEditada) < 5 ){
                $contrasenaEditada = $_SESSION['contrasena'];
            }
            else{
                $contrasenaEditada = password_hash($contrasenaEditada, PASSWORD_DEFAULT);
            }
            
            $mysqli = connect();
            if(editarUsuario($id, $usuarioEditado, $correoEditado, $nombreEditado, $contrasenaEditada, $mysqli)){
                $mysqli->close();

                $_SESSION['usuario'] = $usuarioEditado;
                $_SESSION['correo'] = $correoEditado;
                $_SESSION['nombre'] = $nombreEditado;
                
                $tipo = $_SESSION['tipo'];

                echo $twig->render('perfil.html', ['id' => $id, 'usuario' => $usuarioEditado, 'correo' => $correoEditado, 'nombre' => $nombreEditado, 'tipo' => $tipo]);
            }
            else{
                echo $twig->render('perfil.html', ['error' => 'Error al editar el usuario']);
            }
        }
        else{
            echo $twig->render('perfil.html', ['error' => 'Las contraseñas no coinciden']);
        }
    }
?>