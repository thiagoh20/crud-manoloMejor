<?php
require_once 'config/database.php';

class Login
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    // Registra un nuevo usuario
    public function registrar($nombre, $email, $password) {
        $sql = "INSERT INTO login (nombre, email, password) VALUES (:nombre, :email, :password)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);

        return $stmt->execute();
    }


    // Busca un usuario por su correo electrónico
    public function buscarPorEmail($email) {
        $sql = "SELECT * FROM login WHERE email = :email";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_OBJ);
    }
}
