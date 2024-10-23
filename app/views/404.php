<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error 404 - Página no encontrada</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f9fa;
        }
        .error-container {
            text-align: center;
            max-width: 600px;
            margin: auto;
        }
        h1 {
            font-size: 6rem;
        }
        h2 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
    <div class="container error-container">
        <header>
            <h1 class="display-1 text-danger">404</h1>
        </header>
        <main>
            <h2 class="text-secondary">¡Oops! La página que buscas no existe.</h2>
            <p class="text-muted">Puede que la URL esté mal escrita, o que la página haya sido eliminada.</p>
            <a href="/crud-manoloMejor" class="btn btn-primary">Volver a la página de inicio</a>
        </main>
        <footer class="mt-5">
            <p class="text-muted">&copy; <?php echo date("Y"); ?> Tu Marca. Todos los derechos reservados.</p>
        </footer>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
