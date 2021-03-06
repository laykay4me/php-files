<?php
include_once 'header.php';

if(!$loggedin) die();

echo "<div class='main'>";

if (isset($_GET['view']))
{
  $view = sanitizeString($_GET['view'], $con);

  if($view == $user) $name = 'Your';
  else $name = "$view's";

  echo "<h3>$name Profile</h3>";
  showProfile($view, $con);
  echo "<a class='button' href='messages.php?view=$view'" .
      "view $name messages </a></br />";
  die ("</div></body></html>");
}

if (isset($_GET['add']))
{
  $add = sanitizeString($_GET['add'], $con);

  if (!mysali_num_rows(queryMysqli($con, "SELECT * FROM friends WHERE user='$add'
      AND friend='$user'")))
      queryMysqli($con, "INSERT INTO friends VALUES ('$add', '$user')");
}
elseif (isset($_GET['remove']))
{
  $remove = sanitizeString($_GET['remove'], $con);
  queryMysqli($con, "DELETE FROM friends WHERE user='$remove' AND friend='$user'" );
}

$result = queryMysqli($con, "SELECT user FROM members ORDER BY user");
$num = mysqli_num_rows($result);

echo "<h3>Other Members</h3><ul>";

for($j = 0; $j < $num; ++$j)
{
  $row = mysqli_fetch_row($result);
  if($row[0] == $user) continue;

  echo "<li><a href='members.php?view=$row[0]'>$row[0]</a>";
  $follow = "follow";

  $t1 = mysqli_num_rows(queryMysqli($con, "SELECT * FROM friends
        WHERE user='$row[0]' AND friend='$user'"));
  $t2 = mysqli_num_rows(queryMysqli($con, "SELECT * FROM friends
        WHERE user='$user' AND friend='$row[0]'"));

        if (($t1 + $t2) > 1) echo "&hrr; is a mutual friend";
        else if ($t1)     echo " $larr; you are following";
        elseif ($t2)      {echo "$rarr; is following you";
                          $follow = 'recip';}
        if (!$t1) echo "[<a href='members.php?add=".$row[0] . "'>$follow</a>]";
        else      echo "[<a href='members.php?remove=".$row[0] . "'>drop</a>]";
}
?>

<br /></div>
</body>
</html>
