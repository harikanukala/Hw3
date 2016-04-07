<?php
namespace cs_rockers\hw3\views;
require_once 'View.php';
class UploadView extends View
{
	function render($data)
   {
   		?><!DOCTYPE html>
			<html>
			<body>

			<form action="<?php echo $_SERVER['PHP_SELF']."?mode=checkFile"; ?>" method="post" enctype="multipart/form-data">
				Image Caption:
				<input type="text" name="caption" id="caption">
			    Select image to upload:
			    <input type="file" name="fileToUpload" id="fileToUpload">
			    <input type="submit" value="Upload Image" name="submit">
			</form>

			</body>
			</html>
			<?php

   }
}