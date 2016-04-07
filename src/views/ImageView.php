<?php
namespace cs_rockers\hw3\views;

require_once 'View.php';
require_once "elements/Element.php";
require_once "elements/HeaderElement.php";
require_once 'helpers/Helper.php';
require_once 'helpers/ImageViewHelper.php';
$header=new elements\HeaderElement();
    $header->render(null);
class ImageView extends View
{

   public function render($data)
   {
     
   	?>
        <!DOCTYPE html>
        <html lang="en-US" dir="ltr">
        <head> 
          <title>Image Rating</title> 
          <meta charset="utf-8" />
        </head>
        <body>
        <?php if(isset($_COOKIE["user"])){
         Echo "<form action=".$_SERVER['PHP_SELF'].">
        <input type='submit' name='mode' value='Upload'/>
     </form>";
     }
     $recent=new helpers\ImageViewHelper();
     $recent->render($data);
     ?> 
      </body>
        <?php
   }
}