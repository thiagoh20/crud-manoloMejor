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
                                    <a class="nav-link" href="/crud-manoloMejor/libros">Libros</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/crud-manoloMejor/usuarios">Usuarios</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/crud-manoloMejor/prestamos">Préstamos</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
        <main class="container my-5">
            <h2 class="mb-4 text-center">Editar préstamo</h2>
            <div class="container-fluid row">
                <form class="col-12 col-md-6 mx-auto p-4 border rounded shadow" method="POST"
                action="actualizar?id=<?php echo $prestamo->ID; ?>">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Id usuario</label>
                        <select readonly id="id_usuario" class="form-select" name="id_usuario" required>
                            <?php foreach ($usuarios as $usuario): ?>
                                <option value="<?php echo htmlspecialchars($usuario->ID); ?>" <?php echo isset($prestamo->ID_usuario) && $prestamo->ID_usuario == $usuario->ID ? 'selected' : ''; ?>>
                                    <?php echo htmlspecialchars($usuario->Nombres); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Id libro</label>
                        <select readonly id="id_libro" class="form-select" name="id_libro" required>
                            <?php foreach ($libros as $libro): ?>
                                <option value="<?php echo htmlspecialchars($libro->ID); ?>" <?php echo isset($prestamo->ID_libro) && $prestamo->ID_libro == $libro->ID ? 'selected' : ''; ?>>
                                    <?php echo htmlspecialchars($libro->Titulo); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Fecha de prestamo</label>
                        <input type="date" class="form-select" name="fecha_prestamo"  value="<?php echo isset($prestamo->Fecha_prestamo) ? htmlspecialchars($prestamo->Fecha_prestamo) : ''; ?>"required>

                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Fecha de devolucion</label>
                        <input type="date" class="form-select" name="fecha_devolucion"  value="<?php echo isset($prestamo->Fecha_devolucion) ? htmlspecialchars($prestamo->Fecha_devolucion) : ''; ?>"required>
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Estado</label>
                        <select id="estado" class="form-select" name="estado" required>
                            <option value="Devuelto" <?php echo isset($prestamo->Estado) && $prestamo->Estado == 'Devuelto' ? 'selected' : ''; ?>>Devuelto</option>
                            <option value="Prestado" <?php echo isset($prestamo->Estado) && $prestamo->Estado == 'Prestado' ? 'selected' : ''; ?>>Prestado</option>
                        </select>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary" name="btnregistrar">Actualizar</button>
                        <a href="/crud-manoloMejor/prestamos" class="btn btn-secondary">Regresar</a>
                    </div>
                </form>

            </div>
        </main>


        <footer class="bg-light text-center py-4">
            <p>&copy; <?php echo date("Y"); ?> Tu Marca. Todos los derechos reservados.</p>
        </footer>

    </div>
</body>

</html>