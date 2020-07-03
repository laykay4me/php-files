<?php // upload.php
echo <<<_END
<html><head><title>PHP Form Upload</title></head><body>
<form method='post' action='uploading-code.php' enctype='multipart/form-data'>
148 | Chapter 7: Practical PHP
www.it-ebooks.info
Select File: <input type='file' name='filename' size='10' />
<input type='submit' value='Upload' />
</form>
_END;
/*
if ($_FILES)
{
$name = $_FILES['filename']['name'];
move_uploaded_file($_FILES['filename']['tmp_name'], $name);
echo "Uploaded image '$name'<br /><img src='$name' />";
}
*/

//the code above can be improved on as below for security reasons
if ($_FILES)
{
$name = $_FILES['filename']['name'];
$name = strtolower(preg_replace("/[^A-Za-z0-9.]/", "", $name));
switch($_FILES['filename']['type'])
{
case 'image/jpeg': $ext = 'jpg'; break;
case 'image/gif': $ext = 'gif'; break;
case 'image/png': $ext = 'png'; break;
case 'image/tiff': $ext = 'tif'; break;
default: $ext = ''; break;
}
if ($ext)
{
$n = "image.$ext";
move_uploaded_file($_FILES['filename']['tmp_name'], $n);
echo "Uploaded image '$name' as '$n':<br />";
echo "<img src='$n' />";
}
else echo "'$name' is not an accepted image file";
}
else echo "No image has been uploaded";
echo "</body></html>";
?>
