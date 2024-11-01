<?php
// Verifica si el formulario fue enviado antes de procesar
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Verifica si el campo "email" existe
    $email = isset($_POST['email']) ? $_POST['email'] : '';  // Verificación para "email"
    
    // Verifica si el campo "password" existe
    $password = isset($_POST['password']) ? $_POST['password'] : '';  // Verificación para "password"
    
    // Verifica si el campo "g-recaptcha-response" existe (Google ReCAPTCHA)
    $recaptchaResponse = isset($_POST['g-recaptcha-response']) ? $_POST['g-recaptcha-response'] : '';  // Verificación para "g-recaptcha-response"
    
    // Validar reCAPTCHA
    if ($recaptchaResponse) {
        // Clave secreta de tu sitio (debes obtenerla en Google reCAPTCHA)
        $secret = '6LemfmsqAAAAAMemMK3BF0kLXMzgjwQx9exhAYFu';

        // URL de verificación del reCAPTCHA
        $url = 'https://www.google.com/recaptcha/api/siteverify';
        
        // Datos a enviar
        $data = [
            'secret' => $secret,
            'response' => $recaptchaResponse,
            'remoteip' => $_SERVER['REMOTE_ADDR']
        ];

        // Opciones para la solicitud POST
        $options = [
            'http' => [
                'method' => 'POST',
                'header' => 'Content-Type: application/x-www-form-urlencoded',
                'content' => http_build_query($data)
            ]
        ];

        // Enviar solicitud a Google y obtener la respuesta
        $context = stream_context_create($options);
        $response = file_get_contents($url, false, $context);
        $result = json_decode($response, true);

        // Verificar si el reCAPTCHA fue exitoso
        if ($result['success']) {
            echo "reCAPTCHA validado correctamente. ¡Formulario procesado!";
            // Aquí puedes seguir con la lógica de autenticación del usuario, como validar el email y la contraseña.
        } else {
            echo "Error en reCAPTCHA. Inténtalo de nuevo.";
        }
    } else {
        echo "Por favor, completa el reCAPTCHA.";
    }
}




?>



<!DOCTYPE html>
<html lang="es">
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Iniciar Sesión</title>
</head>
<body>
    <div class="container mt-5">
        
        <h2 class="text-center my-5">Iniciar Sesión</h2>
        <form class="col-12 col-md-4 mx-auto p-4 border rounded shadow my-5"  action="formLogin.php" method="POST" class="mt-4">
            <div class="mb-3">
                <label for="email" class="form-label">Correo Electrónico</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="g-recaptcha" data-sitekey="6LemfmsqAAAAAHEeyFKVtZgyPmyIAl-dda7AaWo8"></div>
            <br>
            <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
        </form>
        <div class="text-center mt-3">
            <p>¿No tienes una cuenta? <a href="/crud-manoloMejor/login/registro">Regístrate aquí</a></p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
