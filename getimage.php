<?php

isset($_REQUEST['file'])?$filename = $_REQUEST['file']:$filename="";
require('config.php');
if($filename=="" || $filename == null)
{
  die("Filename Required");
}
else{
  try
  {
    //Check if file exists
    if ( !file_exists($hostname.$dir.$filename) ) {
      throw new Exception('File not found.');
    }
    //Check if file can be opened
    $handle = fopen($hostname.$dir.$filename, "rb");
    if (!$handle) {
      throw new Exception('File open failed.');
    }
    //Read File
    $contents = fread($handle, filesize($hostname.$dir.$filename));
    fclose($handle);
    //Set content-type Header
    //echo mime_content_type($filename);
    header("content-type: ".mime_content_type($hostname.$dir.$filename));
    echo $contents;
  }
  catch ( Exception $e ) {
    echo "file not found";
    // send error message if you can
  }

}



//$filename = "/path/to/your/file.jpg";
 ?>
