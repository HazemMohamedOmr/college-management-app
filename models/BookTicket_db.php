<?php

require('database.php');

Class BookTicket{
    private $booktitle;
    private $startdate;
    private $Enddate;
    private $period;
 




         public function viewissuedBooks(){
            $db = Database::getInstance();
            $mysqli = $db->getConnection();
    
            $sql_query = 'SELECT `B-title`, `L-id`, `Start_date`, `End-Date`, `period` FROM `books-issued`';
            $issuedbook = $mysqli->query($sql_query);
            $issuedbooks = mysqli_fetch_all($issuedbook, MYSQLI_ASSOC);
            return $issuedbooks;
        }



      



    public function issueBook($booktitle,$startdate, $Enddate){
        $db = Database::getInstance();
        $mysqli = $db->getConnection();

        session_start();
        $libid = $_SESSION['id'];

        $this->booktitle = mysqli_real_escape_string($mysqli,$booktitle);
        $this->startdate = mysqli_real_escape_string($mysqli,$startdate);
        $this->Enddate = mysqli_real_escape_string($mysqli, $Enddate);
    
 
     
        $sql_query= "INSERT INTO`books-issued`(`B-title`, `L-id`, `Start_date`, `End-Date`) VALUES ('$this->booktitle', '$libid' ,' $this->startdate', '$this->Enddate')";
        echo $sql_query;
        if(mysqli_query($mysqli, $sql_query)){
            header('Location: ../views/librarian/IssuedBooks.php');
            
        } else {
            echo 'query error: '. mysqli_error($mysqli);
           
        }
    }

  



}



?>