<?php
require_once('database.php');
class Fee{

    private $year;
    private $amount;

    public function listFees(){
        $db = Database::getInstance();
        $mysqli = $db->getConnection();

        $sql_query = 'SELECT `Year`, `Amount` FROM `fee`';
        $result = $mysqli->query($sql_query);
        $results = mysqli_fetch_all($result, MYSQLI_ASSOC);


        return $results;

    }



}

?>