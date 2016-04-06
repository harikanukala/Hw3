<?php
namespace cs_rockers\hw3\views;

require_once "View.php";

class SignupView extends View
{
  
    public function render($data)
    {
      
    
     ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"/>
<link rel="stylesheet" type="text/css" href="./src/styles/styles.css"/>
<title> Image Rating </title>
</head>
<body>
<?php
   $name_err=$pwd_err=$confirm_err=$confirm_password="";
   $login_name_err=$login_pwd_err="";
   $check_submit=0;
     if($data>-1)
     {
       
       if($data == 0)
    {
       
       echo "<br/>This user already exists. Please Enter Different User Name";
       header("Location:". $_SERVER['PHP_SELF']."?er=Error");
      
    }
    elseif($data == 1)
   
    {
       echo "<br/>User registered successfully";
        header("Location:". $_SERVER['PHP_SELF']."?success=success");
    }
    elseif($data == 4)
   
    {
        echo "<br/>User ".$_POST["user_name"]." does not exist";
        exit();
        
    }
    else
    {
         echo "<br/>Error adding user in database"; 
         exit();
    }
   
     }
     
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
       if (isset($_POST["register"]))
       {
       $check_submit=1;
    if(empty($_POST["name"]))
        {
           $name_err ="Name is required";
         //  echo $name_err;
        }
        if(empty($_POST["password"]))
        {
            $pwd_err=" Password is required";
        }
         if(empty($_POST["confirm"]))
        {
            $confirm_err= "Please Confirm your password.<br/>";
        }
        elseif($_POST["confirm"]!=$_POST["password"])
        {
            $confirm_password= "Please enter the same password.<br/>";
        }
        else{
            
        }
   }
       if (isset($_POST["login"]))
       {
        
        if(empty($_POST["user_name"]))
        {
           $login_name_err ="Name is required";
         //  echo $name_err;
        }
       
        if(empty($_POST["user_password"]))
        {
            $login_pwd_err=" Password is required";
        }
       
       }
       else
       {
           
       }
       
   }
   ?>

<h3> Please Sign up</h3> <br/>
<form name="fname" action="#" method="POST">
<div class="form_align">
<label for="name">Enter name</label>
<input type="text" id="name" name="name" placeholder="Enter Name"><span class="required">*

  <?php 
  if (isset($_POST["register"]))
       {
   echo $name_err; 
       }   

 ?>
</span><br><br>
<label for="password">Enter password</label>
<input type="password" id="password" name="password" placeholder="Enter Password"><span class="required">*

    <?php  
    if (isset($_POST["register"]))
       {
      echo $pwd_err;
       }
   ?>

</span><br><br>

<label for="confirm">Confirm password</label>
<input type="password" id="confirm" name="confirm" placeholder="Confirm Password"><span class="required">*

<?php 
    if (isset($_POST["register"]))
       {
       if ($confirm_err)
        {
          echo $confirm_err;
        }
        if( $confirm_password)
        {
            echo  $confirm_password;
        }
       }
?>
</span><br><br>
<input type="submit" name="register" value="register">
<?php
 
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["register"]) && !$name_err && !$pwd_err && !$confirm_err && !$confirm_password ) 
        {
                return [$_SERVER["REQUEST_METHOD"] == "POST",$_POST["register"],$_POST["name"],$_POST["password"]];        
            
        }
 ?>

</div>
<br/>



<h3> Please Sign in</h3> <br/>


<div class="form_align">
<label for="user_name">Enter name</label>
<input type="text" id="user_name" name="user_name" placeholder="Enter Name"><span class="required">*

  <?php 
  if(isset($_POST["login"]))
  {
   echo $login_name_err;     
  }

 ?>
</span><br><br>
<label for="user_password">Enter password</label>
<input type="password" id="password" name="user_password" placeholder="Enter Password"><span class="required">*

    <?php  
    if(isset($_POST["login"]))
    {
      echo $login_pwd_err;
    }
   ?>
   </span><br/><br/>
<input type="submit" name="login" value="login">
<?php
 
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"]) && !$name_err && !$pwd_err)
        {
         
         return [$_SERVER["REQUEST_METHOD"] == "POST", $_POST["login"],$_POST["user_name"],$_POST["user_password"]];        
        }
     
     ?>

</div>     
</form>

</body>
</html>
   <?php
   }
 }
