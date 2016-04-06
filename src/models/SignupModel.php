<?php
namespace cs_rockers\hw3\models;
use cs_rockers\hw3\models;
require_once ("Model.php");

class SignupModel extends Model
{

      public function InsertCredentials($name,$password)
      {
        
        $result="";
        $name=trim($name);
        $this->openDb();
        $sql="SELECT user_name FROM users WHERE user_name = '".$name."'";
        
        $result=mysqli_query($this->link,$sql);
        // TO check if table exists or not
        if (!$result) {
        printf("Error: %s\n", mysqli_error($this->link));
        exit();
        }
        $name_array=mysqli_fetch_array($result);
       //  To check if a user already exists    
         if(mysqli_num_rows($result)>0)
        {
            $result=0;            
        }
        else
        {
            $new_user="Insert into users(user_name,password) values ('$name','$password')";
            if(mysqli_query($this->link,$new_user))
            {
                $result=1;
            }
           
        }
     
      return $result;
      }
      
      public function ValidateCredentials($name,$password)
      {
         $result="";
        $name=trim($name);
        $this->openDb();
        $sql="SELECT user_name,password FROM users WHERE user_name = '".$name."' and password='".$password."'"  ;
        
        $result=mysqli_query($this->link,$sql);
        // TO check if table exists or not
        if (!$result) {
        printf("Error: %s\n", mysqli_error($this->link));
        exit();
        }
        $name_array=mysqli_fetch_array($result);
       if(mysqli_num_rows($result)>0)
        {
            $result=3;    
        }
        else{
            $result=4;
        }
        
        return $result;
          
      }

}
 
?>