<?php
session_start();
include "parts/dbconnect.php";
//if ($_SESSION['admin']) {
//    echo "<script>
//     alert(\"欢迎回来！！\");
//    </script>";
//} else {
//    echo "<script>
//    alert('您还尚未登录！请返回登录~~')
//    </script>";
//}
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
echo "<body id = \"$fruitName\">";
include "parts/login.php";
echo $_SESSION["admin"];

echo "</body>";


echo "</html>";

