<?php

require('database.php');

Class Login{

    private $email;
    private $password;

    public function login($email, $password){
        $db = Database::getInstance();
        $mysqli = $db->getConnection();
        
        $this->email = mysqli_real_escape_string($mysqli,$email);
        $this->password = mysqli_real_escape_string($mysqli, $password);
     
        $sql_query= "SELECT * FROM user WHERE E_Mail = '$this->email' && password = '$this->password'";
        $result = $mysqli->query($sql_query);
        if(mysqli_num_rows($result)==0){
			echo "User Not found";
            header("Location: ../views/404.php");
		}else{
			echo "User found";
            $user = mysqli_fetch_all($result, MYSQLI_ASSOC);
            $this->auth($user[0]['ID'], $user[0]['role']);
		}
        
    }

    private function auth($id, $role){
        $db = Database::getInstance();
        $mysqli = $db->getConnection();

        if($role == 'admin'){
            $sql_query = "SELECT * FROM user JOIN admin on user.ID = admin.ID where user.ID = $id";

            $result = $mysqli->query($sql_query);
            $user = mysqli_fetch_all($result, MYSQLI_ASSOC);
            print_r($user);

            session_start();
            $_SESSION["id"] = $user[0]['ID'];
            $_SESSION["fname"] = $user[0]['F_NAME'];
            $_SESSION["lname"] = $user[0]['L_Name'];
            $_SESSION["dob"] = $user[0]['DOB'];
            $_SESSION["address"] = $user[0]['address'];
            $_SESSION["email"] = $user[0]['E_Mail'];
            $_SESSION["password"] = $user[0]['password'];
            $_SESSION["gender"] = $user[0]['gender'];
            $_SESSION["role"] = $user[0]['role'];
            $_SESSION["college"] = $user[0]['College-Name'];

            header("Location: ../views/admin/home.php");

        }elseif($role == 'superadmin'){
            $sql_query = "SELECT * FROM user JOIN `super-admin` on user.ID = `super-admin`.ID where user.ID = $id";

            $result = $mysqli->query($sql_query);
            $user = mysqli_fetch_all($result, MYSQLI_ASSOC);
            print_r($user);

            session_start();
            $_SESSION["id"] = $user[0]['ID'];
            $_SESSION["fname"] = $user[0]['F_NAME'];
            $_SESSION["lname"] = $user[0]['L_Name'];
            $_SESSION["dob"] = $user[0]['DOB'];
            $_SESSION["address"] = $user[0]['address'];
            $_SESSION["email"] = $user[0]['E_Mail'];
            $_SESSION["password"] = $user[0]['password'];
            $_SESSION["role"] = $user[0]['role'];
            $_SESSION["gender"] = $user[0]['gender'];

            header("Location: ../views/superadmin/home.php");

        }elseif($role == 'student'){
            $sql_query = "SELECT * FROM user JOIN student on user.ID = student.ID where user.ID = $id";

            $result = $mysqli->query($sql_query);
            $user = mysqli_fetch_all($result, MYSQLI_ASSOC);
            print_r($user);

            session_start();
            $_SESSION["id"] = $user[0]['ID'];
            $_SESSION["fname"] = $user[0]['F_NAME'];
            $_SESSION["lname"] = $user[0]['L_Name'];
            $_SESSION["dob"] = $user[0]['DOB'];
            $_SESSION["address"] = $user[0]['address'];
            $_SESSION["email"] = $user[0]['E_Mail'];
            $_SESSION["password"] = $user[0]['password'];
            $_SESSION["gender"] = $user[0]['gender'];
            $_SESSION["role"] = $user[0]['role'];
            $_SESSION["college"] = $user[0]['College-Name'];
            $_SESSION["level"] = $user[0]['level'];

            header("Location: ../views/student/home.php");

        }elseif($role == 'teacher'){
            $sql_query = "SELECT * FROM user JOIN teacher on user.ID = teacher.ID where user.ID = $id";

            $result = $mysqli->query($sql_query);
            $user = mysqli_fetch_all($result, MYSQLI_ASSOC);
            print_r($user);

            session_start();
            $_SESSION["id"] = $user[0]['ID'];
            $_SESSION["fname"] = $user[0]['F_NAME'];
            $_SESSION["lname"] = $user[0]['L_Name'];
            $_SESSION["dob"] = $user[0]['DOB'];
            $_SESSION["address"] = $user[0]['address'];
            $_SESSION["email"] = $user[0]['E_Mail'];
            $_SESSION["password"] = $user[0]['password'];
            $_SESSION["gender"] = $user[0]['gender'];
            $_SESSION["role"] = $user[0]['role'];
            $_SESSION["college"] = $user[0]['College-Name'];
            $_SESSION["tdegree"] = $user[0]['T-Degree'];

            header("Location: ../views/teacher/home.php");

        }elseif($role == 'librarian'){
            $sql_query = "SELECT * FROM user JOIN librarian on user.ID = librarian.ID where user.ID = $id";

            $result = $mysqli->query($sql_query);
            $user = mysqli_fetch_all($result, MYSQLI_ASSOC);
            print_r($user);

            session_start();
            $_SESSION["id"] = $user[0]['ID'];
            $_SESSION["fname"] = $user[0]['F_NAME'];
            $_SESSION["lname"] = $user[0]['L_Name'];
            $_SESSION["dob"] = $user[0]['DOB'];
            $_SESSION["address"] = $user[0]['address'];
            $_SESSION["email"] = $user[0]['E_Mail'];
            $_SESSION["password"] = $user[0]['password'];
            $_SESSION["gender"] = $user[0]['gender'];
            $_SESSION["role"] = $user[0]['role'];
            $_SESSION["college"] = $user[0]['College-Name'];
            $_SESSION["ldegree"] = $user[0]['L-degeree'];

            header("Location: ../views/librarian/home.php");
        }
    }
}

?>