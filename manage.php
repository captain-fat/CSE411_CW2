<?php
include "parts/dbconnect.php";
session_start();
$fruittype = 2;
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
echo "<link rel=\"shortcut icon\" href=\"Red_Apple.ico\"/>";
echo "</head>";
include 'parts/pageTop.php';
include 'parts/pageNav.php';
echo"<body id = \"$fruitName\">";


if (isset($_SESSION['admin'])){
    include "parts/manage.php";
}
else{
    echo "please <a href='login.php'>login</a>";
    header('refresh:3;url=index.php');
}


echo"</body>";



echo "</html>";

