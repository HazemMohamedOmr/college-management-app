<?php
 require('database.php');
 require('book_db.php');
 require('Event_db.php');

 

class librarian{
private $LDegree ;
       

    public function viewEvent(){
        $Event = new Event();
        $Events = $Event->listEvent();
        return $Events;
    }

    public function viewBook(){
        $Book = new Book();
        $books = $Book->listbook();
        return $books;
    }




    public function viewBookRequest(){

        $db = Database::getInstance();
        $mysqli = $db->getConnection();

        $sql_query = 'SELECT `S-id`, `B-titel`, `Request-info`, `duration`, `Status` FROM `request` WHERE `status`=2';
        $request = $mysqli->query($sql_query);
        $requests = mysqli_fetch_all($request, MYSQLI_ASSOC);
        return $requests;
    }

    public function viewAcceptedRequests(){

        $db = Database::getInstance();
        $mysqli = $db->getConnection();
    
        $sql_query = 'SELECT `S-id`, `B-titel`, `Request-info`, `duration`, `Status` FROM `request` WHERE `status`=1';
        $request= $mysqli->query($sql_query);
        $requests = mysqli_fetch_all($request, MYSQLI_ASSOC);
        return $requests;
    
    
    
    }

    public function rejectBookRequest(){

        $db = Database::getInstance();
        $mysqli = $db->getConnection();

        if(isset($_POST['submit'])){
		$delete = mysqli_real_escape_string($mysqli, $_POST['id']);
        $title= mysqli_real_escape_string($mysqli, $_POST['title']);

		$sql = "UPDATE `request`SET `status`=0  WHERE `S-id` = $delete AND `B-titel` = '$title'";
		if(mysqli_query($mysqli, $sql)){
            header('location:../views/librarian/BookRequests.php');
	
		} else {
			echo 'query error: '. mysqli_error($mysqli);
            
		}
    }
    }
    
        public function acceptBookRequest(){

            $db = Database::getInstance();
            $mysqli = $db->getConnection();
    
            if(isset($_POST['accept'])){
            $delete = mysqli_real_escape_string($mysqli, $_POST['id']);
            $title= mysqli_real_escape_string($mysqli, $_POST['title']);
    
            $sql = "UPDATE `request`SET `status`=1  WHERE `S-id` = $delete AND `B-titel` = '$title'";
            if(mysqli_query($mysqli, $sql)){
                header('location:../views/librarian/BookRequests.php');
                
            } else {
                echo 'query error: '. mysqli_error($mysqli);
                
            }
        
    }

    }
 

 


}

$book11 = new librarian();
$book11->rejectBookRequest();
$book11->acceptBookRequest();


    ?>