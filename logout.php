<?php
session_start();
include "parts/dbconnect.php";
$fruitName = "orange";

//page
echo "<!DOCTYPE html>";
echo "<html lang=\"en-us\">";
echo "<html>";
echo "<head>";
echo "<meta charset=\"utf-8\">";
echo "<meta name=\"description\" content=\"A place for fruit\">";
echo "<title>All about Sports</title>";
echo "<link href=\"css/style1.css\", rel=\"stylesheet\" />";
echo "<link rel=\"shortcut icon\" href=\"images/favicon.ico\"/>";
echo "</head>";
include 'parts/pageTop.php';
include 'parts/pageNav.php';
echo "<body id = \"$fruitName\">";

$_SESSION=array();
session_destroy();
echo "<div style=\"border: solid;text-align: center;margin-top:5%;padding-top: 2%;padding-bottom: 5%\">";
echo "You are now logged out <br>";
header('refresh:3;url=index.php');
echo "<a href = index.php>login</a>";
echo "<div>";
echo "</body>";


echo "</html>";

