<?php
namespace cs_rockers\hw3\views\elements;

class HeaderElement extends Element{

	public function render($data){
		$cookie_name="user";
		?>
		<!DOCTYPE html>
		<html>
		<head>
		<meta charset="UTF-8"/>
		<link rel="stylesheet" type="text/css" href="./src/styles/styles.css"/>
		<title> Image Rating </title>
		</head>
		<body>
		<div class="header">
		 <h1> <img class="setting" src="./src/resources/cool_logo.ico" alt="logo" /> Image Rating</h1>
		</div>
	<div class="signin">
		<?php if(!isset($_COOKIE[$cookie_name])){
		 Echo "<a href=".$_SERVER['PHP_SELF']."?mode=signup>Sign-Up / Sign-In</a> ";
		}
		if(isset($_COOKIE[$cookie_name])){
		 Echo "<a href=".$_SERVER['PHP_SELF']."?mode=logout>logout</a> ";
		}?>
	        </div>
		</body>
	</html>
		<?php
	}
}