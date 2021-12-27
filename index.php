<a href="views/admin/home.php">admin</a>
<a href="views/superadmin/home.php">superadmin</a>
<a href="views/teacher/home.php">teacher</a>
<a href="views/student/home.php">student</a>
<a href="views/librarian/home.php">librarian</a>

<?php

require('models/database.php');

$db = Database::getInstance();
$mysqli = $db->getConnection(); 

$query = 'SELECT * FROM `book`';

$result = $mysqli->query($query);

$books = mysqli_fetch_all($result, MYSQLI_ASSOC);

print_r($books);

?>