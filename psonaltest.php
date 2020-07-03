<?php
require_once 'login.php';

$con = mysqli_connect($db_hostname, $db_username, $db_password);
if(!$con) die ("Unable to connect: " . mysqli_error($con));

$dbase = mysqli_select_db($con, $db_database);
if(!$dbase) die ("Unable to access database: " . mysqli_error($con));

if(isset($_POST['name']))
{
 $name = mysqli_entities_fix_string($con,$_POST['name']);

$query = "SELECT* FROM classics WHERE author='$name'";
$result = mysqli_query($con, $query);
if(!$result) die ("database unaccessible: " . mysqli_error($con));
else echo "Name searched exist";
}

echo <<<_END
<form action="psonaltest.php" method="post">

Enter search <input type="text" name="name" />
             <input type="submit" value="Search" />
</form>

_END;

function mysqli_entities_fix_string($con,$string)
{
  return htmlentities(mysqli_fix_string($con, $string));
}

function mysqli_fix_string($con, $string)
{
  if (get_magic_quotes_gpc()) $string = stripslashes($string);
  return mysqli_real_escape_string($con, $string);
}
?>
