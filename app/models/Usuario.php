<?php

class Usuario {

    private $pdo;

    public function __construct() {
        // Conexión a la base de datos usando Singleton
        $this->pdo = Database::getInstance();
    }

    // Método para insertar un nuevo libro en la base de datos
    public function registrarLibro($titulo, $autor, $isbn, $editorial, $categoria, $cantidad_disponible) {
        try {
            $sql = "INSERT INTO libros (Titulo, Autor, ISBN, Editorial, Categoria, Cantidad_disponible) 
                    VALUES (:titulo, :autor, :isbn, :editorial, :categoria, :cantidad_disponible)";
            $stmt = $this->pdo->prepare($sql);

            // Bind de los parámetros para evitar SQL injection
            $stmt->bindParam(':titulo', $titulo);
            $stmt->bindParam(':autor', $autor);
            $stmt->bindParam(':isbn', $isbn);
            $stmt->bindParam(':editorial', $editorial);
            $stmt->bindParam(':categoria', $categoria);
            $stmt->bindParam(':cantidad_disponible', $cantidad_disponible);

            if ($stmt->execute()) {
                return true; // El libro se registró correctamente
            } else {
                return false; // Ocurrió un error al registrar el libro
            }
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
            return false;
        }
    }

    // Método para obtener todos los libros
    public function obtenerUsuarios() {
        $sql = "SELECT * FROM usuarios";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    // Método para encontrar un libro por su ID
    public function obtenerLibroPorId($id) {
        $sql = "SELECT * FROM libros WHERE ID = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    // Método para actualizar los datos de un libro
    public function actualizarLibro($id, $titulo, $autor, $isbn, $editorial, $categoria, $cantidad_disponible) {
        $sql = "UPDATE libros SET 
                    Titulo = :titulo, 
                    Autor = :autor, 
                    ISBN = :isbn, 
                    Editorial = :editorial, 
                    Categoria = :categoria, 
                    Cantidad_disponible = :cantidad_disponible 
                WHERE ID = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':autor', $autor);
        $stmt->bindParam(':isbn', $isbn);
        $stmt->bindParam(':editorial', $editorial);
        $stmt->bindParam(':categoria', $categoria);
        $stmt->bindParam(':cantidad_disponible', $cantidad_disponible);
        $stmt->bindParam(':id', $id);

        return $stmt->execute();
    }

    // Método para eliminar un libro
    public function eliminarLibro($id) {
        $sql = "DELETE FROM libros WHERE ID = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
?>
