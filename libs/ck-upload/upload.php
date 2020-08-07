<?php

require "./../../config.php";

// Required: anonymous function reference number as explained above.
$funcNum = $_GET['CKEditorFuncNum'] ;

// Check the $_FILES array and save the file. Assign the correct path to a variable ($url).
$url = HOST . 'usercontent/editor-uploads/post-6.jpg';
// Usually you will only assign something here if the file could not be uploaded.
$message = 'The uploaded file has been renamed';

echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($funcNum, '$url', '$message');</script>";
