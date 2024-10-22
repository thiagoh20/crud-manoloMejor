<?php

require_once 'app/controllers/LibrosController.php';
require_once 'app/controllers/UsuariosController.php';
// require_once 'app/controllers/PrestamoController.php';

// require_once 'app/controllers/LoginController.php';
// Definir las rutas y sus correspondientes controladores
$routes = [
    'crud-manoloMejor' => 'LibrosController@index',
    'crud-manoloMejor/libros' => 'LibrosController@ListaLibors',
    'crud-manoloMejor/libros/form' => 'LibrosController@form',
    'crud-manoloMejor/libros/store' => 'LibrosController@store',
    'crud-manoloMejor/libros/eliminar' => 'LibrosController@delete',
    'crud-manoloMejor/libros/detalle' => 'LibrosController@detalle',
    'crud-manoloMejor/libros/actualizar' => 'LibrosController@actualizar',

    'crud-manoloMejor/usuarios' => 'UsuariosController@Usuarios',
    // 'prestamos' => 'PrestamoController@index', 
    // 'prestamos/detalle' => 'PrestamoController@detalle', 
    // 'usuarios/login' => 'LoginController@login',
    // 'usuarios/registro' => 'UsuarioController@registro', 
];

// Procesar la solicitud y dirigir a la función correcta
$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Remover el prefijo de la URL, si es necesario
$requestUri = trim($requestUri, '/');
//echo $requestUri;
// Comprobar si la ruta existe
if (array_key_exists($requestUri, $routes)) {
    list($controllerName, $methodName) = explode('@', $routes[$requestUri]);

    // Verificar que el controlador existe
    if (class_exists($controllerName)) {
        $controller = new $controllerName();

        // Verificar que el método existe
        if (method_exists($controller, $methodName)) {
            $controller->$methodName(); // Llamar al método del controlador
        } else {
            http_response_code(404);
            include 'app/views/404.php'; // Método no encontrado
        }
    } else {
        http_response_code(404);
        include 'app/views/404.php'; // Controlador no encontrado
    }
} else {
    http_response_code(404);
    include 'app/views/404.php'; // Ruta no encontrada
}
?>