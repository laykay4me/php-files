<html>
<head>
  <title>Setting up database</title>
</head>
<body>
  <h3>Setting up...</h3>

  <?php
    include_once 'function.php';
/*
    $query = "CREATE TABLE members (
                user VARCHAR(16),
                pass VARCHAR(16),
                INDEX(user(6)))";
    $result = mysqli_query($con, $query);
    if(!$result) die ("unable to create table: " . mysqli_error($con));
*/
    $query = "CREATE TABLE messages (
                id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                auth VARCHAR(16),
                recip VARCHAR(16),
                pm CHAR(1),
                times INT UNSIGNED,
                message VARCHAR(4096),
                INDEX(auth(6)),
                INDEX(recip(6)))";
    $result = mysqli_query($con, $query);
    if(!$result) die ("unable to create table: " . mysqli_error($con));

    $query = "CREATE TABLE frineds (
                user VARCHAR(16),
                friend VARCHAR(16),
                INDEX(user(6)),
                INDEX(friend(6)))";
    $result = mysqli_query($con, $query);
    if(!$result) die ("unable to create table: " . mysqli_error($con));

    $query = "CREATE TABLE profiles (
                user VARCHAR(16),
                texts VARCHAR(4096),
                INDEX(user(6)))";
    $result = mysqli_query($con, $query);
    if(!$result) die ("unable to create table: " . mysqli_error($con));

?>

  <br />...done.
</body>
</html>
