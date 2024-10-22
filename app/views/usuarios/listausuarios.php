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
                                    <a class="nav-link" href="/crud-manoloMejor/libros/form">Añadir libro</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/crud-manoloMejor/prestamos">Usuario</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="crud-manoloMejor/libros/detalle">Prestamos</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
        <main class="container my-5">
            <h2 class="mb-4 text-center">Registro de Usuarios</h2>
            
            <!-- Formulario de Registro de Usuarios -->
            <div class="container-fluid row">
                <form class="col-4 p-3" method="POST" action="/crud-manoloMejor/usuarios/registrar">
                    <h3 class="text-center text-secondary">Registro de Usuarios</h3>

                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre del usuario</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" required>
                    </div>

                    <div class="mb-3">
                        <label for="apellido" class="form-label">Apellido</label>
                        <input type="text" class="form-control" name="apellido" id="apellido" required>
                    </div>

                    <div class="mb-3">
                        <label for="tipo_doc" class="form-label">Tipo de documento</label>
                        <select id="tipo_doc" class="form-select" name="tipo_doc" required>
                            <option value="TI">Tarjeta de Identidad</option>
                            <option value="CC">Cédula de Ciudadanía</option>
                            <option value="CE">Cédula de Extranjería</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="documento" class="form-label">Documento</label>
                        <input type="number" class="form-control" name="documento" id="documento" required>
                    </div>

                    <div class="mb-3">
                        <label for="correo" class="form-label">Correo</label>
                        <input type="email" class="form-control" name="correo" id="correo" required>
                    </div>

                    <button type="submit" class="btn btn-primary" name="btnregistrar">Registrar</button>
                    <a href="/crud-manoloMejor/inicio" class="btn btn-secondary">Regresar</a>
                </form>

                <!-- Tabla de Usuarios -->
                <div class="col-8 p-4">
                    <h3 class="text-center text-secondary">Lista de Usuarios</h3>
                   
                    </table>
                </div>
            </div>
        </main>


        <footer class="bg-light text-center py-4">
            <p>&copy; <?php echo date("Y"); ?> Tu Marca. Todos los derechos reservados.</p>
        </footer>

    </div>
</body>

</html>