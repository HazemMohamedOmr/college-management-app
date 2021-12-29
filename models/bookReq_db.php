<?php

require_once('database.php');

Class BookRequest{

    private $btitle;
    private $requestInfo;
    private $duration;

    public function addBook($btitle, $requestInfo, $duration){
        $db = Database::getInstance();
        $mysqli = $db->getConnection();
        
        $this->btitle = mysqli_real_escape_string($mysqli,$btitle);
        $this->requestInfo = mysqli_real_escape_string($mysqli,$requestInfo);
        $this->duration = mysqli_real_escape_string($mysqli, $duration);
     
        $sql_query= "INSERT INTO `request`(`S-id`,`B-titel`, `Request-info`, `duration`) VALUES ('5','$this->btitle', '$this->requestInfo','$this->duration')";
        echo $sql_query;
        if(mysqli_query($mysqli, $sql_query)){
            echo  'success';
            header('Location: ../views/student/mybooks.php');
            
        } else {
            echo 'query error: '. mysqli_error($mysqli);
        }
    }





}

?>