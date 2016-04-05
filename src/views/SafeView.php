<?php
namespace cs_rockers\hw3\views;
require_once 'View.php';

class SafeView extends View
{
	function render($data)
   {
   	?>
   		 <!DOCTYPE html>
        <html lang="en-US" dir="ltr">
        <head> 
          <title>Image Rating</title> 
          <meta charset="utf-8" />
        </head>
        <body>        
        <?php Echo "<a href=".$_SERVER['PHP_SELF']."?mode=upload>Upload Image</a> "; 
       	Echo "<a href=".$_SERVER['PHP_SELF'].">Main page</a> ";
   }
}