<?php
    // include_once "abstractAdmin.php";
    require_once __DIR__ . "/../models/admin.php";
    require_once __DIR__ . "/../config/class_admin/dbconection.php";
    
 
    class AdminController {
        private $model;
    
        public function __construct($db) {
            $this->model = new adminModel($db);
        }
    
        public function handleAddClientForm($postData, $fileData) {
            // Set user properties
            $this->model->name = $postData['name'];
            $this->model->email = $postData['email'];
            $this->model->password = password_hash($postData['password'], PASSWORD_DEFAULT); // Hash password
            $this->model->role = $postData['role'];
            $this->model->statu = $postData['status'];
            $this->model->profile_pic = $fileData['profile_pic']['name'] ;
    
         
    
            // Save user to the database
            $result = $this->model->createAccount();
    
            // Handle account type and balance
            if ($result === true) {
                return "Client account created successfully!";
            } else {
                return "Failed to create client account.";
            }
        }
    }
    ?>
    
  
    

    