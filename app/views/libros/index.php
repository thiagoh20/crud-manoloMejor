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
                                <li class="nav-item">
                                    <a class="nav-link" href="/crud-manoloMejor/libros">Libros</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/crud-manoloMejor/usuarios">Usuarios</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/crud-manoloMejor/prestamos">Préstamos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/crud-manoloMejor/usuarios/login">Iniciar Sesión</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
        <!-- <main class="container my-5">
            <h2 class="mb-4">Lista de Libros</h2>
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Título</th>
                        <th scope="col">Autor</th>
                        <th scope="col">ISBN</th>
                        <th scope="col">Editorial</th>
                        <th scope="col">Género</th>
                        <th scope="col">Cantidad Disponible</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($libros as $libro): ?>
                        <tr>
                            <th scope="row"><?php echo htmlspecialchars($libro->ID); ?></th>
                            <td><?php echo htmlspecialchars($libro->Titulo); ?></td>
                            <td><?php echo htmlspecialchars($libro->Autor); ?></td>
                            <td><?php echo htmlspecialchars($libro->ISBN); ?></td>
                            <td><?php echo htmlspecialchars($libro->Editorial); ?></td>
                            <td><?php echo htmlspecialchars($libro->Categoria); ?></td>
                            <td><?php echo htmlspecialchars($libro->cantidad_disponible); ?></td>
                            <td>
                                <a href="/libros/detalle?id=<?php echo $libro->id; ?>" class="btn btn-small btn-warning">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </a>
                                <a href="/libros/form?id=<?php echo $libro->id; ?>" class="btn btn-small btn-danger">
                                    <i class="fa-regular fa-trash-can"></i>
                                </a>
                            </td>
                            <td>
                                <a href="/libros/detalle?id=<?php echo $libro->id; ?>" class="btn btn-info btn-sm">Ver
                                    Detalle</a>
                                <a href="/libros/form?id=<?php echo $libro->id; ?>"
                                    class="btn btn-warning btn-sm">Editar</a>
                            </td> 
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </main>

        <footer class="bg-light text-center py-4">
            <p>&copy; <?php echo date("Y"); ?> Tu Marca. Todos los derechos reservados.</p>
        </footer> -->

    </div>
</body>

</html>