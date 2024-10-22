<?php
require_once 'app/models/Usuario.php';
class UsuariosController
{

    public function Usuarios()
    {
        $usuarioModel = new Usuario();
        $usuarios = $usuarioModel->obtenerUsuarios(); // Llama al modelo para obtener los libros
        require_once 'app/views/usuarios/listausuarios.php'; // Carga la vista
    }

    public function index()
    {
        $libroModel = new Libro();
        $libros = $libroModel->obtenerLibros(); // Llama al modelo para obtener los libros
        require_once 'app/views/libros/index.php'; // Carga la vista
    }
    public function ListaLibors()
    {
        $libroModel = new Libro();
        $libros = $libroModel->obtenerLibros(); // Llama al modelo para obtener los libros
        require_once 'app/views/libros/listalibros.php'; // Carga la vista
    }

    public function detalle()
    {
        if (!empty($_GET["id"])) {
            $id = $_GET["id"];
            $libroModel = new Libro();
            $libros = $libroModel->obtenerLibroPorId($id);
            if ($libros) {
                $libros;
                require_once 'app/views/libros/detalle.php';
            } else {
                http_response_code(404);
                include 'app/views/404.php';
            } // Busca un libro específico
            // Carga la vista
        }
    }

    public function form()
    {
        require_once 'app/views/libros/form.php'; // Carga el formulario para crear un nuevo libro
    }

    public function store()
    {
        // Verifica si se ha enviado el formulario con todos los campos necesarios
        if (!empty($_POST['titulo']) && !empty($_POST['autor']) && !empty($_POST['isbn']) && !empty($_POST['editorial']) && !empty($_POST['categoria']) && !empty($_POST['cantidad_disponible'])) {
            // Recogiendo los valores enviados desde el formulario
            $titulo = $_POST['titulo'];
            $autor = $_POST['autor'];
            $isbn = $_POST['isbn'];
            $editorial = $_POST['editorial'];
            $categoria = $_POST['categoria'];
            $cantidad_disponible = $_POST['cantidad_disponible'];

            // Crea una instancia del modelo de Libro
            $libroModel = new Libro();

            // Intenta registrar el libro usando el método del modelo
            if ($libroModel->registrarLibro($titulo, $autor, $isbn, $editorial, $categoria, $cantidad_disponible)) {
                // Si se registra correctamente, redirige al listado de libros
                header('Location:/crud-manoloMejor/libros');
                exit(); // Asegura que no se ejecute más código después de la redirección
            } else {
                // Muestra un mensaje de error si no se pudo registrar el libro
                echo '<div class="alert alert-danger">Error al registrar el libro!</div>';
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
            $libroModel = new Libro();
            if ($libroModel->eliminarLibro($id)) {

                header('Location:/crud-manoloMejor/libros');
                exit();
            } else {

                echo '<div class="alert alert-danger">Error al eliminar el libro!</div>';
            }
        }
    }
    public function Actualizar()
    {
        if (!empty($_GET["id"])) {
            $id = $_GET["id"];
            if (!empty($_POST['titulo']) && !empty($_POST['autor']) && !empty($_POST['isbn']) && !empty($_POST['editorial']) && !empty($_POST['categoria']) && !empty($_POST['cantidad_disponible'])) {
                // Recogiendo los valores enviados desde el formulario
                $titulo = $_POST['titulo'];
                $autor = $_POST['autor'];
                $isbn = $_POST['isbn'];
                $editorial = $_POST['editorial'];
                $categoria = $_POST['categoria'];
                $cantidad_disponible = $_POST['cantidad_disponible'];

                // Crea una instancia del modelo de Libro
                $libroModel = new Libro();

                // Intenta registrar el libro usando el método del modelo
                if ($libroModel->actualizarLibro($id, $titulo, $autor, $isbn, $editorial, $categoria, $cantidad_disponible)) {
                    // Si se registra correctamente, redirige al listado de libros
                    header('Location:/crud-manoloMejor/libros');
                    exit(); // Asegura que no se ejecute más código después de la redirección
                } else {
                    // Muestra un mensaje de error si no se pudo registrar el libro
                    echo '<div class="alert alert-danger">Error al editar el libro!</div>';
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
