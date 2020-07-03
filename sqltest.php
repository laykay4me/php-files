<?php
require_once 'login.php';

$db_server = mysqli_connect($db_hostname, $db_username, $db_password);
  if(!$db_server) die ("Unable to connect to database: " . mysqli_error($db_server));

$db_connect = mysqli_select_db($db_server,$db_database);
  if(!$db_connect) die ("Database not found: " . mysqli_error($db_server));

if (isset($_POST['delete']) && isset($_POST['isbn']))
{
  $isbn = mysqli_real_escape_string($db_server,$_POST['isbn']);
  $query = "DELETE FROM classics WHERE isbn='$isbn'";

  if(!mysqli_query($db_server, $query))
    echo "DELETE failed: $query<br />" . mysqli_error($db_server) . "<br />";

}

if (isset($_POST['author']) &&
    isset($_POST['title']) &&
    isset($_POST['category']) &&
    isset($_POST['year']) &&
    isset($_POST['isbn']))
{

  $author =mysqli_real_escape_string($db_server,$_POST['author']);
  $title =mysqli_real_escape_string($db_server,$_POST['title']);
  $category =mysqli_real_escape_string($db_server,$_POST['category']);
  $year =mysqli_real_escape_string($db_server,$_POST['year']);
  $isbn =mysqli_real_escape_string($db_server,$_POST['isbn']);

  $query = "INSERT INTO classics VALUES" .
      "('$author', '$title', '$category', '$year', '$isbn')";

  if(!mysqli_query($db_server, $query))
      echo "INSERT failed: $query<br/>" . mysqli_error($db_server) . "<br/>";

}

echo <<<_END
<form action="sqltest.php" method="post">
  <pre>
    Author <input type="text" name="author" />
    Title <input type="text" name="title" />
    Category <input type="text" name="category" />
    Year <input type="text" name="year" />
    ISBN <input type="text" name='isbn' />
    <input type="submit" value="Add Record" />
  </pre>
</form>
_END;

$query = "SELECT* FROM classics";
$result = mysqli_query($db_server, $query);

if(!$result) die ("Database access failed: " . mysqli_error($db_server));
$rows= mysqli_num_rows($result);

for ($j=0; $j < $rows; ++$j)
{
  $row = mysqli_fetch_row($result);
  echo <<<_END
  <pre>
  Author $row[0]
  Title $row[1]
  Category $row[2]
  Year $row[3]
  ISBN $row[4]
  </pre>
  <form action="sqltest.php" method="post">
    <input type="hidden" name="delete" value="yes" />
    <input type="hidden" name="isbn" value="$row[4]" />
    <input type="submit" value="Delete Record" />
  </form>
  _END;
}

mysqli_close($db_server);

 ?>
