<?php require('database.php');
class returnBook{

public function returnBook(){

$db = Database::getInstance();
$mysqli = $db->getConnection();

if(isset($_POST['submit'])){

$delete = mysqli_real_escape_string($mysqli, $_POST['lid']);
$title= mysqli_real_escape_string($mysqli, $_POST['id']);


$sql = "DELETE FROM `books-issued` where `L-id` = $delete AND `B-title` = '$title' ";

if(mysqli_query($mysqli, $sql)){
    header('location:../views/librarian/IssuedBooks.php');
    
} else {
    echo 'query error: '. mysqli_error($mysqli);
    
}

} 
}
}
$return = new returnBook();
$return->returnBook();

?>