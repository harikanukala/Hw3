<?php

namespace cs_rockers\hw3\models;
require_once 'Model.php';

class ImageModel extends Model
{
	function getDefaultData()
	{
		$this->openDb();
        $dbRecent = mysqli_query($this->link,"SELECT user_name,image_id,image_name,image_caption,uploaded_date FROM user,images WHERE user_id=uploaded_by ORDER BY image_id DESC LIMIT 3");
        $dbTop=mysqli_query($this->link,"SELECT user_name,image_id,image_name,image_caption,uploaded_date FROM user,images i WHERE user_id=uploaded_by ORDER BY rates/(select count(*) from ratings where image_id=i.image_id) DESC, image_id DESC LIMIT 10");
        $recents = array();
        $top=array();
        while ( ($obj = mysqli_fetch_object($dbRecent)) != NULL ) {
            $recents[] = $obj;
        }
        while ( ($obj = mysqli_fetch_object($dbTop)) != NULL ) {
                $top[] = $obj;
        }
        if(!isset($_COOKIE["user"]))
        {              		
            return array($recents,$top,array());
        }
        elseif (isset($_COOKIE["user"])) 
        {
            $userid=$_COOKIE["user"];
            $unRateImages=array();
            $nonRatedImageids=mysqli_query($this->link,"SELECT a.image_id FROM (SELECT 
                u.user_id,i.image_id FROM user u,images i) a LEFT JOIN (SELECT user_id,
                image_id FROM ratings) b ON a.image_id=b.image_id AND a.user_id=b.user_id
                 WHERE b.image_id IS NULL AND b.user_id IS NULL AND a.user_id=$userid");
            while ( ($obj = mysqli_fetch_object($nonRatedImageids)) != NULL ) {
                $unRateImages[] = $obj;
            }
            $array=array();
                foreach ($unRateImages as $value) 
                    $array[] = $value->image_id;
            return array($recents,$top,$array);
        }
	}

    function saveImage($caption,$image_name,$user_name,$date)
    {
        $this->openDb();
        $defaultRate=0;
        $userid=$_COOKIE["user"];
       if(mysqli_query($this->link,"INSERT INTO images (image_name,image_caption,rates,
        uploaded_by,uploaded_date) VALUES('$image_name','$caption',$defaultRate,$userid,'$date') ")){
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
            VALUES($imageid,$userid,$rate,'$date')")){
            if(mysqli_query($this->link,"UPDATE images SET rates=rates+$rate WHERE image_id=$imageid"));
                else
                    mysqli_error();
        }
        else{
            echo mysqli_error();
        }
    }

    function getCount($data){
        $this->openDb();
         $count=mysqli_query($this->link,"SELECT COUNT(*) AS count FROM ratings WHERE image_id=$data");
            $var=array();
            while ( ($obj = mysqli_fetch_object($count)) != NULL ) {
                $var[] = $obj;
            }
            foreach ($var as $value) 
                $array[] = $value->count;
            return $array[0];
    }
}