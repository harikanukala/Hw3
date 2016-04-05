<?php
namespace cs_rockers\hw3\controllers;
require_once "Controller.php";
class SignupController extends Controller
{
       
    public function processRequest()
    {     
            $user_notifications=null;
            $form_variables_array= $this->view("signup")->render($user_notifications);
            $submit= $form_variables_array[0];
            $name= $form_variables_array[1];
            $password= $form_variables_array[2];
            
            
           if(isset($submit))
            {
                $mod=$this->model("signup");
                $class_name=new $mod;
                $user_notifications=$class_name->InsertCredentials($name,$password);
                echo $user_notifications;
                $form_variables_array= $this->view("signup")->render($user_notifications);
                
                return "Signup Validator WORKED";
            
            }
        
    }
}
?>