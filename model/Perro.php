<?php
class Perro
{
    private $id;
    private $raza;
    private $color;
    private $sexo;
    private $nombre;
    private $peso;
    public static $perros;

    public function __construct($miId, $miRaza, $miColor, $miSexo, $miNombre, $miPeso)
    {
        $this->id = $miId;
        $this->raza = $miRaza;
        $this->color = $miColor;
        $this->sexo = $miSexo;
        $this->nombre = $miNombre;
        $this->peso = $miPeso;

    }

    function setRaza($miRaza)
    {
        $this->raza = $miRaza;
    }
    function getRaza()
    {
        return $this->raza;
    }
    function setColor($miColor)
    {
        $this->color = $miColor;
    }
    function getColor()
    {
        return $this->color;
    }
    function setSexo($miSexo)
    {
        $this->sexo = $miSexo;
    }
    function getSexo()
    {
        return $this->sexo;
    }
    function setNombre($miNombre)
    {
        $this->nombre = $miNombre;
    }
    function getNombre()
    {
        return $this->nombre;
    }
    function setPeso($miPeso)
    {
        $this->peso = $miPeso;
    }
    function getPeso()
    {
        return $this->peso;
    }
    function getId()
    {
        return $this->id;
    }

    public static function obtenerPerros()
    {
        try {
            //creo la conexion,Este objeto tiene métodos para interactuar con la base de datos.
            $conexion = new PDO("mysql:host=localhost;dbname=animales", "root", "");
            //meto en la variable rows la informacion que consulta de la base de datos
            // query es un método de PDO o MySQLi que ejecuta una consulta SQL directamente en la base de datos
            $rows = $conexion->query('SELECT id, nombre, raza, color, peso, sexo FROM perros');
            //Este bucle recorre los resultados de la consulta obtenidos almacenados en rows
            // y crea instancias de la clase perro con los datos obtenidos de cada fila
            //cada fila es asignada con la variable row2 
            //en cada iteracion se crea un nuevo objeto de la clase coche utilizando los datos de las filas(row2)
            foreach ($rows as $row2) {
                $perro = new Perro($row2["id"], $row2["raza"], $row2["color"], $row2["sexo"], $row2["nombre"], $row2["peso"]);
                //aqui el nuevo objeto coche se agrega a un array 
                //Las propiedades estáticas pertenecen a la clase en sí y 
                //no a una instancia particular, lo que permite que todas las instancias de la clase accedan a ella.
                self::$perros[$row2["id"]] = $perro;
            }
            return self::$perros;
        } catch (PDOException $e) {
            echo "Error en la conexión a la base de datos: " . $e->getMessage();
            return [];
        }
    }
    public static function darDeAlta($raza, $color, $sexo, $peso, $nombre)
    {
        try {
            //1.Conectamos a la base de datos (ajusta los datos de conexión según sea necesario)
            $conexion = new PDO("mysql:host=localhost;dbname=animales", "root", "");

            //2.Preparamos la consulta SQL para insertar un nuevo coche
            $sql = "INSERT INTO perros (raza, color, sexo, peso, nombre) VALUES (:raza, :color, :sexo, :peso, :nombre)";
            $stmt = $conexion->prepare($sql);

            // Vinculamos los parámetros con los valores proporcionados
            $stmt->bindParam(':raza', $raza);
            $stmt->bindParam(':color', $color);
            $stmt->bindParam(':sexo', $sexo);
            $stmt->bindParam(':peso', $peso);
            $stmt->bindParam(':nombre', $nombre);

            // Ejecutamos la consulta
            if ($stmt->execute()) {
                echo "Perro agregado con éxito.";
                return true; // Devolvemos true si la operación fue exitosa
            } else {
                echo "Error al agregar el perro.";
                return false;
            }
        } catch (PDOException $e) {
            echo "Error en la conexión o en la consulta: " . $e->getMessage();
            return false;
        }
    }
    public static function borrar($id)
    {
        // Conexión a la base de datos
        $conexion = new PDO("mysql:host=localhost;dbname=animales", "root", "");

        // Consulta SQL con parámetros
        $sql = 'DELETE FROM perros WHERE id = :id';
        $stmt = $conexion->prepare($sql);

        // Vincula el parámetro
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        // Ejecuta la consulta
        $stmt->execute();
    }
    public static function modificar($raza, $sexo, $color, $peso, $id, $nombre)
    {
        try {
            // 1. Conectamos a la base de datos (ajusta los datos de conexión según sea necesario)
            $conexion = new PDO("mysql:host=localhost;dbname=animales", "root", "");

            // Habilitamos el manejo de excepciones para PDO
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // 2. Preparamos la consulta SQL para EDITAR un coche
            $sql = "UPDATE perros 
                SET raza = :raza, sexo = :sexo, color = :color, peso = :peso, nombre = :nombre
                WHERE id = :id";
            $stmt = $conexion->prepare($sql);

            // Vinculamos los parámetros con los valores proporcionados
            $stmt->bindParam(':raza', $raza);
            $stmt->bindParam(':sexo', $sexo);
            $stmt->bindParam(':color', $color);
            $stmt->bindParam(':peso', $peso);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':nombre', $nombre);

            // Ejecutamos la consulta
            if ($stmt->execute()) {
                echo "Perro editado con éxito.";
                return true; // Devolvemos true si la operación fue exitosa
            } else {
                echo "Error al editar el Perro.";
                return false;
            }
        } catch (PDOException $e) {
            // Capturamos cualquier error y lo mostramos
            echo "Error en la conexión o en la consulta: " . $e->getMessage();
            return false;
        } finally {
            // Cerramos la conexión
            $conexion = null;
        }
    }
    public static function obtenerSexos($id1, $id2)
    {
        try{
        // Conexión a la base de datos
        $conexion = new PDO("mysql:host=localhost;dbname=animales", "root", "");
        //le tengo que preguntar al modelo cual es el sexo de ambos perros, por que el modelo es el unico que 
        //tiene la informacion de la base de datos
        $sql = "SELECT id, sexo 
                FROM perros 
                WHERE id IN (:id1, :id2)";

        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':id1', $id1, PDO::PARAM_INT);
        $stmt->bindParam(':id2', $id2, PDO::PARAM_INT);

        // Ejecutar la consulta
        $stmt->execute();

        // Obtener los resultados
        $sexos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $sexos; // Devuelve un array con los resultados
    } catch (PDOException $e) {
        echo "Error en la consulta: " . $e->getMessage();
        return [];
    }
    }
    public static function agregarCachorro($padre, $madre)
{
    try {
        // Conexión a la base de datos
        $conexion = new PDO("mysql:host=localhost;dbname=animales", "root", "");
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Obtener información de los progenitores
        $sql = "SELECT id, nombre, raza, color, sexo 
                FROM perros 
                WHERE id IN (:padre, :madre)";

        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':padre', $padre, PDO::PARAM_INT);
        $stmt->bindParam(':madre', $madre, PDO::PARAM_INT);
        $stmt->execute();

        $progenitores = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Verificar que se encontraron ambos progenitores
        if (count($progenitores) != 2) {
            return "Uno o ambos IDs no existen.";
        }

        // Identificar padre y madre
        $papa = ($progenitores[0]['id'] == $padre) ? $progenitores[0] : $progenitores[1];
        $mama = ($progenitores[0]['id'] == $madre) ? $progenitores[0] : $progenitores[1];

        // Condiciones del nuevo cachorrito
        $nombreCachorro = $papa['nombre'] . " Junior";
        $razaCachorro = $mama['raza'];
        $colorCachorro = $mama['color'];
        $pesoCachorro = 1; // Peso fijo
        $sexoCachorro = (strlen($papa['nombre']) > strlen($mama['nombre'])) ? $papa['sexo'] : $mama['sexo'];

        // Insertar el cachorro en la base de datos
        $sqlInsert = "INSERT INTO perros (nombre, raza, color, peso, sexo) 
                      VALUES (:nombre, :raza, :color, :peso, :sexo)";

        $stmtInsert = $conexion->prepare($sqlInsert);
        $stmtInsert->bindParam(':nombre', $nombreCachorro, PDO::PARAM_STR);
        $stmtInsert->bindParam(':raza', $razaCachorro, PDO::PARAM_STR);
        $stmtInsert->bindParam(':color', $colorCachorro, PDO::PARAM_STR);
        $stmtInsert->bindParam(':peso', $pesoCachorro, PDO::PARAM_INT);
        $stmtInsert->bindParam(':sexo', $sexoCachorro, PDO::PARAM_STR);
        $stmtInsert->execute();

        return "Cachorro agregado con éxito: $nombreCachorro";

    } catch (PDOException $e) {
        return "Error al agregar el cachorro: " . $e->getMessage();
    }
}

}