<?php

require('database.php');

Class User{

    protected $fName;
    protected $lName;
    protected $id;
    protected $bDate;
    protected $address;
    protected $age;
    protected $eMail;
    protected $password;
    protected $phone;
    private $login;

    public function __construct(Login $login){
        $this->login = $login;
    }

    public function login(){

    }

}

?>