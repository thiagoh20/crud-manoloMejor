<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/488b60e22f.js" crossorigin="anonymous"></script>
    <!-- Asegúrate de que la ruta sea correcta -->
    <title>Lista de Libros</title>
</head>

<body>
    <div class="container">
        <header class="bg-primary text-white p-3">
            <div class="container">
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
                                <li class="nav-item">
                                    <a class="nav-link" href="/crud-manoloMejor/libros/form">Añadir Libros</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/crud-manoloMejor/prestamos">Usuarios</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/crud-manoloMejor/prestamos">Prestamos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/crud-manoloMejor/usuarios/login">Detalles del libro</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
        <main class="container my-5">
    <h2 class="mb-4 text-center">Registro de Libros</h2>
    <form class="col-12 col-md-6 mx-auto p-4 border rounded shadow"method="POST" action="/crud-manoloMejor/libros/store">
        <div class="mb-3">
            <label for="titulo" class="form-label">Título del Libro</label>
            <input type="text" class="form-control" name="titulo" id="titulo" required>
        </div>

        <div class="mb-3">
            <label for="autor" class="form-label">Autor</label>
            <input type="text" class="form-control" name="autor" id="autor" required>
        </div>

        <div class="mb-3">
            <label for="isbn" class="form-label">ISBN</label>
            <input type="number" class="form-control" name="isbn" id="isbn" required>
        </div>

        <div class="mb-3">
            <label for="editorial" class="form-label">Editorial</label>
            <input type="text" class="form-control" name="editorial" id="editorial" required>
        </div>

        <div class="mb-3">
            <label for="categoria" class="form-label">Categoría</label>
            <select id="categoria" class="form-select" name="categoria" required>
                <option value="ficcion" selected>Ficción</option>
                <option value="no_ficcion">No Ficción</option>
                <option value="ciencia_ficcion">Ciencia Ficción</option>
                <option value="fantasia">Fantasía</option>
                <option value="misterio">Misterio</option>
                <option value="romance">Romance</option>
                <option value="terror">Terror</option>
                <option value="aventura">Aventura</option>
                <option value="biografia">Biografía</option>
                <option value="historia">Historia</option>
                <option value="poesia">Poesía</option>
                <option value="drama">Drama</option>
                <option value="autoayuda">Autoayuda</option>
                <option value="ensayo">Ensayo</option>
                <option value="comedia">Comedia</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="cantidad_disponible" class="form-label">Cantidad Disponible</label>
            <input type="number" class="form-control" name="cantidad_disponible" id="cantidad_disponible" required>
        </div>

        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-primary" name="btnregistrarLibro" value="ok">Registrar</button>
            <a href="inicioBiblio.php" class="btn btn-secondary">Regresar</a>
        </div>
    </form>
</main>


        <footer class="bg-light text-center py-4">
            <p>&copy; <?php echo date("Y"); ?> Tu Marca. Todos los derechos reservados.</p>
        </footer>

    </div>
</body>

</html>