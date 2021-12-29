<?php

require('../models/login.php');

class LoginCont{
    private $email;
    private $password;

    public function loginValidation(){
        $errors = array('email' => '', 'password' => '');
        if(isset($_POST['submit'])){
		
            // check email
            if(empty($_POST['email'])){
                $errors['email'] = 'Email is required';
            } else{
                $this->email = $_POST['email'];
                if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
                    $errors['email'] = "Invalid email format";
                }
            }

            // check password
            if(empty($_POST['password'])){
                $errors['password'] = 'password is required';
            } else{
                $this->password = $_POST['password'];
                if(!preg_match('/^[a-zA-Z1-9]+$/', $this->password)){
                    $errors['password'] = 'Title must be letters and spaces only';
                }
            }
	
        }

        if(array_filter($errors)){
            //echo 'errors in form';
        } else {
            
            $log = new Login();
            $log->login($this->email, $this->password);
        }
    }
}

    $log = new LoginCont();
    $log->loginValidation();
        

?>