<?php
namespace cs_rockers\hw3\views\elements;

class HeaderElement extends Element{

	public function render($data){
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
		<?php Echo "<a href=".$_SERVER['PHP_SELF']."?mode=signup>Sign-Up / Sign-In</a> ";?>
		<!-- <a href="./views/SignupView.php?id=signup">Sign-up</a> -->
		</body>
	</html>
		<?php
	}
}