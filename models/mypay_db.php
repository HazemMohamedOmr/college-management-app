<?php
require_once('database.php');
class mypay{

    
    private $Feeyear;
    private $status;

    public function listMyPays(){
        $db = Database::getInstance();
        $mysqli = $db->getConnection();

        $sql_query = 'SELECT `Fee-Year`, `status` FROM `payments`';
        $result = $mysqli->query($sql_query);
        $results = mysqli_fetch_all($result, MYSQLI_ASSOC);



        return $results;

    }

}

?>