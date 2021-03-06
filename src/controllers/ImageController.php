<?php
namespace cs_rockers\hw3\controllers;
use cs_rockers\hw3\models as B;
require_once 'Controller.php';

class ImageController extends Controller
{
	private $model=NULL;
	function processRequest()
	{
		$model_name=$this->model("image");
		$this->model=new $model_name();

		if((!isset($_GET['mode'])) || ( isset($_GET['mode']) && $_GET['mode']=='logout' ))
		{
			$default=$this->model->getDefaultData();
			$this->view("image")->render($default);
			$cookie_name="user";
			if(isset($_COOKIE[$cookie_name])){
				unset($_COOKIE[$cookie_name]);
			}
		}
		if(isset($_GET['mode']) && $_GET['mode']=='upload')
		{
			$this->view($_GET['mode'])->render(null);
		}
		if(isset($_GET['mode']) && $_GET['mode']=='checkFile')
		{
			$target_dir = "/Applications/XAMPP/xamppfiles/htdocs".dirname($_SERVER['PHP_SELF'])."/src/resources/";
			$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
			$uploadOk = 1;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			if (file_exists($target_file)) {
			    echo "Sorry, file already exists.";
			    $uploadOk = 0;
			}
			if ($_FILES["fileToUpload"]["size"] > 500000) {
			    echo "Sorry, your file is too large.";
			    $uploadOk = 0;
			}
			if($imageFileType != "jpg" && $imageFileType != "jpeg") {
			    echo "Sorry, only JPG & JPEG files are allowed.";
			    $uploadOk = 0;
			}
			if ($uploadOk == 0) {
			    echo "Sorry, your file was not uploaded.";
			} else {
			    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			    	$this->image_fix_orientation($target_file);
			        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
			    $this->model->saveImage($_POST["caption"],$_FILES["fileToUpload"]["name"],$_COOKIE['user'],time());
			    } else {
			        echo "Sorry, there was an error uploading your file.";
			    }
			}
			$this->view("safe")->render(null);
		}
		if(isset($_GET['mode']) && $_GET['mode']=='rate')
		{
			$this->model->saveRating($_GET['imageid'],$_GET['rated']);
			unset($_GET['mode']);
			header("Location:".$_SERVER['PHP_SELF']);
		}
        
	}
function image_fix_orientation($path)
	{
	$image = imagecreatefromjpeg($path);
	$exif = exif_read_data($path);
    $ort = $exif['Orientation'];
   $fname=$exif['FileName'];
   
    switch($ort)
    {
        case 8:
            $image = imagerotate($image,90,0);
            break;
        case 3:
            $image = imagerotate($image,180,0);
            break;
        case 6:
            $image = imagerotate($image,-90,0);
            break;
        default:
            $image = imagerotate($image,0,0);           
            break;
    } 
    list($width,$height)=getimagesize($path);
    $new_width=500;
    $new_height=($height/$width)*$new_width;
    $temp=imagecreatetruecolor($new_width,$new_height);
    imagecopyresampled($temp, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
    imagejpeg($temp,$path,100);
	}
}