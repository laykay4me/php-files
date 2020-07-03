<?php
include_once 'header.php';

echo <<<_END
<script>
  function checkUser(user)
  {
    if (user.value == ''){
      O('info').innerHTML = ''
      return
    }
  params = "user=" + user.value
  request = new ajaxRequest()
  request.open("POST", "checkUser.php", true)
  request.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
  request.setRequestHeader("Content-length", params.length)
  request.setRequestHeader("Connection", "close")

  request.onreadystatechange = function()
  {
    if (this.readystate == 4)
    if (this.status == 200)
    if (this.responseText != null)
    O('info').innerHTML = this.responseText
  }
  request.send(params)
}

function ajaxRequest()
{
  try {var request = new XMLHttpRequest()}
  catch(e1) {
    try {request = new ActiveXObject("Msxml2.XMLHTTP")}
    catch (e2) {
      try {request = new ActiveXObject("Microsoft.XMLHTTP")}
      catech(e3) {
        request = false
      }
    }
  }
  return request
}
</script>
<div class="main"><h3>Please enter your details to sign up</h3>
_END;

$error = $user = $pass = "";
if (isset($_SESSION['user'])) destroySession();

if (isset($_POST['user']))
{
  $user = sanitizeString($_POST['user'], $con);
  $pass = sanitizeString($_POST['pass'], $con);
  if ($user == "" || $pass == "")
    $error = "Not all field were entered<br /><br />";
  else{
    if (mysqli_num_rows(queryMysqli($con, "SELECT * FROM members WHERE user='$user'")))
      $error = "That username already exist<br /><br />";
    else
    {
      queryMysqli($con, "INSERT INTO members VALUES ('$user', '$pass')");
      die ("<h4>Account Created</h4>Please Log in.<br /><br />");
    }
  }
}

echo <<<_END
<form method='post' action='signup.php'>$error
<span class='fieldname'>Username</span>
<input type='text' maxlength='16' name='user' value='$user'
  onBlur='checkUser(this)' /><span id='info'></span><br />
<span class='fieldname'>Password</span>
<input type='text' maxlength='16' name='pass' value='$pass' /><br />
_END;
?>

<span class='fieldname'>&nbsp;</span>
<input type='submit' value='Sign up' />
</form></div>
</body>
</html>
