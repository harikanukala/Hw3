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
        $sql="SELECT user_name FROM user WHERE user_name = '".$name."'";
        
        $result=mysqli_query($conn,$sql);
        // TO check if table exists or not
        if (!$result) {
        printf("Error: %s\n", mysqli_error($conn));
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
            $digits = 5;
            $id=rand(pow(1, $digits-1), pow(10, $digits)-1);
            $new_user="Insert into user(user_id,user_name,password) values ($id,'$name','$password')";
            if(mysqli_query($conn,$new_user))
            {
                $result=1;
            }
            else{
                $result=2;
            }
        }
     
      return $result;
        mysqli_close($conn);  
      }

}
 
?>