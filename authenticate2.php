<?php
require_once 'login.php';

$con = mysqli_connect($db_hostname, $db_username, $db_password);
if(!$con) die ("Unable to access database: " . mysqli_error($con));

$dbase = mysqli_select_db($con,$db_database);
if(!$dbase) die ("Unable to access dbase : " . mysqli_error($con));

if(isset($_SERVER['PHP_AUTH_USER']) &&
    isset($_SERVER['PHP_AUTH_PW']))
{
  $un_temp = mysqli_entities_fix_string($con,$_SERVER['PHP_AUTH_USER']);
  $pw_temp = mysqli_entities_fix_string($con,$_SERVER['PHP_AUTH_PW']);

  $query = "SELECT * FROM users WHERE username='$un_temp'";
  $result = mysqli_query($con, $query);
  if(!$result) die ("Database access failed: " . mysqli_error($con));
  elseif (mysqli_num_rows($result)){
    $row = mysqli_fetch_row($result);

    $salt1 = "qm&h";
    $salt2 = "pg!@";
    $token = md5("$salt1$pw_temp$salt2");

    if ($token == $row[3]) {
      session_start();
      $_SESSION['username'] = $un_temp;
      $_SESSION['password'] = $pw_temp;
      $_SESSION['forename'] = $row[0];
      $_SESSION['surname'] = $row[1];
      echo "'$row[0]' '$row[1]': Hi '$row[0]',
        you are now logged in as '$row[2]'";
      die ("<p><a href=countinue.php>Click here to countinue</a></p>");
    }

    else die("Invalid username/password combination");
  }
  else echo "the error is here";
}
else
  {
    header('www-Authenticate: Basic realm="Restricted Section"');
    header('HTTP/1.0 401 unauthorized');
    die ("Please enter your username and password");
  }

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
