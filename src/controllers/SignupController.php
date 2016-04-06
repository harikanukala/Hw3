<?php
namespace cs_rockers\hw3\controllers;
require_once "Controller.php";
class SignupController extends Controller
{
       
    public function processRequest()
    {     
            $user_notifications=null;
            $form_variables_array= $this->view("signup")->render($user_notifications);
            $submit_status= $form_variables_array[0];
            $submit=$form_variables_array[1];
            $name= $form_variables_array[2];
            $password= $form_variables_array[3];
            
            
           if(isset($submit_status))
            {
                
                $mod=$this->model("signup");
                $class_name=new $mod;
                if($submit=="register")
                {
                $user_notifications=$class_name->InsertCredentials($name,$password);
                echo $user_notifications;
                $form_variables_array= $this->view("signup")->render($user_notifications);
                
                return "Signup Validator WORKED";
                }
                
                if ($submit=="login")
                {
                    $user_notifications=$class_name->ValidateCredentials($name,$password);
                    if ($user_notifications==4)
                    {
                        $form_variables_array= $this->view("signup")->render($user_notifications);
                        
                    }
                    else
                    {
                       // $host  = $_SERVER['HTTP_HOST'];
                        //$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
                        //$extra = 'index.php';
                        header("Location:". $_SERVER['PHP_SELF']);
                       //header("Location: http://localhost/cs_rockers/hw3/index.php");
                    }
                    
                }
                
            
            }
            
        
    }
}
?>