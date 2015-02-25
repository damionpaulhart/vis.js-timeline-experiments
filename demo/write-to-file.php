<?php
// the name of the file you're writing to
$myFile = "data.js";



// opens the file for appending (file must already exist)
$fh = fopen($myFile, 'a');

// clear content to 0 bits
ftruncate($fh, 0);

// Makes a CSV list of your post data
//$comma_delmited_list1 = implode(",", $_POST) . "\n";
//$comma_delmited_list2 = json_decode($_POST);
//$comma_delmited_list3 = var_dump($_REQUEST);
//$comma_delmited_list4 = json_decode(file_get_contents('php://input'), true);
//$comma_delmited_list5 = $_POST;
//$rawData = file_get_contents("php://input");
//$comma_delmited_list6 = json_decode($rawData);
$comma_delmited_list6 = file_get_contents("php://input");
//$comma_delmited_list7 = json_decode($comma_delmited_list6, true);
//$comma_delmited_list8 = var_dump($comma_delmited_list7);


// Write to the file
//fwrite($fh, "==test6==\n");
//fwrite($fh, "1" . $comma_delmited_list1 . "\n");
//fwrite($fh, "2" . $comma_delmited_list2 . "\n");
//fwrite($fh, "3" . $comma_delmited_list3 . "\n");
//fwrite($fh, "4" . $comma_delmited_list4 . "\n");
//fwrite($fh, "5" . $comma_delmited_list5 . "\n");
fwrite($fh, $comma_delmited_list6);
//fwrite($fh, "7" . $comma_delmited_list7 . "\n");
//fwrite($fh, "8" . $comma_delmited_list8 . "\n");
//fwrite($fh, "dump" . var_dump($_REQUEST) . "\n");
//fwrite($fh, "==ENDTEST==\n");
// You're done
fclose($fh);
?>