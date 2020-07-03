<?php // copyfile.php
copy('testfile.txt', 'testfile2.txt') or die("Could not copy file");
//the copy code above can also be written as
//if(!copy('textfile.txt', 'textfile2.txt')) echo "Could not copy file";
echo "File successfully copied to 'testfile2.txt'";

if(!rename('testfile2.txt', 'testfile2.new')) echo "<br/> could not rename file";
else echo "<br/> File successfully renamed to testfile2.new";
?>
