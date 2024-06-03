<?php
    require_once "/usr/local/lib/php/vendor/autoload.php";
    require_once "../models/mysql.php";

    $loader = new \Twig\Loader\FilesystemLoader('../templates');
    $twig = new \Twig\Environment($loader);

    session_start();
    $tipo = $_SESSION['tipo'];
    $usuario = $_SESSION['usuario'];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST["id"];
        $nombre = $_POST["nombre"];
        $precio = $_POST["precio"];
        $fecha = $_POST["fecha"];
        $descripcion = $_POST["descripcion"];

        $mysqli = connect();

        $hastags = getHastagsId($id, $mysqli);
        $imagenes = getImagenesId($id, $mysqli);

        $errors= array();
        $file_name = $_FILES['imagen']['name'];
        if($file_name != ""){
            $file_size = $_FILES['imagen']['size'];
            $file_tmp = $_FILES['imagen']['tmp_name'];
            $file_type = $_FILES['imagen']['type'];
            $file_parts = explode('.', $_FILES['imagen']['name']);
            $file_ext = strtolower(end($file_parts));

            $extensions = array("jpeg", "jpg", "png");

            if (in_array($file_ext, $extensions) === false) {
                $errors[] = "Extensión no permitida, elige una imagen JPEG o PNG.";
            }

            if ($file_size > 2097152) {
                $errors[] = 'Tamaño del fichero demasiado grande';
            }

            if (empty($errors) == true) {
                move_uploaded_file($file_tmp, "images/actividades/uploads/" . $file_name);
                $imagen = "images/actividades/uploads/" . $file_name;
                addImagen($id, $imagen, $mysqli);
            } else {
                $actividades = getActividadesCompletas($mysqli);
                echo $twig->render('actividades.php', ['actividades' => $actividades, 'usuario' => $usuario, 'tipo' => $tipo]);
            }
        }
        
        $hastagnuevo = $_POST["hastagnuevo"];

        if($hastagnuevo != ""){
            addHashtag($id, $hastagnuevo, $mysqli);
        }
        
        if(editarActividad($id, $nombre, $precio, $fecha, $descripcion, $mysqli)){
            $mysqli->close();
            header("Location: ../actividades.php");
        }
        else{
            $actividades = getActividadesCompletas($mysqli);
            $mysqli->close();
            echo $twig->render('actividades.php', ['actividades' => $actividades, 'usuario' => $usuario, 'tipo' => $tipo]);
        }
    }