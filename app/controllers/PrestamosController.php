<?php
require_once 'app/models/Prestamo.php';
require_once 'app/models/Usuario.php';
require_once 'app/models/Libro.php';
class PrestamosController
{

    public function Prestamos()
    {
        $usuarioModel = new Prestamo();
        $usuarios = $usuarioModel->obtenerPrestamos(); // Llama al modelo para obtener los libros
        require_once 'app/views/usuarios/form.php'; // Carga la vista
    }

    public function index()
    {
        $libroModel = new Libro();
        $libros = $libroModel->obtenerLibros(); // Llama al modelo para obtener los libros
        require_once 'app/views/libros/index.php'; // Carga la vista
    }
    public function Listaprestamos()
    {
        $prestamoModel = new Prestamo();
        $prestamos = $prestamoModel->obtenerPrestamos();
        require_once 'app/views/prestamos/listaprestamo.php'; // Carga la vista
    }

    public function detalle()
    {

        if (!empty($_GET["id"])) {
            $id = $_GET["id"];
            $prestamoModel = new Prestamo();
            $libroModel = new Libro();
            $usuarioModel = new Usuario();
            $prestamo = $prestamoModel->obtenerPrestamoPorId($id);
            if ($prestamo) {
                $prestamo;

                $libros = $libroModel->obtenerLibros();
                $usuarios = $usuarioModel->obtenerUsuarios();
                require_once 'app/views/prestamos/detalle.php';
            } else {
                http_response_code(404);
                include 'app/views/404.php';
            } // Busca un libro específico
            // Carga la vista
        }
    }

    public function form()
    {

        $libroModel = new Libro();
        $usuarioModel = new Usuario();
        $libros = $libroModel->obtenerLibros();
        $usuarios = $usuarioModel->obtenerUsuarios();
        require_once 'app/views/prestamos/form.php'; // Carga el formulario para crear un nuevo libro
    }

    public function store()
    {
        // Verifica si se ha enviado el formulario con todos los campos necesarios
        if (!empty($_POST["id_usuario"]) && !empty($_POST["id_libro"]) && !empty($_POST["fecha_prestamo"]) && !empty($_POST["fecha_devolucion"]) && !empty($_POST["estado"])) {

            // Capturamos los valores del formulario
            $id_usuario = $_POST["id_usuario"];
            $id_libro = $_POST["id_libro"];
            $fecha_prestamo = $_POST["fecha_prestamo"];
            $fecha_devolucion = $_POST["fecha_devolucion"];
            $estado = $_POST["estado"];
            // Crea una instancia del modelo de Libro
            $usuarioModel = new Prestamo();

            if ($usuarioModel->registrarPrestamo($id_usuario, $id_libro, $fecha_prestamo, $fecha_devolucion, $estado)) {
                //     // Si se registra correctamente, redirige al listado de libros
                header('Location:/crud-manoloMejor/prestamos');
                exit(); // Asegura que no se ejecute más código después de la redirección
            } else {
                //     // Muestra un mensaje de error si no se pudo registrar el libro
                echo '<div class="alert alert-danger">Error al registrar el prestamo!</div>';
            }
        } else {
            // Si algún campo está vacío, muestra un mensaje de error
            echo '<div class="alert alert-danger">Por favor, completa todos los campos!</div>';
        }
    }
    public function delete()
    {
        if (!empty($_GET["id"])) {
            $id = $_GET["id"];
            $usuarioModel = new Prestamo();
            if ($usuarioModel->eliminarPrestamo($id)) {

                header('Location:/crud-manoloMejor/prestamos');
                exit();
            } else {

                echo '<div class="alert alert-danger">Error al eliminar el usuario!</div>';
            }
        }
    }
    public function Actualizar()
    {

        if (!empty($_GET["id"])) {
            $id = $_GET["id"];
            if (!empty($_POST["id_usuario"]) && !empty($_POST["id_libro"]) && !empty($_POST["fecha_prestamo"]) && !empty($_POST["fecha_devolucion"]) && !empty($_POST["estado"])) {

                // Capturamos los valores del formulario
                $id_usuario = $_POST["id_usuario"];
                $id_libro = $_POST["id_libro"];
                $fecha_prestamo = $_POST["fecha_prestamo"];
                $fecha_devolucion = $_POST["fecha_devolucion"];
                $estado = $_POST["estado"];
                // Crea una instancia del modelo de Libro
                $usuarioModel = new Prestamo();

                 // Intenta registrar el libro usando el método del modelo
                 if ($usuarioModel->actualizarPrestamo($id_usuario, $id_libro, $fecha_prestamo, $fecha_devolucion, $estado, $id)) {
                     // Si se registra correctamente, redirige al listado de libros
                     header('Location:/crud-manoloMejor/prestamos');
                     exit(); // Asegura que no se ejecute más código después de la redirección
                 } else {
                     // Muestra un mensaje de error si no se pudo registrar el libro
                     echo '<div class="alert alert-danger">Error al editar el usuario!</div>';
                 }
             } else {
                 // Si algún campo está vacío, muestra un mensaje de error
                 echo '<div class="alert alert-danger">Por favor, completa todos los campos!</div>';
             }
         } else {
             http_response_code(404);
             include 'app/views/404.php';
         }
    }
}
