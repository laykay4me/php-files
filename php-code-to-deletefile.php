<?php // deletefile.php

if(file_exists('testfile2.new')){
if (!unlink('testfile2.new')) echo "Could not delete file";
else echo "File 'testfile2.new' successfully deleted";}
?>
