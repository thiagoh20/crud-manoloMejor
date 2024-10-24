<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Iniciar Sesión</title>
</head>
<body>
    <div class="container mt-5">
        
        <h2 class="text-center my-5">Iniciar Sesión</h2>
        <form class="col-12 col-md-4 mx-auto p-4 border rounded shadow my-5"  action="/crud-manoloMejor/login/autenticar" method="POST" class="mt-4">
            <div class="mb-3">
                <label for="email" class="form-label">Correo Electrónico</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
        </form>
        <div class="text-center mt-3">
            <p>¿No tienes una cuenta? <a href="/crud-manoloMejor/login/registro">Regístrate aquí</a></p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
