function isExists($email){
        $isExist = $this->conn->prepare("SELECT email from users where email = ?");
        $isExist->execute([$email]);
        $check = $isExist->fetch(PDO::FETCH_ASSOC);
        if ($check){
            return true;
        } else{
            return false;
        }
    }
    // create client user and bank account
    function createAccount($name, $email,	$password , $profile_pic , $role , $statu , $accType, $balance){
        // create user account 
        try {
            $createUser = $this->conn->prepare("INSERT INTO users(name, email,	password , profile_pic , role , status) values (?,?,?,?,?,?)");
        $createUser->execute([$name, $email, $password , $profile_pic , $role , $statu]);
        } catch (PDOException $e){
            return "failed to insert users" . $e;
        }
        // get created user Id 
        try {
            $getUserId = $this->conn->prepare("SELECT id from users where client_name = ?");
        $getUserId->execute([$name]);
        $getId = $getUserId -> fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e){
            return "failed to get user id" . $e;
        }
        
        // create bank account for user
        try {
           $createBank = $this->conn->prepare("INSERT INTO accounts(user_id, account_type, balance) VALUES (?, ?, ?)");
        $createBank -> execute([$getId["id"],$accType,$balance]);
        } catch (PDOException $e){
            return "failed to insert account bank" . $e;
        }
    }
    // function showAllUsers(){
    //     $getAll = $this->conn->prepare("SELECT name , email , password , profile_pic , role	, status , created_at ,	updated_at ,  account_type	, balance ,	currency from users JOIN accounts ON users.id = accounts.user_id");
    //     $getAll -> execute();
    //     $getItAsArr = $getAll->fetchAll(PDO::FETCH_ASSOC);
    //     return $getItAsArr;
    // }
    function sayHello(){
        echo "hello" ;
    }