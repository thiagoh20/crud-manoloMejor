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
        <main class="container my-3">
            <h2 class="mb-4 text-center">Libros Disponibles</h2>
            <div class="row">
                <?php foreach ($libros as $libro): ?>
                    <div class="col-md-3 mb-2">
                        <div class="card">
                            <img style="width: 80%;" src="/crud-manoloMejor/imagenLibro.png" class="card-img-top"
                                alt="<?php echo htmlspecialchars($libro->Titulo); ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($libro->Titulo); ?></h5>
                                <p class="card-text">
                                    <strong>Autor:</strong> <?php echo htmlspecialchars($libro->Autor); ?><br>
                                    <strong>ISBN:</strong> <?php echo htmlspecialchars($libro->ISBN); ?><br>
                                    <strong>Editorial:</strong> <?php echo htmlspecialchars($libro->Editorial); ?><br>
                                    <strong>Género:</strong> <?php echo htmlspecialchars($libro->Categoria); ?><br>
                                    <strong>Cantidad Disponible:</strong>
                                    <?php echo htmlspecialchars($libro->cantidad_disponible); ?>
                                </p>
                                <div class="d-flex justify-content-between">
                                    <a href="/libros/detalle?id=<?php echo $libro->id; ?>" class="btn btn-info btn-sm">Ver
                                        Detalle</a>

                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </main>

        <footer class="bg-light text-center py-4">
            <p>&copy; <?php echo date("Y"); ?> Tu Marca. Todos los derechos reservados.</p>
        </footer>

    </div>
</body>

</html>