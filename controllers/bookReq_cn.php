<?php  
require('../models/bookReq_db.php');
class BookRequestValidation{
	
    private $btitle;
    private $requestInfo;
    private $duration;



	public function validation(){ 
	$errors = array('bTitle' => '', 'requestInfo' => '', 'duration' => '');
	if(isset($_POST['submit'])){
		
		// check bookname
		if(empty($_POST['bTitle'])){
			$errors['bTitle'] = 'A title is required';
		} else{
			$this->btitle = $_POST['bTitle'];
			if(!preg_match('/^[a-zA-Z\s]+$/', $this->btitle)){
				$errors['bTitle'] = 'title must be a valid title';
			}
		}

		if(empty($_POST['requestinfo'])){
			$errors['requestinfo'] = 'Information required';
		} else{
			$this->requestInfo = $_POST['requestinfo'];
			if(!preg_match('/^[a-zA-Z\s]+$/', $this->requestInfo)){
				$errors['requestInfo'] = 'Title must be letters and spaces only';
			}
		}


		if(empty($_POST['duration'])){
			$errors['duration'] = 'A duration is required';
		} else{
			$this->duration = $_POST['duration'];
			if(!preg_match('/^[1-9]+$/', $this->duration)){
				$errors['duration'] = 'Enter duration between 1 to 9 days';
			}
		}



	
		
    }
	if(array_filter($errors)){
		//echo 'errors in form';
		echo $errors['bTitle'].'request : '.$errors['requestInfo'].'dura: '.$errors['duration'];
	} else {
		
		// escape sql chars
	$BookReq = new BookRequest();
	// echo $this->btitle.$this->requestInfo.$this->duration;
	$BookReq->addbook($this->btitle,$this->requestInfo,$this->duration);
	}
}
}
$bookR = new BookRequestValidation();
$bookR->validation();

?> 