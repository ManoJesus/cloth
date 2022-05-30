<?php

echo md5("123")."<br>";
echo md5("123");

//
//
//
//$data = [
//    ['Symbol', 'Company', 'Price'],
//    ['GOOG', 'Google Inc.', '800'],
//    ['AAPL', 'Apple Inc.', '500'],
//    ['AMZN', 'Amazon.com Inc.', '250'],
//    ['YHOO', 'Yahoo! Inc.', '250'],
//    ['FB', 'Facebook, Inc.', '30'],
//    ['FB1', 'Facebook1, Inc1.', '301'],
//];
//
//$filename = '/var/www/cloth/user_attempts.csv';
//
//// open csv file for writing
//$f = fopen($filename, 'w+');
//
//if ($f === false) {
//    die('Error opening the file ' . $filename);
//}
//
//// write each row at a time to a file
//foreach ($data as $row) {
//    fputcsv($f, $row);
//}
//
//// close the file
//fclose($f);
//
////reading
//
//$filename = './user_attempts.csv';
//$data = [];
//
//// open the file
//$f = fopen($filename, 'r');
//
//if ($f === false) {
//    die('Cannot open the file ' . $filename);
//}
//
//// read each line in CSV file at a time
//while (($row = fgetcsv($f)) !== false) {
//    $data[] = $row;
//}
//print_r($data);
//// close the file
//fclose($f);
//
//function user_ip_attempts():int{
//    $user_ip = user_ip();
//    $attempts = 0;
//
//
//    $myFile = fopen("logs/user_attempts.csv", "w+") or die("unable to open file!");
//
//
//    return 0;
//}
//function verify_user_attempts(){
//    $myFile = fopen("logs/user_attempts.csv", "w+") or die("unable to open file!");
//
//    while (($row = fgetcsv($myFile)) !== false) {
//        $data[] = $row;
//    }
//
//}
//function user_ip(){
//    $user_ip = "";
//    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
//        $user_ip =  $_SERVER['HTTP_CLIENT_IP'];
//    } if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
//        $user_ip  = $_SERVER['HTTP_X_FORWARDED_FOR'];
//    } if (!empty($_SERVER['REMOTE_ADDR'])){
//        $user_ip =  $_SERVER['REMOTE_ADDR'];
//    }
//    return $user_ip;
//}