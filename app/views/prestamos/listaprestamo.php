<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/488b60e22f.js" crossorigin="anonymous"></script>
    <!-- Asegúrate de que la ruta sea correcta -->
    <title>Biblioteca</title>
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
                                    <a class="nav-link" href="/crud-manoloMejor/prestamos/form">Añadir préstamos</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
        <main class="container my-5">
            <h2 class="mb-4">Lista de préstamos</h2>
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Id Usuario</th>
                        <th scope="col">Id Libro</th>
                        <th scope="col">Fecha Préstamo</th>
                        <th scope="col">Fecha Devolución</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Acciones</th> <!-- Columna para acciones como editar o eliminar -->
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($prestamos as $prestamo): ?>
                        <tr>
                            <th scope="row"><?php echo htmlspecialchars($prestamo->ID); ?></th>
                            <td><?php echo htmlspecialchars($prestamo->ID_usuario); ?></td>
                            <td><?php echo htmlspecialchars($prestamo->ID_libro); ?></td>
                            <td><?php echo htmlspecialchars($prestamo->Fecha_prestamo); ?></td>
                            <td><?php echo htmlspecialchars($prestamo->Fecha_devolucion); ?></td>
                            <td><?php echo htmlspecialchars($prestamo->Estado); ?></td>
                            <td>
                                <a href="prestamos/detalle?id=<?php echo $prestamo->ID; ?>"
                                    class="btn btn-small btn-warning">
                                    <i class="fa-regular fa-pen-to-square"></i> <!-- Icono de editar -->
                                </a>
                                <a href="prestamos/eliminar?id=<?php echo $prestamo->ID; ?>"
                                    class="btn btn-small btn-danger">
                                    <i class="fa-regular fa-trash-can"></i> <!-- Icono de eliminar -->
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </main>


        <footer class="bg-light text-center py-4">
            <p>&copy; <?php echo date("Y"); ?> Tu Marca. Todos los derechos reservados.</p>
        </footer>

    </div>
</body>

</html>