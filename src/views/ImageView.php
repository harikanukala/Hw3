<?php
namespace cs_rockers\hw3\views;

require_once 'View.php';
require_once "elements/Element.php";
require_once "elements/HeaderElement.php";
$header=new elements\HeaderElement();
    $header->render(null);
class ImageView extends View
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
        <h2>Recent</h2>
        <?php if(isset($_COOKIE["user"])){
         Echo "<a href=".$_SERVER['PHP_SELF']."?mode=upload>Upload</a> ";
     }?> 
        	<table class="recent" border="0" cellpadding="0" cellspacing="0">
            <tbody>
            <?php foreach ($data[0] as $recent): ?>
                <tr>
                    <td><img src="./src/resources/<?php print htmlentities($recent->image_name);?>"/></td>
                    <td><h3>Caption</h3><?php print htmlentities($recent->image_caption); ?></td>
                    <td><?php
                     if(isset($_COOKIE["user"]) && in_array($recent->image_id,$data[2])){
                      Echo "<a href=".$_SERVER['PHP_SELF']."?mode=rate&rated=1&imageid=".$recent->image_id.">1</a>  
                     <a href=".$_SERVER['PHP_SELF']."?mode=rate&rated=2&imageid=".$recent->image_id.">2</a> 
                     <a href=".$_SERVER['PHP_SELF']."?mode=rate&rated=3&imageid=".$recent->image_id.">3</a> 
                     <a href=".$_SERVER['PHP_SELF']."?mode=rate&rated=4&imageid=".$recent->image_id.">4</a>  
                     <a href=".$_SERVER['PHP_SELF']."?mode=rate&rated=5&imageid=".$recent->image_id.">5</a>";}?> </td>
                     <td><h3>Uploaded By</h3><?php print htmlentities($recent->user_name); ?></td>
                     <td><h3>Uploaded Date</h3><?php print htmlentities($recent->uploaded_date); ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <h2>Popularity</h2>
        <table class="top" border="0" cellpadding="0" cellspacing="0">
            <tbody>
            <?php foreach ($data[1] as $top): ?>
                <tr>
                    <td><img src="./src/resources/<?php print htmlentities($top->image_name);?>"/></td>
                    <td><h3>Caption</h3><?php print htmlentities($top->image_caption); ?></td>
                    <td><?php if(isset($_COOKIE["user"]) && in_array($top->image_id,$data[2])){
                     Echo "<a href=".$_SERVER['PHP_SELF']."?mode=rate&rated=1&imageid=".$top->image_id.">1</a>  
                     <a href=".$_SERVER['PHP_SELF']."?mode=rate&rated=2&imageid=".$top->image_id.">2</a> 
                     <a href=".$_SERVER['PHP_SELF']."?mode=rate&rated=3&imageid=".$top->image_id.">3</a> 
                     <a href=".$_SERVER['PHP_SELF']."?mode=rate&rated=4&imageid=".$top->image_id.">4</a>  
                     <a href=".$_SERVER['PHP_SELF']."?mode=rate&rated=5&imageid=".$top->image_id.">5</a>";}?> </td>
                <td><h3>Uploaded By</h3><?php print htmlentities($top->user_name); ?></td>
                <td><h3>Uploaded Date</h3><?php print htmlentities($top->uploaded_date); ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        </body>
        <?php
   }
}