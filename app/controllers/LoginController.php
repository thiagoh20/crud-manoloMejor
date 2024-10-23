<?php
require_once 'app/models/Login.php';

class LoginController
{
    // Muestra el formulario de registro
    public function registro()
    {
        require_once 'app/views/login/registro.php';
    }

    // Muestra el formulario de login
    public function login()
    {
        require_once 'app/views/usuarios/login.php';
    }

    // Procesa el registro de un nuevo usuario
    public function registrar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $password_confirm = $_POST['password_confirm'];

            if ($password !== $password_confirm) {
                echo "Las contraseñas no coinciden.";
                return;
            }

            $usuario = new Login();
            if ($usuario->registrar($nombre, $email, password_hash($password, PASSWORD_BCRYPT))) {
                header('Location: /usuarios/login');
                exit();
            } else {
                echo "Error al registrar el usuario.";
            }
        }


    }

    // Procesa la autenticación del usuario
    public function autenticar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $usuario = new login();
            $user = $usuario->buscarPorEmail($email);

            if ($user && password_verify($password, $user->password)) {
                // Autenticación exitosa
                session_start();
                $_SESSION['usuario_id'] = $user->id;
                $_SESSION['nombre'] = $user->nombre;
                header('Location: /');
                exit();
            } else {
                echo "Correo o contraseña incorrectos.";
            }
        }
    }

    // Cierra sesión del usuario
    public function logout()
    {
        session_start();
        session_destroy();
        header('Location: /usuarios/login');
    }
}
