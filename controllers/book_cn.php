<?php  
require('../models/book_db.php');
class BookCont{
	
	private $booktitle;
    private $startdate;
    private $Enddate;
    private $period;


public function validation(){ 
	$errors = array('bookname' => '', 'author' => '', 'publishdate' => '' );
if(isset($_POST['submit'])){
		
		// check bookname
		if(empty($_POST['bookname'])){
			$errors['bookname'] = 'A title is required';
			
			
		} else{
			$title = $_POST['bookname'];
			if(!preg_match('/^[a-zA-Z\s]+$/', $title)){
				$errors['bookname'] = 'the title must be a valid bookname title';
			}
		}

	
		if(empty($_POST['author'])){
			$errors['author'] = 'An author is required';
		} else{
			$author = $_POST['author'];
			if(!preg_match('/^[a-zA-Z\s]+$/', $author)){
				$errors['author'] = 'Author name  must be letters and spaces only';
			}
		}


		if(empty($_POST['publishdate'])){
			$errors['publishdate'] = 'A date is required';
		} else{
			$publishDate = $_POST['publishdate'];
		}
		if(empty($_POST['category'])){
			$errors['category'] = 'A category is required';
		} else{
			$category = $_POST['category'];
		}

		if(empty($_POST['quantity'])){
			$errors['qunatity'] = 'Quantity is required';
		} else{
			$quantity = $_POST['quantity'];
		
		}

	
		
    }
	if(array_filter($errors)){
	
	} else {
		
	echo $title.$author.$publishDate.$category.$quantity;
	$bookadd = new Book();
	$bookadd->addbook($title,$author,$publishDate,$category,$quantity);
	}
}
}
$book1 = new BookCont();
$book1->validation();

        ?> 