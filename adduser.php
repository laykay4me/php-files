<?php
//php code here
$forename = $surname = $username = $password = $age = $email = "";

if (isset($_POST['forename']))
  $forename = fix_string($_POST['forename']);
if (isset($_POST['surname']))
  $surname = fix_string($_POST['surname']);
if (isset($_POST['username']))
  $username = fix_string($_POST['username']);
if (isset($_POST['password']))
  $password = fix_string($_POST['password']);
if (isset($_POST['age']))
  $age = fix_string($_POST['age']);
if (isset($_POST['email']))
  $email = fix_string($_POST['emial']);

$fail = validate_forename($forename);
$fail .= validate_surname($surname);
$fail .= validate_username($username);
$fail .= validate_password($password);
$fail .= validate_age($age);
$fail .= validate_email($email);

if ($fail == "") {
  echo "form data successfully validated: $forename,
  $surname, $username, $password, $age, $email.";
}


echo<<<_END
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8" />
    <title>An Example Form</title>
    <style media="screen">
      .signup{border:1px solid #999999;
      font: normal 14px helvitica; color:#444444;}
    </style>
    <script>
        function validate(form) {
          fail = validateForename(form.forename.value)
          fail += validateSurname(form.surname.value)
          fail += validateUsername(form.username.value)
          fail += validatePassword(form.password.value)
          fail += validateAge(form.age.value)
          fail += validateEmail(form.email.value)
          if (fail == "") return true
          else {alert(fail); return false}
        }
    </script>
  </head>
  <body>
    <table class="signup" border="0" cellpadding="2"
        cellspacing="5" bgcolor="#eeeeee">
    <th colspan="2" align="center">Signup Form</th>

    <tr><td colspan="2">Sorry, the following errors were found<br />
    in your form: <p><font color=red size=1><i>$fail</i></font></p>
    </td></tr>

    <form onSubmit="return validate(this)" action="" method="post">
        <tr><td>forename</td><td><input type="text"
          maxlength="32" name="forename" value="$forename"/></td>
        </tr>
        <tr><td>surname</td><td><input type="text"
          maxlength="32" name="surname" value="$surname"/></td>
        </tr>
        <tr><td>username</td><td><input type="text"
          maxlength="16" name="username" value="$username"/></td>
        </tr>
        <tr><td>password</td><td><input type="text"
          maxlength="12" name="password" value="$password"/></td>
        </tr>
        <tr><td>age</td><td><input type="text"
          maxlength="3" name="age" value="$age"/></td>
        </tr>
        <tr><td>email</td><td><input type="text"
          maxlength="64" name="email" value="$email"/></td>
        </tr>
        <tr><td colspan="2" align="center">
          <input type="submit" value="signup"/></td>
        </tr>
    </form>
    </table>

  <!---javascript Section -->
  <script>
  function validateForename(field) {
    if (field == "") return "No Forename was entered.\\n"
    return ""
  }
  function validateSurname(field) {
    if (field == "") return "No Surname was entered. \\n"
    return ""
  }
  function validateUsername(field){
    if (field == "") return "No Username was entered. \\n"
    else if (field.length < 5)
        return "Username must be at least 5 charcters. \\n"
    else if (/[^a-zA-Z0-9_-]/.test(field))
        return "Only a-z, A-z, 0-9, - and _ are allowed as Usernames. \\n"
    return ""
  }
  function validatePassword(field){
    if (field = "") return "No Password was entered. \\n"
    else if (field.length < 6)
        return "Passwords must be at least 6 characters. \\n"
    else if (!/[a-z]/.test(field) || /[A-Z]/.test(field) ||
            !/[0-9]/.test(field))
        return "Password require one each of a-z, A-Z and 0-9 \\n"
    return ""
  }
  function validateAge(field){
    if (isNaN(field)) return "No age was entered. \\n"
    else if (field < 18 || field > 110)
        return "Age must be between 18 and 110. \\n"
  }
  function validateEmail(field){
    if(field == "") return "No Email was entered. \\n"
      else if (!((field.indexOf(".") > 0) &&
                (field.indexOf("@") > 0)) ||
                /[^a-zA-Z0-9.@_-]/.test(field))
      return "The Email address is invalid. \\n"
    return ""
  }
  </script>
  </body>
</html>
_END;

//php functions
function validate_forename($field)
{
  if ($field == "") return "No Forename was entered<br />";
  return "";
}
function validate_surname ($field) {
  if ($field == "") return "No surname was entered <br />";
  return;
}
function validate_username($field) {
  if($field == "") return "No username was entered <br />";
  elseif (strlen($field) < 5)
    return "username must be at least 5 characters <br />";
  elseif (preg_match("/[a-zA-z0-9_-]/", $field))
    return "Only letters, numbers, - and _ in username <br />";
  return "";
}
function validate_password($field) {
  if ($field == "") return "No password was entered <br />";
  elseif (strlen($field) < 6)
    return "Password must be atleast 6 characters <br />";
  elseif (!preg_match("/[a-z]/", $field) ||
          !preg_match("/[A-z]/", $field) ||
          !preg_match("/[0-9]/", $field))
    return "Password require 1 each of a-z, A-Z and 0-9<br />";
  return "";
}
function validate_age($field) {
  if ($field == "") return "No age was entered <br />";
  elseif ($field < 18 || $field > 110)
    return "Age must be above 18 and less than 110";
  return "";
}
function validate_email($field) {
if($field == "") return "No email was entered <br />";
  elseif(!((strpos($field, ".") > 0) &&
        (strpos($field, "@") > 0)) ||
        preg_match("/[^a-zA-Z0-9.@_-]/", $field))
  return "The email is invalid<br />";
return "";
}
function fix_string($string){
  if(get_magic_quotes_gpc()) $string = stripslashes($string);
  return htmlentities($string);
}
?>
