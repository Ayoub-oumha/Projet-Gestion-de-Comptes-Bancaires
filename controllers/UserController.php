<?php
class UserController {
    private $userModel;
    
    public function __construct() {
        $this->userModel = new User();
    }
    
    public function addUser() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userData = [
                'nom' => $_POST['nom'],
                'prenom' => $_POST['prenom'],
                'email' => $_POST['email'],
                'password' => $_POST['password'],
                'role' => $_POST['role']
            ];
            
            if ($this->userModel->createUser($userData)) {
                $_SESSION['success'] = "Utilisateur créé avec succès";
            } else {
                $_SESSION['error'] = "Erreur lors de la création de l'utilisateur";
            }
            
            header('Location: dashbord_admin.php');
            exit();
        }
    }
} 