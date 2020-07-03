<?php
$paper[] = "copier";
$paper[] = "inject";
$paper[] = "printer";
$paper[] = "laserjet";

print_r ($paper);
print_r("<br />" . $paper[0]);

for ($i = 0; $i < count($paper); $i++)//sizeof can also be use in place of count
{
  echo "<br /> $paper[$i] <br />";
}

$paper['copier'] = "copier and multipliers";
$paper['inject'] = "inject printer";
$paper['laser'] = "laserjet";
$paper['photo'] = "photographic paper";

echo "<br />" . $paper['inject'];

$p1 = array("copier", "inkjet", "laser", "photo");
echo "<br /> p1 element: " . $p1[1] . "<br/>";

$p2 = array('copier' => "copier and multipliers",
            'inject' => "inject printer",
            'laser' => "laserjet",
            'photo' => "photographic paper");

echo "p2 element: " . $p2['inject'] . "<br />";

$j = 0;
foreach ($p1 as $item) {
  echo "$j: $item<br>";
  $j++;
}

foreach ($paper as $item2 => $value) {
  echo "$item: $value <br/>";
}

/*
this is a depreceated method of calling associative array in php
while(list($item, $value) = each($paper))
{
  echo "$item: $value <br/>";
}
*/

$products = array(
  'paper' => array(
              'copier' => "copier and multipliers",
              'inject' => "inject printer",
              'laser' => "laserjet",
              'photo' => "photographic paper"),
  'pens' => array(
              'ball' => "Ball Point",
              'hinite' => "Highligters",
              'marker' => "Markers"),
  'misc' => array(
              'tape' => "Sticky Tape",
              'glue' => "Adhesives",
              'clips' => "Paperclips"));
  echo"<pre>";
  foreach ($products as $section => $items) {
    foreach ($items as $key => $value) {
      echo "$section:\t$key\t($value) <br/>";
    }
  }
  echo"</pre>";

/*

testing foreach for chess game
$chessboard = array(
            array('r','n','b','q','k','b','n','r'),
            array('p','p','p','p','p','p','p','p'),
            array(' ',' ',' ',' ',' ',' ',' ',' '),
            array(' ',' ',' ',' ',' ',' ',' ',' '),
            array(' ',' ',' ',' ',' ',' ',' ',' '),
            array(' ',' ',' ',' ',' ',' ',' ',' '),
            array(' ',' ',' ',' ',' ',' ',' ',' '),
            array(' ',' ',' ',' ',' ',' ',' ',' '),
            array('P','P','P','P','P','P','P','P'),
            array('R','N','B','K','Q','B','N','R')
          );
  echo"<pre>";
  foreach ($chessboard as $row) {
    foreach ($row as $key) {
      echo"$key";
      echo"<br/>";
    }
  }
  echo "</pre>";
*/
  $fred = "";
  echo(is_array($fred)) ? "is an array" : "is not an array";


  echo time() . "<br/>";
  echo time() + 7 * 24 * 60 * 60 . "<br/>"; //to add extra 7 days

  echo date("l F jS, Y - g:ia", time()) . "<br/>";

  //to check if input date by user is opcache_invalidate

$month = 9; // September (only has 30 days)
$day = 31; // 31st
$year = 2012; // 2012
if (checkdate($month, $day, $year)) echo "Date is valid";
else echo "Date is invalid";

//using file_exists to check if a file apc_exists
if(file_exists("textfile.txt")) echo "file exists <br/>";

$timestamp = mktime(7, 11, 0, 5, 2, 2016);//command to make unix $timestamp
echo "<br/>" . $timestamp;

// file_get_contents() is the function used to read an entire file after
//opening file directory example:
//file_get_contents('textfile.txt');
?>
