<?php
$f = $c = "";

if (isset($_POST['f'])) $f = sanitizeString($_POST['f']);
if (isset($_POST['c'])) $c = sanitizeString($_POST['c']);

if($f = '')
{
  $c = intval((5 / 9) * ($f - 32));
  $out = "$f °f equals $c °c";
}
else if ($c = "")
{
  $f = intval((9 / 5) * ($c + 32));
  $out = "$c °c equals $f °f";
}
else $out = '';

echo <<<_END
<html><head><title>Temperature converter</title>
</head><body><pre>
Enter either Fahrehient or celsius and click on converte

<b>$out</b>
<form method="post" action="formtest2.php">
  Fahrehient <input type="text" name="f" size="7" />
     celsius <input type="text" name="c" size='7' />
             <input type="submit" value="convert" />
</form>
_END;

function sanitizeString($var)
{
  $var = stripslashes($var);
  $var = htmlentities($var);
  $var = strip_tags($var);
  return $var;
}
 ?>
