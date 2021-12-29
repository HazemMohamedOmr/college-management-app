<?php

require('book_db.php');

    class Admin{

        private $F_NAME;
        private $L_Name;
        private $DOB;
        private $gender;
        private $E_Mail;
        private $password;
        private $address;

        public function viewBook(){
            $book = new Book();
            $books = $book->listbook();
            return $books;
        }

        public function addAdmin($F_NAME,$L_Name,$DOB,$gender,$E_Mail,$password,$address,$collegename ) {
            $db = Database::getInstance();
            $mysqli = $db->getConnection();
            $this->F_NAME =mysqli_real_escape_string($mysqli,$F_NAME);
            $this->L_Name =mysqli_real_escape_string($mysqli,$L_Name);
            $this->DOB =mysqli_real_escape_string($mysqli,$DOB);
            $this->gender =mysqli_real_escape_string($mysqli,$gender);
            $this->E_Mail =mysqli_real_escape_string($mysqli,$E_Mail);
            $this->password =mysqli_real_escape_string($mysqli,$password);
            $this->address =mysqli_real_escape_string($mysqli,$address);


            session_start();
            $adid = $_SESSION['id'];
            $college = mysqli_real_escape_string($mysqli,$collegename);
        
            
            $sql_query = "INSERT INTO `user`(`F_NAME`, `L_Name`, `DOB`, `gender`, `E_Mail`, `password`, `address`) 
            VALUES ('$this->F_NAME','$this->L_Name','$this->DOB','$this->gender','$this->E_Mail','$this->password','$this->address')";
            
            echo($sql_query);
            if(mysqli_query($mysqli, $sql_query)){
                echo  ' success';
                
            } else {
                echo 'query error: '. mysqli_error($mysqli);
            }
        
            $que = "SELECT ID FROM `user` where `E_Mail` = '$this->E_Mail'";
            $result = $mysqli->query($que);
            $user = mysqli_fetch_all($result, MYSQLI_ASSOC);
            $id = $user[0]['ID'];
        
            $query = "INSERT INTO `admin` VALUES('$id', '$college', $adid)";
            echo $query;
            if(mysqli_query($mysqli, $query)){
                echo  ' success';
                header("Location: ../views/superadmin/admin.php");
                
            } else {
                echo 'query error: '. mysqli_error($mysqli);
            }
        }
    }

?>