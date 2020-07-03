<?php
include_once 'header.php';

if (!$loggedin) die();

if(isset($_GET['view'])) $view = sanitizeString($_GET['view'], $con);
else                     $view = $user;

if ($view == $user)
{
  $name = $name2 = 'Your';
  $name3 = "You are";
}
else {
  $name1 = "<a href='members.php?view=$view'>$view</a>'s";
  $name2 = "$view's";
  $name3 = "$view is";
}

echo "<div class='main'>";

//Uncomment this line if you wish the user profile to show here
//showProfile($view);

$followers =array();
$following = array();

$result = queryMysqli($con, "SELECT * FROM friends WHERE user='$view'");
$num = mysqli_num_rows($result);

for ($j = 0; j < $num; ++$j)
{
  $row = mysqli_fetch_row($result);
  $following[$j] = $row[0];
}

$mutal  = array_intersect($followers, $following);
$followers = array_diff($followers, $mutal);
$following = array_diff($following, $mutual);
$friends    = FALSE;

if (sizeof($mutal))
{
  echo "<span class='subhead'>$name2 followers</span><ul>";
  foreach($followers as $friends)
    echo "<li><a href='members.php?view=$friend'>$friend</a>";
  echo "</ul>";
  $friends = TRUE;
}

if (!$friends) echo "<br />You don't have any friends yet. <br /><br />";
echo "<a class='button' href='messages.php?view=$view'>" .
      "View $name2 messages</a>";
?>

</div>
</body>
</html>
