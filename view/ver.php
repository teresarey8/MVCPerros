<style>
    th {
        width: 8rem;
        text-align: left;
        border-bottom: 1px solid black;
    }

    td {
        width: 8rem;
    }
</style>

<h1>Ejemplo 6: Vista de perro</h1>
<table>
    <tr>
        <th>Id</th>
        <th>Nombre</th>
        <th>Raza</th>
        <th>Color</th>
        <th>Peso</th>
        <th>Sexo</th>
    </tr>
    <!--Este ejemplo muestra la información de un único coche en la
 tabla. En lugar de utilizar un bucle foreach, se accede directamente
 a un solo objeto $rowset, que contiene los datos del coche individual seleccionado.-->
    <tr>
        <td><?php echo $rowset->getId() ?></td>
        <td><?php echo $rowset->getNombre() ?></td>
        <td><?php echo $rowset->getRaza() ?></td>
        <td><?php echo $rowset->getColor() ?></td>
        <td><?php echo $rowset->getPeso() ?></td>
        <td><?php echo $rowset->getSexo() ?></td>
    </tr>
</table>