<?php

require('database.php');
Class college{
    private $SA_id;
    private $Name;
    private $DOS;
    private $Adress;

    public function listCollege(){
        $db = Database::getInstance();
        $mysqli = $db->getConnection();

        $sql_query = 'SELECT `Name`, `DOS`, `Adress` FROM `college`';

        $result = $mysqli->query($sql_query);
        $books = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $books;
    }


    public function addCollege($Name,$DOS,$Adress) {
        $db = Database::getInstance();
        $mysqli = $db->getConnection();
        $this->Name =mysqli_real_escape_string($mysqli,$Name);
        $this->DOS =mysqli_real_escape_string($mysqli,$DOS);
        $this->Adress =mysqli_real_escape_string($mysqli,$Adress);

        session_start();
        $adid = $_SESSION['id'];

        $sql_query = "INSERT INTO `college`(`Name`, `DOS`,`SA-id`, `Adress`) VALUES ('$this->Name','$this->DOS','$adid','$this->Adress')";
        echo($sql_query);
        if(mysqli_query($mysqli, $sql_query)){
            echo  ' success';
            header("Location: ../views/superadmin/college.php");
            
        } else {
            echo 'query error: '. mysqli_error($mysqli);
        }
    }

}

?>