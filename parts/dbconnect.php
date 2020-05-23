<?php
// all the array list and vars
//Database
$address = '127.0.0.1';
$user = 'root';
$password = '';
$db_name = 'sports';
$mysqli = @(new mysqli($address, $user, $password, $db_name));
if ($mysqli->connect_error) {
    echo "Error: Falied to make a MySQL conncetion";
    exit;
}



