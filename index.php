<?php
// Incluir la configuración de la base de datos
require_once 'config/database.php';
require_once 'app/models/Libro.php';
// Incluir archivos de rutas
require_once 'routes.php';

// Incluir el controlador frontal
require_once 'app/controllers/LibrosController.php';
// require_once 'app/controllers/PrestamoController.php';
// require_once 'app/controllers/UsuarioController.php';
// require_once 'app/controllers/LoginController.php';

// Inicializar la sesión
//session_start();

// Aquí podrías agregar lógica para manejar la solicitud
// y dirigirla al controlador adecuado según la ruta solicitada

// Ejemplo simple de enrutamiento
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
    case '/crud-manoloMejor/libros/form':
       
        break;
    case '/crud-manoloMejor/usuarios':
       
        break;
    default:
        // Manejar rutas no encontradas
        http_response_code(404);
        include 'app/views/404.php'; // Debes crear esta vista
        break;
}
?>