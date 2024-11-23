<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="/proyectos/MVCPerros/index.php/verificarSexos" method="post">
        <div>
            <label for="id1" class="form-label">Id del perro 1 a cruzar:</label>
            <input type="number" name="id1" id="id1" class="form-control" required>
        </div>
        <div>
            <label for="id2" class="form-label">Id del perro 2 a cruzar:</label>
            <input type="number" name="id2" id="id2" class="form-control" required>
        </div>
        <div">
            <button type="submit">cruzar</button>
        </div>
    </form>
</body>

</html>