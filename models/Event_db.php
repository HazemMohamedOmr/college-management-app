<?php 

require_once('database.php');

class Event{

    private $Name;
    private $place;
    private $description;
    private $date;
    private $time;

    public function listEvent(){

        $db = Database::getInstance();
        $mysqli = $db->getConnection();

        $sql_query = 'SELECT Name,place,description,date,time from event';
        $result = $mysqli->query($sql_query);
        $results = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $results;
    }


}
?>