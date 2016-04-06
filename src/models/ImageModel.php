<?php

namespace cs_rockers\hw3\models;
require_once 'Model.php';

class ImageModel extends Model
{
	function getDefaultData()
	{
		$this->openDb();
        if(!isset($_COOKIE["user"]))
        {
    		$dbRecent = mysqli_query($this->link,"SELECT user_name,image_id,image_name,image_caption,uploaded_date FROM users,images WHERE user_id=uploaded_by ORDER BY image_id DESC LIMIT 3");
            $dbTop=mysqli_query($this->link,"SELECT user_name,image_id,image_name,image_caption,uploaded_date FROM users,images WHERE user_id=uploaded_by ORDER BY avg_rating DESC, image_id DESC LIMIT 10");
            $recents = array();
            $top=array();
            while ( ($obj = mysqli_fetch_object($dbRecent)) != NULL ) {
                $recents[] = $obj;
            }
            while ( ($obj = mysqli_fetch_object($dbTop)) != NULL ) {
                $top[] = $obj;
            }
            return array($recents,$top,null);
        }
        elseif (isset($_COOKIE["user"])) 
        {
            $userid=$_COOKIE["user"];
            $dbRecent = mysqli_query($this->link,"SELECT user_name,image_id,image_name,image_caption,uploaded_date FROM users,images WHERE user_id=uploaded_by ORDER BY image_id DESC LIMIT 3");
            $dbTop=mysqli_query($this->link,"SELECT user_name,image_id,image_name,image_caption,uploaded_date FROM users,images WHERE user_id=uploaded_by ORDER BY avg_rating DESC, image_id DESC LIMIT 10");
            $nonRatedImageids=mysqli_query($this->link,"SELECT a.image_id FROM (SELECT 
                u.user_id,i.image_id FROM users u,images i) a LEFT JOIN (SELECT user_id,
                image_id FROM ratings) b ON a.image_id=b.image_id AND a.user_id=b.user_id
                 WHERE b.image_id IS NULL AND b.user_id IS NULL AND a.user_id=$userid");
            $recents = array();
            $top=array();
            while ( ($obj = mysqli_fetch_object($dbRecent)) != NULL ) {
                $recents[] = $obj;
            }
            while ( ($obj = mysqli_fetch_object($dbTop)) != NULL ) {
                $top[] = $obj;
            }
            return array($recents,$top,$nonRatedImageids);
        }
	}

    function saveImage($caption,$image_name,$user_name,$date)
    {
        $this->openDb();
        $defaultRate=0;
       if(mysqli_query($this->link,"INSERT INTO images (image_name,image_caption,avg_rating,
        uploaded_by,uploaded_date) VALUES('$image_name','$caption',$defaultRate,1,'$date') ")){
       }
       else{
        echo mysqli_error();
       }
    }

    function saveRating($imageid,$rate,$date)
    {
        $this->openDb();
        $userid=$_COOKIE["user"];
        if(mysqli_query($this->link,"INSERT INTO ratings (image_id,user_id,rate,rated_date) 
            VALUES($imageid,1,$rate,'$date')")){

        }
        else{
            echo mysqli_error();
        }
    }
}