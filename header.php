<?php
//header.php file
session_start();
echo <<<_END
<!DOCTYPE html>
<head>
  <script src='oscFunction.js'></script>
_END;
require_once 'function.php';

$userstr = '(Guest)';

if (isset($_SESSION['user']))
{
  $user = $_SESSION['user'];
  $loggedin = TRUE;
  $userstr = "($user)";
}
else $loggedin = FALSE;

echo <<<_END
  <title>$appname$userstr</title>
  <link rel='stylesheet' href='style.css' type='text/css' />
  </head>
  <body>
  <div class='appname'>$appname$userstr</div>
_END;

if ($loggedin)
{
  echo "<br /><ul class='menu'" .
      "<li><a href='members.php?view=$user'>Home</a></li>" .
      "<li><a href='members.php'>Members</a></li>" .
      "<li><a href='friends.php'>Friends</a></li>" .
      "<li><a href='messages.php'>Messages</a></li>" .
      "<li><a href='profile.php'>Edit Profile</a></li>" .
      "<li><a href='logout.php'>Log out</a></li>";
}
else
{
  echo ("<br /><ul class='menu'>" .
        "<li><a href='index.php'>Home</a></li>" .
        "<li><a href='signup.php'>Sign up</a></li>" .
        "<li><a href='login.php'>Login</a></li>" .
        "<span class='info'>&#8658; You must logged in to " .
        "view this page.</span><br />");
}

?>
