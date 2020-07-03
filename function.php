<?php //function.php page

$dbhost = "localhost";
$dbname = "publications";
$dbuser = "koas";
$dbpass = "pass";
$appname = "friendships";

$con = mysqli_connect($dbhost, $dbuser, $dbpass);
if(!$con) die (mysqli_error($con));

$dbase = mysqli_select_db($con, $dbname);
if(!$dbase) die (mysqli_error($con));

/*
function createTable($con,$name, $query) {
  queryMysqli($con, "CREATE TABLE IF NOT EXISTS $name($query)") or die (mysqli_error($con));
  echo "Table '$name' created or already exists.<br/>";
}
*/

function queryMysqli($con, $query)
{
  $result = mysqli_query($con, $query) or die (mysqli_error($con));
  return $result;
}

function destroySession()
{
  $_SESSION=array();

  if (session_id() != "" || isset($_COOKIE[session_name()]))
    setcookie(session_name(), '', time()-2592000, '/');

  session_destroy();
}

function sanitizeString($var, $con)
{
  $var = strip_tags($var);
  $var = htmlentities($var);
  $var = stripslashes($var);
  return mysqli_real_escape_string($con, $var);
}

function showProfile($user, $con)
{
  if (file_exists("$user.jpg"))
    echo "<img src='$user.jpg' align='left' />";

  $result = queryMysqli($con, "SELECT * FROM profiles WHERE user='$user'");

  if(mysqli_num_rows($result))
  {
    $row = mysqli_fetch_row($result);
    echo stripslashes($row[1]) . "<br clear=left /><br />";
  }
}
?>
