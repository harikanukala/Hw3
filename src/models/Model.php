<?php
namespace cool_name_for_your_group\hw3\models;

class Model
{
	public $link=NULL;
    function openDb() 
    {
        $this->link = mysqli_connect('localhost','root','yes');
		if (!$this->link) {
		    die('Could not connect: ' . mysqli_connect_error());
		}
        mysqli_select_db($this->link,"HW3");
    }
}