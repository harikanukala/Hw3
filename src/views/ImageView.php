<?php
namespace cool_name_for_your_group\hw3\views;
require_once 'View.php';

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
        <h2>Recent Images</h2>
        	<table class="recent" border="0" cellpadding="0" cellspacing="0">
            <tbody>
            <?php foreach ($data[0] as $recent): ?>
                <tr>
                    <td><img src="./src/resources/<?php print htmlentities($recent->image_name.".jpg");?>"/></td>
                    <td><h3>Caption</h3><?php print htmlentities($recent->image_caption); ?></td>
                    <td><h3>Rate</h3><?php print htmlentities($recent->avg_rating); ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <h2>Top images</h2>
        <table class="top" border="0" cellpadding="0" cellspacing="0">
            <tbody>
            <?php foreach ($data[1] as $top): ?>
                <tr>
                    <td><img src="./src/resources/<?php print htmlentities($top->image_name.".jpg");?>"/></td>
                    <td><h3>Caption</h3><?php print htmlentities($top->image_caption); ?></td>
                    <td><h3>Rate</h3><?php print htmlentities($top->avg_rating); ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        </body>
        <?php
   }
}