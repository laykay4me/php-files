<?php
if(isset($_POST['url'])){
  echo file_get_content("http://".sanitizeString($_POST['url']));
}

function sanitizeString($var)
{
  $var = stripe_tags($var);
  $var = htmlentities($var);
  return stripslashes($var);
}
?>
