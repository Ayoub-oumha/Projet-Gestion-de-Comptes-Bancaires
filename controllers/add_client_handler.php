<?php
    require_once __DIR__ . "/../config/class_admin/dbconection.php";
require_once 'AdminController.php';


$database = new Database();
$db = $database->connect();


$adminController = new AdminController($db);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $result = $adminController->handleAddClientForm($_POST, $_FILES);


    if ($result === "Client account created successfully!") {
        header('Location: ../views/success.php');
    } else {
        echo $result; 
    }
}
?>
