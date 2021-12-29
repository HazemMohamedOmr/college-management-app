<?php  
require('../models/BookTicket_db.php');

class BookCont{
    private $booktitle;
    private $startdate;
    private $Enddate;
    private $period;



public function validation(){ 
	$errors = array('bTitle' => '', 'Start-Date' => '', 'End-Date' => '' );
             if(isset($_POST['submit'])){
		
		// check bTitle
		if(empty($_POST['bTitle'])){
			$errors['bTitle'] = 'A title is required';
			
			
		} else{
			$booktitle = $_POST['bTitle'];
			echo $booktitle;
		
		}

	
		if(empty($_POST['Start-Date'])){
			$errors['Start-Date'] = 'An Start-Date is required';
		} else{
			$startdate = $_POST['Start-Date'];
	
			}
		


		if(empty($_POST['End-Date'])){
			$errors['End-Date'] = 'A date is required';
		} else{
			$Enddate = $_POST['End-Date'];
		}




	
    
	if(array_filter($errors)){
	 echo 'error in form';
	} else {
		
	echo $booktitle.$startdate.$Enddate;
	$ticketadd = new BookTicket ();
	$ticketadd->issueBook($booktitle,$startdate,$Enddate);
	}
}
}
}
        
$book1 = new BookCont();
$book1->validation();

        ?> 