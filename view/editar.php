<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perro</title>
    <!-- Enlace a la CDN de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container my-5">
        <h2 class="text-center mb-4">Editar Perro</h2>
        
        <!-- Formulario con clases de Bootstrap -->
        <form action="/proyectos/MVCPerros/index.php/guardarCocheE" method="POST">
            
            <!-- Campo raza -->
            <div class="mb-3">
                <label for="raza" class="form-label">Raza:</label>
                <input type="text" name="raza" id="raza" class="form-control" value="<?php echo $rowset->getRaza() ?>" required>
            </div>

            <!-- Campo sexo -->
            <div class="mb-3">
                <label for="sexo" class="form-label">sexo:</label>
                <input type="text" name="sexo" id="sexo" class="form-control" value="<?php echo $rowset->getSexo() ?>" required>
            </div>

            <!-- Campo Color -->
            <div class="mb-3">
                <label for="color" class="form-label">Color:</label>
                <input type="text" name="color" id="color" class="form-control" value="<?php echo $rowset->getColor() ?>" required>
            </div>

            <!-- Campo peso -->
            <div class="mb-3">
                <label for="peso" class="form-label">peso:</label>
                <input type="text" name="peso" id="peso" class="form-control" value="<?php echo $rowset->getPeso() ?>" required>
            </div>
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" name="nombre" id="Nombre" class="form-control" value="<?php echo $rowset->getNombre() ?>" required>
            </div>

            <!-- Campo ID oculto -->
            <input type="text" name="id" id="id" value="<?php echo $rowset->getId() ?>" hidden>

            <!-- Botón de envío -->
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Editar coche</button>
            </div>
        </form>
    </div>

    <!-- Enlace al script de Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
