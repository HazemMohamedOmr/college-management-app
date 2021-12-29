<?php  
require('../models/college_db.php');
class collegecn{
    private $SA_id;
    private $Name;
    private $DOS;
    private $Adress;
    
    
public function validation(){
    $errors = array('Name' => '', 'Adress' => '', 'DOS' => '');

if(isset($_POST['submit']))
{

        //check Name
        if(empty($_POST['collegename']))
        {
            $errors['Name']='The Name is required';
        }
        else
        {
            $this->Name=$_POST['collegename'];
            if(!preg_match('/^[a-zA-Z\s]+$/',$this->Name))
            {
                $errors['Name'] = 'Name must be a valid Name';
            }
        }
        //check address
        if(empty($_POST['address']))
        {
            $errors['Address']='The Adress is required';
        }
        else
        {
            $this->Adress=$_POST['address'];
        
        }
        if(empty($_POST['dos']))
        {
            $errors['DOS']='The Adress is required';
        }
        else
        {
            $this->DOS=$_POST['dos'];
        
        }


}
if(array_filter($errors))
{
    //echo 'errors in form';
} 
else 
{
    // escape sql chars
    //echo($this->Name.$this->DOS.$this->Adress);
$collegadd = new college();
$collegadd ->addCollege($this->Name,$this->DOS,$this->Adress);
}
}
}
$college1 = new collegecn();
$college1->validation();
?> 