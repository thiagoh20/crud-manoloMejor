<?php

class Usuario
{

    private $pdo;

    public function __construct()
    {
        // Conexión a la base de datos usando Singleton
        $this->pdo = Database::getInstance();
    }

    // Método para insertar un nuevo libro en la base de datos
    public function registrarUsuario($nombre, $apellido, $tipo_doc, $documento, $correo)
    {
        try {

            $sql = "INSERT INTO usuarios ( Nombres, Apellidos, tipo_doc, documento, correo)
                    VALUES (:nombre, :apellido, :tipo_doc, :documento, :correo)";
            $stmt = $this->pdo->prepare($sql);

            // Bind de los parámetros para evitar SQL injection
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':apellido', $apellido);
            $stmt->bindParam(':tipo_doc', $tipo_doc);
            $stmt->bindParam(':documento', $documento);
            $stmt->bindParam(':correo', $correo);


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
    public function obtenerUsuarios()
    {
        $sql = "SELECT * FROM usuarios";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    // Método para encontrar un libro por su ID
    public function obtenerUsuarioPorId($id)
    {
        $sql = "SELECT * FROM usuarios WHERE ID = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    // Método para actualizar los datos de un libro
    public function actualizarUsuario($id, $nombre, $apellido, $tipo_doc, $documento, $correo)
    {
        $sql = "UPDATE usuarios SET 
                Nombres = :nombre, 
                Apellidos = :apellido, 
                tipo_doc = :tipo_doc, 
                documento = :documento, 
                correo = :correo 
            WHERE ID = :id";  // Eliminada la coma aquí
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellido', $apellido);
        $stmt->bindParam(':tipo_doc', $tipo_doc);
        $stmt->bindParam(':documento', $documento);
        $stmt->bindParam(':correo', $correo);
        $stmt->bindParam(':id', $id);

        return $stmt->execute();
    }

    // Método para eliminar un libro
    public function eliminarUsuario($id)
    {
        $sql = "DELETE FROM usuarios WHERE ID = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
?>