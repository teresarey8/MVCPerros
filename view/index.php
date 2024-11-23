<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Perros</title>
    <!-- Enlace a la CDN de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container my-4">
        <!-- Título de la página -->
        <h1 class="text-center mb-4">Listado de Perros</h1>

        <!-- Tabla estilizada con Bootstrap -->
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Raza</th>
                    <th>Color</th>
                    <th>Peso</th>
                    <th>Sexo</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rowset as $row): ?>
                    <tr>
                        <td><?php echo $row->getId(); ?></td>
                        <td><?php echo $row->getNombre(); ?></td>
                        <td><?php echo $row->getRaza(); ?></td>
                        <td><?php echo $row->getColor(); ?></td>
                        <td><?php echo $row->getPeso(); ?></td>
                        <td><?php echo $row->getSexo(); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <!-- Enlace al script de Bootstrap JS (opcional para interacción adicional como modales, dropdowns, etc.) -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>