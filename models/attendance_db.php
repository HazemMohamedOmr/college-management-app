<?php
require_once('database.php');
class Attendance{

    
    private $Excuse;
    private $status;
    private $day;

    public function listAttendance(){
        $db = Database::getInstance();
        $mysqli = $db->getConnection();

        $sql_query = 'SELECT `Excuse`, `status` ,`day` FROM `absence`';
        $result = $mysqli->query($sql_query);
        $results = mysqli_fetch_all($result, MYSQLI_ASSOC);
        
        return $results;

    }

}

?>