<?php
require_once 'login.php';
$con = mysqli_connect($db_hostname, $db_username, $db_password);
if(!$con) die ("Unable to connect: " . mysqli_error($con));

$dbase = mysqli_select_db($con, $db_database);
if(!$dbase) die ("unable to access db: " . mysqli_error($con));
/*
$query = "CREATE TABLE users
          (forename VARCHAR(32) NOT NULL,
          surname VARCHAR(32) NOT NULL,
          username VARCHAR(32) NOT NULL UNIQUE,
          password VARCHAR(32) NOT NULL)";
$result = mysqli_query($con, $query);
if(!$result) die ("Database access failed: " . mysqli_error($con));
*/
$salt1 = "qm&h";
$salt2 = "pg!@";

$forename = 'Bill';
$surname = 'Smith';
$username = 'bsmith';
$password = 'mysecret';
$token = md5("$salt1$password$salt2");
add_user($forename, $surname, $username, $token, $con);

$forename = 'Pauline';
$surname = 'Jones';
$username = 'pJones';
$password = 'acrobat';
$token = md5("$salt1$password$salt2");
add_user($forename, $surname, $username, $token, $con);

function add_user($fn, $sn, $un, $pw, $con)
{
  $query = "INSERT INTO users VALUES('$fn', '$sn', '$un', '$pw')";
  $result = mysqli_query($con, $query);
  if(!$result) die ("Database access failed: " . mysqli_error($con));
}
?>
