<?php
session_start();
include "parts/dbconnect.php";

//page
echo "<!DOCTYPE html>";
echo "<html lang=\"en-us\">";
echo "<html>";
echo "<head>";
echo "<meta charset=\"utf-8\">";
echo "<meta name=\"description\" content=\"A place for fruit\">";
echo "<title>All about Sports</title>";
echo "<link href=\"css/style1.css\", rel=\"stylesheet\" />";
echo "<link rel=\"shortcut icon\" href=\"Red_Apple.ico\"/>";
echo "</head>";
include 'parts/pageTop.php';
include 'parts/pageNav.php';
echo "<body id = \"$fruitName\">";

$_SESSION=array();
session_destroy();

echo "You are now logged out";
header('refresh:3;url=index.php');
echo "<a href = index.php>login</a>";

echo "</body>";


echo "</html>";

