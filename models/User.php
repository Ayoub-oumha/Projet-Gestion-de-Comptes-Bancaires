<?php
class User {
    private $db;
    
    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }
    
    public function createUser($data) {
        $sql = "INSERT INTO users (nom, prenom, email, password, role) 
                VALUES (:nom, :prenom, :email, :password, :role)";
                
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->execute([
                ':nom' => $data['nom'],
                ':prenom' => $data['prenom'],
                ':email' => $data['email'],
                ':password' => password_hash($data['password'], PASSWORD_DEFAULT),
                ':role' => $data['role']
            ]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}


?>