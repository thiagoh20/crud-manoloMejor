<?php

require_once 'app/controllers/LibrosController.php';
require_once 'app/controllers/UsuariosController.php';
require_once 'app/controllers/PrestamosController.php';
require_once 'app/controllers/LoginController.php';
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

    'crud-manoloMejor/usuarios' => 'UsuariosController@Listausuarios',
    'crud-manoloMejor/usuarios/form' => 'UsuariosController@form',
    'crud-manoloMejor/usuarios/store' => 'UsuariosController@store',
    'crud-manoloMejor/usuarios/eliminar' => 'UsuariosController@delete',
    'crud-manoloMejor/usuarios/detalle' => 'UsuariosController@detalle',
    'crud-manoloMejor/usuarios/actualizar' => 'UsuariosController@actualizar',


    'crud-manoloMejor/prestamos' => 'PrestamosController@Listaprestamos',
    'crud-manoloMejor/prestamos/form' => 'PrestamosController@form',
    'crud-manoloMejor/prestamos/store' => 'PrestamosController@store',
    'crud-manoloMejor/prestamos/eliminar' => 'PrestamosController@delete',
    'crud-manoloMejor/prestamos/detalle' => 'PrestamosController@detalle',
    'crud-manoloMejor/prestamos/actualizar' => 'PrestamosController@actualizar',

    'crud-manoloMejor/login/inicio' => 'LoginController@login',
    'crud-manoloMejor/login/registro' => 'LoginController@registro',
    'crud-manoloMejor/login/registrar' => 'LoginController@registrar',

    'crud-manoloMejor/login/autenticar' => 'LoginController@autenticar',
    'crud-manoloMejor/login/logout' => 'LoginController@logout',

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