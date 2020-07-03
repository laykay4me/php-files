<?php
require_once 'login.php';

$con = mysqli_connect($db_hostname, $db_username, $db_password);
if(!$con) die ("Unable to connect database: " . mysqli_error($con));

$dbase = mysqli_select_db($con,$db_database);
if(!$dbase) die ("Database access failed: " . mysqli_error($con));

/* i created new table for profile collection in my databse and comment it out
after the table was created.

$query = "CREATE TABLE profile
            (name VARCHAR(32) NOT NULL,
            address VARCHAR(32) NOT NULL,
            phone VARCHAR(32) NOT NULL,
            sex VARCHAR(32) NOT NULL,
            email VARCHAR(32) NOT NULL,
            age VARCHAR(32) NOT NULL,
            username VARCHAR(32) NOT NULL UNIQUE,
            password VARCHAR(32) NOT NULL,
            PRIMARY KEY (phone))";
$result = mysqli_query($con, $query);
if(!$result) die ("Unable to create table: " . mysqli_error($con));
*/

if(isset($_POST['name']) &&
    isset($_POST['address']) &&
    isset($_POST ['phone']) &&
    isset($_POST['sex']) &&
    isset($_POST['email']) &&
    isset($_POST['age']) &&
    isset($_POST['username']) &&
    isset($_POST['password']))
{
  $name = mysqli_entities_fix_string($con, $_POST['name']);
  $add = mysqli_entities_fix_string($con, $_POST['address']);
  $phone = mysqli_entities_fix_string($con, $_POST['phone']);
  $sex = mysqli_entities_fix_string($con, $_POST['sex']);
  $email = mysqli_entities_fix_string($con, $_POST['email']);
  $age = mysqli_entities_fix_string($con, $_POST['age']);
  $username = mysqli_entities_fix_string($con, $_POST['username']);
  $password = mysqli_entities_fix_string($con, $_POST['password']);

  $query = "INSERT INTO profile VALUES" . "(
'$name', '$add', '$phone', '$sex', '$email', '$age', '$username', '$password')";

$result = mysqli_query($con, $query);
if(!$result) die ("Database access failed: " . mysqli_error($con));
}

echo <<<_END
  <form action="personal.php" method="post">
        Name: <br />  <input type="text" name="name" value="FullName" /><br /><br />
     Address:<br /><input type="text" name="address" /><br /><br />
    Phone No:<br /><input type="text" name="phone" /><br /><br />
         Sex:<br /> <input type="text" name="sex" value="m/f" /><br /><br />
       Email:<br /> <input type="text" name="email" /><br /><br />
         Age:<br /> <input type="text" name="age" value="dd/mm/yyyy"/><br /><br />
    Username:<br /> <input type="text" name="username" /><br /><br />
    Password:<br /> <input type="text" name="password" /><br /><br />
    <input type="submit" value="Submit" / >
    <input type="reset" value="Clear" />
  </form>
_END;

function mysqli_entities_fix_string($con, $string)
{
  return htmlentities(mysqli_fix_string($con, $string));
}
function mysqli_fix_string($con, $string)
{
  if(get_magic_quotes_gpc()) $string = stripslashes($string);
  return mysqli_real_escape_string($con, $string);
}
?>
