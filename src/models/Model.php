<?php
namespace cs_rockers\hw3\models;

class Model
{
	public $link=NULL;
    function openDb() 
    {
        $servername = ini_get("mysql.default_host");
        $username = ini_get("mysql.default_user");
        $password =  ini_get("mysql.default_password");
        echo $password;
        $this->link = mysqli_connect($servername,'root','yes');
		if (!$this->link) {
		    die('Could not connect: ' . mysqli_connect_error());
		}
        mysqli_select_db($this->link,"HW3");
    }
}