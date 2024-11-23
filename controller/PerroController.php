<?php
class PerroController
{
    private $misperros;

    function __construct()
    {
        $this->misperros = Perro::obtenerPerros();
    }

    function index()
    {
        echo "<br> Llamando a la funcion index(): <br>";//depuracion
        $rowset = $this->misperros;
        //le paso datos a la vista
        require("view/index.php");


    }
    public function ver($id)
    {
        echo "Llamando a la función ver() con id: $id<br>"; // Mensaje de depuración
        //si ese identificador puesto en la barra de direcciones esta en el array
        //lo guarda en la variable rowset y lo muestra
        if (array_key_exists($id, $this->misperros)) {

            //Si el elemento está en el array, lo busco en rowset a partir de dicho id y lo muestro
            $rowset = $this->misperros[$id];
            require("view/ver.php");
        } else {
            echo "ID no encontrado, regresando a index<br>";
            $this->index();
        }
    }
    public function mostrarFormularioAlta()
    {
        require("view/alta.php");
    }
    public function guardarPerro()
    {
        // Verificar que los datos han sido enviados
        if (isset($_POST['raza'], $_POST['nombre'], $_POST['peso'], $_POST['color'], $_POST['sexo'])) {
            // Obtener los datos enviados a traves del id
            $raza = $_POST['raza'];
            $nombre = $_POST['nombre'];
            $peso = $_POST['peso'];
            $color = $_POST['color'];
            $sexo = $_POST['sexo'];
            // Llamar al método para dar de alta el coche
            if (Perro::darDeAlta($raza, $color, $sexo, $peso, $nombre)) {
                echo "Perro agregado correctamente.";
                header("Location: /proyectos/MVCPerros/index.php"); // Redirige a la vista principal después de agregar
            } else {
                echo "Error al agregar el Perro.";
            }
        } else {
            echo "Datos incompletos.";
        }
    }
    public function borrar($id)
    {
        // Verifica si el perro existe en el arreglo misperros, que es donde se encunetran todos los perros
        if (isset($this->misperros[$id])) {
            Perro::borrar($id);  // Llama al método borrar del modelo
            echo "Se ha borrado el perro";
            header("refresh:1; url=/proyectos/MVCPerros/index.php");
        } else {
            // Si no existe, muestra un mensaje o llama al método por defecto
            echo "El perro no existe o ha sido eliminado previamente.";
            $this->index();
        }
    }
    public function editar($id)
    {
        echo "<br>Llamando a la función editar() con id: $id <br>"; // Mensaje de depuración
        //si el id que he recibido como parametro existe en el array
        if (array_key_exists($id, $this->misperros)) {

            //lo busco en rowset a partir de dicho id y lo muestro
            $rowset = $this->misperros[$id];
            require("view/editar.php");
        } else {
            echo "ID no encontrado, regresando a index<br>";
            $this->index();
        }
    }

    public function guardarCocheE()
    {
        // Verificar que los datos han sido enviados
        if (isset($_POST['raza'], $_POST['peso'], $_POST['color'], $_POST['sexo'], $_POST['id'], $_POST['nombre'])) {
            // Obtener los datos enviados a traves del id
            $raza = $_POST['raza'];
            $peso = $_POST['peso'];
            $color = $_POST['color'];
            $sexo = $_POST['sexo'];
            $nombre = $_POST['nombre'];
            $id = $_POST['id'];
            // Llamar al método para que edite el coche
            if (Perro::modificar($raza, $sexo, $color, $peso, $id, $nombre)) {
                echo "Coche editado correctamente.";
                header("Location: /proyectos/MVCPerros/index.php"); // Redirige a la vista principal después de modificar
            } else {
                echo "Error al agregar el perro.";
            }
        } else {
            echo "Datos incompletos.";
        }
    }
    public function mostrarFormularioCruze()
    {
        require("view/cruce.php");
    }
    public function verificarSexos($id1, $id2)
    {
        // Llamada al modelo para obtener los sexos de los perros con los IDs proporcionados, ya que el modelo es el unico
        //que puede obtener la informacion de los perros
        $sexos = Perro::obtenerSexos($id1, $id2);

        // Depuración
        //echo "<pre>";
        //print_r($sexos);
        //echo "</pre>";
        // Validación: verificar si se encontraron dos resultados
        if (count($sexos) == 2) {
            // Si hay exactamente dos perros encontrados, extraemos sus sexos
            $sexo1 = $sexos[0]['sexo'];
            $sexo2 = $sexos[1]['sexo'];
            //¿pueden procrear ya sabiendo los sexos?
            if ($sexo1 == $sexo2) {
                echo "No pueden procrear, son del mismo sexo.";
            } else {
                $madre = ($sexo1 == "H") ? $id1 : $id2;
                $padre = ($sexo1 == "H") ? $id2 : $id1;

                Perro::agregarCachorro($padre, $madre);
                //refresco para que vuelva al proyecto principal
                header("refresh:1; url=/proyectos/MVCPerros/index.php");
            }
        } else {
            echo "Uno o ambos IDs no existen.";
        }
    }

}