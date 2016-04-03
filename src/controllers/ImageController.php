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
		$default=$this->model->getDefaultData();
		$this->view("image")->render($default);
	}
}