<?php  
require('../models/admin_db.php');
class admincn{
    
    private $F_NAME;
    private $L_Name;
    private $DOB;
    private $gender;
    private $E_Mail;
    private $password;
    private $address;

    
    public function validation(){
        $errors = array('f_Name' => '', 'l_Name' => '', 'DOB' => '', 'gender' => '', 'email' => '', 'password' => '', 'address' => '');
        if(isset($_POST['submit']))
        {
                echo "test";
                //check Name
                if(empty($_POST['fname']))
                {
                    $errors['f_Name']='The Name is required';
                }
                else
                {
                    $this->F_NAME=$_POST['fname'];
                    if(!preg_match('/^[a-zA-Z\s]+$/',$this->F_NAME))
                    {
                        $errors['f_Name'] = 'Name must be a valid Name';
                    }
                }

                if(empty($_POST['lname']))
                {
                    $errors['l_Name']='The Name is required';
                }
                else
                {
                    $this->L_Name=$_POST['lname'];
                    if(!preg_match('/^[a-zA-Z\s]+$/',$this->L_Name))
                    {
                        $errors['l_Name'] = 'Name must be a valid Name';
                    }
                }

                
                if(empty($_POST['birthday']))
                {
                    $errors['DOB']='The date is required';
                }
                else
                {
                    $this->DOB=$_POST['birthday'];
                
                }


                if(empty($_POST['gender']))
                {
                    $errors['gender']='The Adress is required';
                }
                else
                {
                    $this->gender=$_POST['gender'];
                
                }
        

                if(empty($_POST['email']))
                {
                    $errors['email']='The Adress is required';
                }
                else
                {
                    $this->E_Mail=$_POST['email'];
                
                }

                if(empty($_POST['password']))
                {
                    $errors['password']='The Adress is required';
                }
                else
                {
                    $this->password=$_POST['password'];
                
                }

                if(empty($_POST['address']))
                {
                    $errors['address']='The Adress is required';
                }
                else
                {
                    $this->address=$_POST['address'];
                
                }

                $college = $_POST['college'];

        
        }
if(array_filter($errors))
{
    echo $errors['f_Name'];
    echo $errors['l_Name'];
    echo $errors['DOB'];
    echo $errors['gender'];
    echo $errors['email'];
    echo $errors['password'];
    echo $errors['address'];
} 
else 
{
    // escape sql chars
$adminadd = new admin();
$adminadd->addAdmin($this->F_NAME,$this->L_Name,$this->DOB,$this->gender,$this->E_Mail,$this->password,$this->address, $college);
}

    }
}
$admin1 = new admincn();
$admin1->validation();

?> 