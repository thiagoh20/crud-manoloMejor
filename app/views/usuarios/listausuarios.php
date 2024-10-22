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
                                    <a class="nav-link" href="/crud-manoloMejor/usuarios">usuarios</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/crud-manoloMejor/usuarios/form">Añadir Usuario</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="crud-manoloMejor/usuarios/detalle">Prestamos</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
        <main class="container my-5">
            <h2 class="mb-4">Lista de usuarios</h2>
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">nombre</th>
                        <th scope="col">apellido</th>
                        <th scope="col">tipo_doc</th>
                        <th scope="col">documento</th>
                        <th scope="col">correo</th>
                       
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($usuarios as $usuario): ?>
                        <tr>
                            <th scope="row"><?php echo htmlspecialchars($usuario->ID); ?></th>
                            <td><?php echo htmlspecialchars($usuario->Nombres); ?></td>
                            <td><?php echo htmlspecialchars($usuario->Apellidos); ?></td>
                            <td><?php echo htmlspecialchars($usuario->tipo_doc); ?></td>
                            <td><?php echo htmlspecialchars($usuario->documento); ?></td>
                            <td><?php echo htmlspecialchars($usuario->correo); ?></td>
                            <td>
                                <a href="usuarios/detalle?id=<?php echo $usuario->ID; ?>" class="btn btn-small btn-warning">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </a>
                                <a href="usuarios/eliminar?id=<?php echo $usuario->ID; ?>" class="btn btn-small btn-danger">
                                    <i class="fa-regular fa-trash-can"></i>
                                </a>
                            </td>
                            <!-- <td>
                                <a href="/usuarios/detalle?id=<?php echo $usuario->id; ?>" class="btn btn-info btn-sm">Ver
                                    Detalle</a>
                                <a href="/usuarios/form?id=<?php echo $usuario->id; ?>"
                                    class="btn btn-warning btn-sm">Editar</a>
                            </td> 
                        </tr> -->
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