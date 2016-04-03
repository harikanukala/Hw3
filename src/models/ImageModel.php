<?php

namespace cs_rockers\hw3\models;
require_once 'Model.php';

class ImageModel extends Model
{
	function getDefaultData()
	{
		$this->openDb();
		$dbRecent = mysqli_query($this->link,"SELECT * FROM images ORDER BY image_id DESC LIMIT 3");
        $dbTop=mysqli_query($this->link,"SELECT * FROM images ORDER BY avg_rating DESC, image_id DESC LIMIT 10");
        $recents = array();
        $top=array();
        while ( ($obj = mysqli_fetch_object($dbRecent)) != NULL ) {
            $recents[] = $obj;
        }
        while ( ($obj = mysqli_fetch_object($dbTop)) != NULL ) {
            $top[] = $obj;
        }
        return array($recents,$top);
	}
}