<?php

class Prestamo
{

    private $pdo;

    public function __construct()
    {
        // Conexión a la base de datos usando Singleton
        $this->pdo = Database::getInstance();
    }

    // Método para insertar un nuevo libro en la base de datos
    public function registrarPrestamo($id_usuario, $id_libro, $fecha_prestamo, $fecha_devolucion, $estado)
    {
        try {

            $sql = "INSERT INTO prestamos (id_usuario, id_libro, fecha_prestamo, fecha_devolucion, estado) 
                VALUES (:id_usuario, :id_libro, :fecha_prestamo, :fecha_devolucion, :estado)";
            $stmt = $this->pdo->prepare($sql);

            // Bind de los parámetros para evitar SQL injection
            $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
            $stmt->bindParam(':id_libro', $id_libro, PDO::PARAM_INT);
            $stmt->bindParam(':fecha_prestamo', $fecha_prestamo);
            $stmt->bindParam(':fecha_devolucion', $fecha_devolucion);
            $stmt->bindParam(':estado', $estado);


            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
            return false;
        }
    }

    // Método para obtener todos los libros
    public function obtenerPrestamos()
    {
        $sql = "SELECT * FROM prestamos";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    // Método para encontrar un libro por su ID
    public function obtenerPrestamoPorId($id)
    {
        $sql = "SELECT * FROM prestamos WHERE ID = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    // Método para actualizar los datos de un libro
    public function actualizarPrestamo($id_usuario, $id_libro, $fecha_prestamo, $fecha_devolucion, $estado, $id)
    {
        $sql = "UPDATE prestamos SET 
                ID_usuario = :id_usuario, 
                ID_libro = :id_libro, 
                Fecha_prestamo = :fecha_prestamo, 
                Fecha_devolucion = :fecha_devolucion, 
                Estado = :estado 
            WHERE ID = :id";  // Eliminada la coma aquí
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id_usuario', $id_usuario);
        $stmt->bindParam(':id_libro', $id_libro);
        $stmt->bindParam(':fecha_prestamo', $fecha_prestamo);
        $stmt->bindParam(':fecha_devolucion', $fecha_devolucion);
        $stmt->bindParam(':estado', $estado);
        $stmt->bindParam(':id', $id);

        return $stmt->execute();
    }

    // Método para eliminar un libro
    public function eliminarPrestamo($id)
    {
        $sql = "DELETE FROM prestamos WHERE ID = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
?>