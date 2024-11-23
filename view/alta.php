<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar un nuevo perro</title>
    <!-- Enlace a la CDN de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container my-5">
        <h1 class="text-center mb-4">Insertar un nuevo perro</h1>

        <!-- Formulario con clases de Bootstrap -->
        <form action="/proyectos/MVCPerros/index.php/guardarPerro" method="post">
            <div class="mb-3">
                <label for="raza" class="form-label">Raza:</label>
                <input type="text" name="raza" id="raza" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="sexo" class="form-label">Sexo:</label>
                <input type="text" name="sexo" id="sexo" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="color" class="form-label">Color:</label>
                <input type="text" name="color" id="color" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="peso" class="form-label">peso:</label>
                <input type="number" name="peso" id="peso" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="nombre" class="form-label">nombre:</label>
                <input type="text" name="nombre" id="nombre" class="form-control" required>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Insertar Perro</button>
            </div>
        </form>
    </div>

    <!-- Enlace al script de Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
