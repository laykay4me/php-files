<?php
include_once 'header.php';

echo "<br /><span class='main'>Welcome to friendships, ";

if($loggedin) echo "$user, you are logged in.";
else        echo "Please sign up and/or log in to continue.";
?>
</span><br />
</body>
</html>
