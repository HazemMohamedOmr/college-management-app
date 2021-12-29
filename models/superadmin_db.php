<?php
require_once('college_db.php');
require_once('database.php');
Class SuperAdmin{
    private $id;
    private $College_Name;
    private $F_NAME;
    private $L_NAME;
    private $DOB;
    private $E_Mail;
    private $address;

    public function viewCollege(){
        $college = new college();
        $colleges = $college->listCollege();
        return $colleges;
    }
 


    public function viewAdmin(){
        $db = Database::getInstance();
        $mysqli = $db->getConnection();

        $sql_query = 'SELECT `admin`.`ID`, `College-Name`, `F_NAME`, `L_Name`, `DOB`, `E_Mail`, `address`
        FROM `admin`
        INNER JOIN `user`
        ON `admin`.`ID`=`user`.`ID`';

        $result = $mysqli->query($sql_query);
        $Admins = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $Admins; 
    }
}
?>