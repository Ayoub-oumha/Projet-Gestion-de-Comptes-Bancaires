<?php
session_start();
require_once 'config/Database.php';
require_once 'models/User.php';
require_once 'controllers/UserController.php';

$action = $_GET['action'] ?? '';
$controller = new UserController();

switch($action) {
    case 'addUser':
        $controller->addUser();
        break;
    default:
        // Redirection vers la page par défaut
        header('Location: views/admin/dashbord_admin.php');
        break;
} 