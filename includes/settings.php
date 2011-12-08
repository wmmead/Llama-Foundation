<?php

//Database constants

define ("DB_HOST", "localhost");
define ("DB_USER", "root");
define ("DB_PWORD", "root"); // on xampp change to just ""
define ("DB_NAME", "llamafoundation");
define ("KEY", "cheese");

//these need to be changed to windows paths for windows. Use a foreward slash
define ("IMG_PATH", "/Applications/MAMP/htdocs/Llama-Foundation/picts/");
define ("RESIZED_PATH", "/Applications/MAMP/htdocs/Llama-Foundation/resized/");
define ("THUMB_PATH","/Applications/MAMP/htdocs/Llama-Foundation/thumbs/");

// For XAMPP
/***********
define ("IMG_PATH", "C:/xampp/htdocs/Llama-Foundation/picts/");
define ("RESIZED_PATH", "C:/xampp/htdocs/Llama-Foundation/resized/");
define ("THUMB_PATH","C:/xampp/htdocs/Llama-Foundation/thumbs/");
*************/

// For common linux server setups... 
/***********
define ("IMG_PATH", "/home/username/public_html/Llama-Foundation/picts/"); //change username to your username
define ("RESIZED_PATH", "/home/username/public_html/Llama-Foundation/resized/");
define ("THUMB_PATH","/home/username/public_html/Llama-Foundation/thumbs/");
*************/

?>