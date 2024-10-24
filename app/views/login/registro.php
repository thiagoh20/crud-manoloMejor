<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Registro</title>
</head>

<body>

    <div class="container">
        <header class="bg-primary text-white p-3">
            <div class="container">
                <h1 class="text-center">Biblioteca Virtual</h1>
                <nav class="navbar navbar-expand-lg navbar-dark">
                    <div class="container-fluid">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link" href="/crud-manoloMejor">Inicio</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
        <main class="container my-5">
            <h2 class="text-center">Registro Usuario</h2>
            <form class="col-12 col-md-6 mx-auto p-4 border rounded shadow" action="/crud-manoloMejor/login/registrar"
                method="POST" class="mt-4">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre Completo</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>
                <div class="mb-3">
                    <label for="documento" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="mb-3">
                    <label for="password_confirm" class="form-label">Confirmar Contraseña</label>
                    <input type="password" class="form-control" id="password_confirm" name="password_confirm" required>
                </div>
                <button type="submit" class="btn btn-primary">Registrarse</button>
            </form>
            <div class="text-center mt-3">
                <p>¿Ya tienes una cuenta? <a href="/crud-manoloMejor/login/inicio">Inicia sesión aquí</a></p>
            </div>
        </main>

        <footer class="bg-light text-center py-4">
            <p>&copy; <?php echo date("Y"); ?> Tu Marca. Todos los derechos reservados.</p>
        </footer>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>