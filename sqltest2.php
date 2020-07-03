<?php
require_once 'login.php';

$con = mysqli_connect($db_hostname, $db_username, $db_password);
if(!$con) die ("Unable to connect: " . mysqli_error($con));

$db_con = mysqli_select_db($con,$db_database);
if(!$db_con) die ("Database unreachable: " . mysql_error($con));

/*
//function to remove any magic quotes added to user inputs
function mysql_fix_string($string)
{
if (get_magic_quotes_gpc()) $string = stripslashes($string);
return mysqli_real_escape_string($con,$strinsg);
}
//or using placeholders
$query = 'PREPARE statement FROM "INSERT INTO classics
VALUES(?,?,?,?,?)"';
mysqli_query($con,$query);
$query = 'SET @author = "Emily Brontë",' .
'@title = "Wuthering Heights",' .
'@category = "Classic Fiction",' .
'@year = "1847",' .
'@isbn = "9780553212587"';
mysqli_query($con,$query);
$query = 'EXECUTE statement USING @author,@title,@category,@year,@isbn';
mysqli_query($con,$query);
$query = 'DEALLOCATE PREPARE statement';
mysqli_query($con,$query);
*/

/*
//to create a table in database
$query = "CREATE TABLE cats (
            id SMALLINT NOT NULL AUTO_INCREMENT,
            family VARCHAR(32) NOT NULL,
            name VARCHAR(32) NOT NULL,
            age TINYINT NOT NULL,
            PRIMARY KEY (id))";
$result = mysqli_query($con, $query);
if(!$result) die ("Database access failed: " . mysqli_error($con));
*/

/*
//to discribe a table
$query = "DESCRIBE customers";
$result = mysqli_query($con, $query);
if(!$result) die ("Database access failed: " . mysqli_error($con));
$rows = mysqli_num_rows($result);

echo "<table><tr> <th>Column</th> <th>Type</th> <th>Null</th>
        <th>Key</th> </tr>";
for ($i = 0; $i < $rows; ++$i)
{
  $row = mysqli_fetch_row($result);
  echo "<tr>";
  for ($j = 0; $j < 4; ++$j) echo "<td>$row[$j]</td>";
  echo "</tr>";
}
echo "</table>";
*/

/*
//to delete a table in database.
$query = "DROP TABLE cats";
$result = mysqli_query($con, $query);
if(!result) die ("Database access failed: " . mysqli_error($con));
*/

/*
//inserting data into the database
$query = "INSERT INTO cats VALUES(NULL, 'Lynx', 'Stumpy', 5)";
$result = mysqli_query($con, $query);
echo "The Insert ID was: " .mysqli_insert_id($con);
if(!$result) die ("Database access failed: " . mysqli_error($con));
*/

/*
//retrieving data from the Database
$query = "SELECT * FROM customers";
$result = mysqli_query($con, $query);
if(!$result) die ("Database access failed: " . mysqli_error($con));
$rows = mysqli_num_rows($result);

for ($i = 0; $i < $rows; ++$i)

$row = mysqli_fetch_row($result);
echo "$row[0] purchased ISBN $row[1]:<br/>";

$subquery = "SELECT * FROM classics WHERE isbn=$row[1]";
$subresult = mysqli_query($con, $subquery);
if(!$subresult) die ("Database unaccessable: " . mysqli_error($con));
$subrow = mysqli_fetch_row($subresult);
echo "'$subrow[1]' by $subrow[0] <br/>";
*/

/*
//updating the Database
$query = "UPDATE cats SET name='Charlie' WHERE name='Charly'";
$result = mysqli_query($con, $query);
if(!$result) die ("Database access failed: " . mysqli_error($con));
*/

/*
//Deleting data from the Database
$query = "DELETE FROM cats WHERE id=5";
$result = mysqli_query($con, $query);
if(!$result) die ("Unable to access database: " . mysqli_error($con));
*/

?>
