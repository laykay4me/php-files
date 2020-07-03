<?php
  $db_hostname = 'localhost';
  $db_database = 'publications';
  $db_username = 'koas';
  $db_password = 'pass';

/*
  require_once 'login.php';
  $db_server = mysql_connect($db_hostname, $db_username, $db_password);

  if(!$db_server) die("Unable to connect to Mysql: " . mysql_error());

  mysql_select_db($db_database) //for the or below to work, their must
  //be no semicolon on this line
    or die ("Unable to select database: " . mysql_error());


//in place of the die error message we can

function mysql_fatal_error($msg)
{
$msg2 = mysql_error();
echo <<< _END
We are sorry, but it was not possible to complete
the requested task. The error message we got was:
<p>$msg: $msg2</p>
Please click the back button on your browser
and try again. If you are still having problems,
please <a href="mailto:admin@server.com">email
our administrator</a>. Thank you.
_END;
}
*/
 ?>
