<?php
require_once('database.php');
class TimeTable{

    private $description;

    public function listTimeTable(){
        $db = Database::getInstance();
        $mysqli = $db->getConnection();

        $sql_query = 'SELECT description from schedule';
        $result = $mysqli->query($sql_query);
        $results = mysqli_fetch_all($result, MYSQLI_ASSOC);


        return $results;

    }



}





?>