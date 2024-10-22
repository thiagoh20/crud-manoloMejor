<?php
require_once 'app/models/Usuario.php';
class UsuariosController
{

    public function Usuarios()
    {
        $usuarioModel = new Usuario();
        $usuarios = $usuarioModel->obtenerUsuarios(); // Llama al modelo para obtener los libros
        require_once 'app/views/usuarios/form.php'; // Carga la vista
    }

    public function index()
    {
        $libroModel = new Libro();
        $libros = $libroModel->obtenerLibros(); // Llama al modelo para obtener los libros
        require_once 'app/views/libros/index.php'; // Carga la vista
    }
    public function Listausuarios()
    {
        $usuarioModel = new Usuario();
        $usuarios = $usuarioModel->obtenerUsuarios();
        require_once 'app/views/usuarios/listausuarios.php'; // Carga la vista
    }

    public function detalle()
    {
        if (!empty($_GET["id"])) {
            $id = $_GET["id"];
            $usuarioModel = new Usuario();
            $usuario = $usuarioModel->obtenerUsuarioPorId($id);
            if ($usuario) {
                $usuario;
                require_once 'app/views/usuarios/detalle.php';
            } else {
                http_response_code(404);
                include 'app/views/404.php';
            } // Busca un libro específico
            // Carga la vista
        }
    }

    public function form()
    {
        require_once 'app/views/usuarios/form.php'; // Carga el formulario para crear un nuevo libro
    }

    public function store()
    {
        // Verifica si se ha enviado el formulario con todos los campos necesarios
        if (!empty($_POST["nombre"]) and !empty($_POST["apellido"]) and !empty($_POST["tipo_doc"]) and !empty($_POST["documento"]) and !empty($_POST["correo"])) {

            $nombre = $_POST["nombre"];
            $apellido = $_POST["apellido"];
            $tipo_doc = $_POST["tipo_doc"];
            $documento = $_POST["documento"];
            $correo = $_POST["correo"];
            // Crea una instancia del modelo de Libro
            $usuarioModel = new Usuario();

            if ($usuarioModel->registrarUsuario($nombre, $apellido, $tipo_doc, $documento, $correo)) {
                //     // Si se registra correctamente, redirige al listado de libros
                header('Location:/crud-manoloMejor/usuarios');
                exit(); // Asegura que no se ejecute más código después de la redirección
            } else {
                //     // Muestra un mensaje de error si no se pudo registrar el libro
                echo '<div class="alert alert-danger">Error al registrar el usuario!</div>';
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
            $usuarioModel = new Usuario();
            if ($usuarioModel->eliminarUsuario($id)) {

                header('Location:/crud-manoloMejor/usuarios');
                exit();
            } else {

                echo '<div class="alert alert-danger">Error al eliminar el usuario!</div>';
            }
        }
    }
    public function Actualizar()
    {
        require_once 'app/views/usuarios/detalle.php';
        // if (!empty($_GET["id"])) {
        //     $id = $_GET["id"];
        //     if (!empty($_POST["nombre"]) and !empty($_POST["apellido"]) and !empty($_POST["tipo_doc"]) and !empty($_POST["documento"]) and !empty($_POST["correo"])) {

        //         $nombre = $_POST["nombre"];
        //         $apellido = $_POST["apellido"];
        //         $tipo_doc = $_POST["tipo_doc"];
        //         $documento = $_POST["documento"];
        //         $correo = $_POST["correo"];
        //         // Crea una instancia del modelo de Libro
        //         $usuarioModel = new Usuario();

        //         // Intenta registrar el libro usando el método del modelo
        //         if ($usuarioModel->actualizarUsuario($id, $nombre, $apellido, $tipo_doc, $documento, $correo)) {
        //             // Si se registra correctamente, redirige al listado de libros
        //             header('Location:/crud-manoloMejor/usuarios');
        //             exit(); // Asegura que no se ejecute más código después de la redirección
        //         } else {
        //             // Muestra un mensaje de error si no se pudo registrar el libro
        //             echo '<div class="alert alert-danger">Error al editar el usuario!</div>';
        //         }
        //     } else {
        //         // Si algún campo está vacío, muestra un mensaje de error
        //         echo '<div class="alert alert-danger">Por favor, completa todos los campos!</div>';
        //     }
        // } else {
        //     http_response_code(404);
        //     include 'app/views/404.php';
        // }
    }
}
