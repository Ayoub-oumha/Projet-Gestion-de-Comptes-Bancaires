<?php
   
require_once __DIR__ . "/../config/class_admin/dbconection.php";


class adminModel  {
    private $conn;
    // private $table = 'users';

    public $id = 10;
    public $name;
    public $email;
    public $password;
    public $profile_pic ;
    public $role ;
    public $statu ;
    public $accType ;
    public $balance  ;

    public function __construct($db) {
        $this->conn = $db;
    }

    function createAccount(){
        // create user account 
        try {
            $createUser = $this->conn->prepare("INSERT INTO users(name, email,	password , profile_pic , role , status) values (?,?,?,?,?,?)");
            $createUser->execute([$this->name, $this->email, $this->password , $this->profile_pic , $this->role ,$this->statu]);
            $createAcc = $this->conn->prepare("INSERT INTO accounts(user_id , account_type ,	balance ) values (?,?,? )");
            $createAcc->execute([$this->id, $this->accType, $this->balance  ]);
        return true;
        } catch (PDOException $e){
            return "failed to insert users" . $e;
        }  

    }
    function showAllUsers(){
        // ,  account_type	, balance ,	currency from users JOIN accounts ON users.id = accounts.user_id
            $getAll = $this->conn->prepare("SELECT id ,  name , email , password , profile_pic , role , status , created_at , updated_at from users");
            $getAll -> execute();
            $getItAsArr = $getAll->fetchAll(PDO::FETCH_ASSOC);
            return $getItAsArr;
            return 11 ;
        }
        

   
   

}
 ?>

 <?php
// require_once "../config/database.php";

// class User {
//     private $conn;
//     private $table = 'users';

//     public $id;
//     public $name;
//     public $email;
//     public $password;

//     public function __construct($db) {
//         $this->conn = $db;
//     }

//     public function createUser() {
//         $sql = "INSERT INTO " . $this->table . " (name, email, password) VALUES (:name, :email, :password)";
//         $stmt = $this->conn->prepare($sql);
//         $stmt->bindParam(':name', $this->name);
//         $stmt->bindParam(':email', $this->email);
//         $stmt->bindParam(':password', $this->password);
//         return $stmt->execute();
//     }
// }
// ?>
