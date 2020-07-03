<?php
include_once 'function.php';

if(isset($_POST['user']))
{
  $user = sanitizeString($_POST['user'], $con);

  if (mysqli_num_rows(queryMysqli("SELECT * FROM Members
      WHERE user='$user'")))
      echo "<span class='taken'>&nbsp;&#x2718; " .
            "sorry, this username is taken</span>";
  else echo "<span class='available'>&nbsp;&#2714; " .
            "This username is available</span>";
}
?>
