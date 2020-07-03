<?php

require_once 'login.php';

$db_server = mysqli_connect($db_hostname, $db_username, $db_password);
  if(!$db_server) die ("unable to connect to database: " . mysqli_error());

  mysqli_select_db($db_server,$db_database)
    or die ("Database unreachable: " . mysqli_error());

$query = "SELECT* FROM classics";
$result = mysqli_query($db_server,$query);

if (!$result) die ("Database access failed: " . mysqli_error());


$rows = mysqli_num_rows($result);
if ($rows > 0){
while ($rows = $result ->fetch_assoc())
{
echo 'Author: ' . $rows['author'] . '<br />';
echo 'Title: ' . $rows['title'] . '<br />';
echo 'Category: ' . $rows['category'] . '<br />';
echo 'Year: ' . $rows['year'] . '<br />';
echo 'ISBN: ' . $rows['isbn'] . '<br /><br />';
}
}
for ($j = 0 ; $j < $rows ; ++$j)
{
$row = mysqli_fetch_row($result);
echo 'Author: ' . $row[$j] . '<br />';
echo 'Title: ' . $row[$j] . '<br />';
echo 'Category: ' . $row[$j] . '<br />';
echo 'Year: ' . $row[$j] . '<br />';
echo 'ISBN: ' . $row[$j] . '<br /><br />';
}
mysqli_close($db_server);
?>
