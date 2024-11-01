<?php

ob_start();
session_start();
require_once 'routes.php';



require_once 'config/database.php';
require_once 'app/models/Libro.php';
require_once 'app/controllers/LibrosController.php';
$requestUri = rtrim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
switch ($requestUri) {
    case '/crud-manoloMejor':
        $libroModel = new Libro();
        $libros = $libroModel->obtenerLibros(); // Llama al modelo para obtener los libros
        require_once 'app/views/libros/Libreria.php';
        break;

    case '/crud-manoloMejor/libros':
        $librosController = new LibrosController();
        $librosController->ListaLibors();
        break;

    // case '/prestamos':
    //     $prestamoController = new PrestamoController();
    //     $prestamoController->index();
    //     break;
    // case '/login':
    //     $loginController = new LoginController();
    //     $loginController->login();
    //     break;
    case '/crud-manoloMejor/libros/detalle':
    case '/crud-manoloMejor/libros/form':

        break;
    case '/crud-manoloMejor/usuarios/detalle':
    case '/crud-manoloMejor/usuarios/form':
    case '/crud-manoloMejor/usuarios':

        break;
    case '/crud-manoloMejor/prestamos/detalle':
    case '/crud-manoloMejor/prestamos/form':
    case '/crud-manoloMejor/prestamos':


        break;
    case '/crud-manoloMejor/login/inicio':
    case '/crud-manoloMejor/login/registro':
        break;
    default:
        // Manejar rutas no encontradas
        http_response_code(404);
        include 'app/views/404.php'; // Debes crear esta vista
        break;
}
?>