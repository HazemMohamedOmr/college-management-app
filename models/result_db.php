<?php
require_once('database.php');


Class result{

    private $decription;

    public function listresult(){
        $db = Database::getInstance();
        $mysqli = $db->getConnection();

        $sql_query = 'SELECT description FROM result';
        $result = $mysqli->query($sql_query);
        $results = mysqli_fetch_all($result, MYSQLI_ASSOC);

        return $results;
    }

   
}

?>