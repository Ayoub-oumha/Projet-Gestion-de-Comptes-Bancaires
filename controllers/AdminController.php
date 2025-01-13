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
           
            $this->model->accType =  $postData['accType'];
            $this->model->balance =  $postData['balance'];
            
            if (!empty($fileData['profile_pic']['tmp_name'])) {
                $image_name = $fileData['profile_pic']['tmp_name'];
        
                // Check file type
                $fileType = mime_content_type($image_name);
                $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        
                if (!in_array($fileType, $allowedTypes)) {
                    die('Unsupported file type! Please use JPEG, PNG, or GIF formats.');
                }
        
                // Check file size (2MB limit)
                if ($fileData['profile_pic']['size'] > 3 * 1024 * 1024) {
                    die('File size is too large! Maximum size allowed is 3 MB.');
                }
        
               
                $imageData = file_get_contents($image_name);
                $this->model->profile_pic = $imageData ;
            }
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
    
  
    

    