<?php
namespace cs_rockers\hw3\views;
require_once "View.php";
class SignupView extends View
{
  
    public function render($data)
    {
      
     if($data>-1)
     {
       
       if($data == 0)
    {
       echo "<br/>This user already exists. Please Enter Different User Name";
        exit();
    }
    elseif($data == 1)
   
    {
        echo "<br/>User registered successfully";
        exit();
    }
    else
    {
         echo "<br/>Error adding user in database"; 
         exit();
    }
   
     }
     
     ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"/>
<link rel="stylesheet" type="text/css" href="./styles/styles.css"/>
<title> Image Rating </title>
</head>
<body>
<?php
   $name_err=$pwd_err=$confirm_err=$confirm_password="";
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
   ?>
<h3> Please Fill The Form</h3> <br><br>
<form name="fname" action="index.php" method="POST">
<div class="form_align">
<label for="name">Enter name</label>
<input type="text" id="name" name="name" placeholder="Enter Name"><span class="required">*

  <?php 
   echo $name_err;     

 ?>
</span><br><br>
<label for="password">Enter password</label>
<input type="password" id="password" name="password" placeholder="Enter Password"><span class="required">*

    <?php  
      echo $pwd_err;
  
   ?>

</span><br><br>

<label for="confirm">Confirm password</label>
<input type="password" id="confirm" name="confirm" placeholder="Confirm Password"><span class="required">*

<?php 
       if ($confirm_err)
        {
          echo $confirm_err;
        }
        if( $confirm_password)
        {
            echo  $confirm_password;
        }

?>
</span><br><br>
<input type="submit" name="submit">
<?php
 
        if ($_SERVER["REQUEST_METHOD"] == "POST" && !$name_err && !$pwd_err && !$confirm_err && !$confirm_password )
        {
        
         return [$_SERVER["REQUEST_METHOD"] == "POST",$_POST["name"],$_POST["password"]];
        
        }
     ?>

</div>
</form>
</body>
</html>
   <?php
   }
 }
