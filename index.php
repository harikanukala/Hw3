<?php

namespace cs_rockers\hw3;

require_once "src/controllers/ImageController.php";
require_once "src/controllers/SignupController.php";
// defines for various namespaces
define("NS_BASE", "cs_rockers\\hw3\\");
define(NS_BASE . "NS_CONTROLLERS", "cs_rockers\\hw3\\controllers\\");
define(NS_BASE . "NS_VIEWS", "cs_rockers\\hw3\\views\\");
define(NS_BASE . "NS_MODELS", "cs_rockers\\hw3\\models\\");
if( isset($_GET['mode']) && $_GET['mode']=='logout' ){
	$cookie_name='user';
			if(isset($_COOKIE[$cookie_name])){
				unset($_COOKIE[$cookie_name]);
				setcookie($cookie_name, '', time() - 3600, '/');
			}
}
$notifications="notifications";
if ( isset($_GET["er"]))
{
  echo " <span style ='color:red; font-size:18'>User already exists. Please Sign-Up Again. </span>";
}
if ( isset($_GET["success"]))
{
  echo " <span style ='color:red; font-size:18'>Successful Registration. Please Sign-In. </span>";
}
if ( isset($_GET["login"]))
{
  echo " <span style ='color:red; font-size:18'>Login Failed. Please Sign-In Again. </span>";
}
 $controller_name = NS_CONTROLLERS . "ImageController";
$controller = new $controller_name();
$controller->processRequest();
if(isset($_GET['mode']) && $_GET['mode']=='signup'){
	$controller_name = NS_CONTROLLERS . "SignupController";
	$controller = new $controller_name();
	$controller->processRequest();
}


