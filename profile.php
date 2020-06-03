<?php
session_start();
include "parts/dbconnect.php";

$fruitName = "orange";

if (isset($_REQUEST['update_prof'])) {
    $information = information($mysqli);
    $password = $information[0];
    $full_name = $information[1];
    $profile = $information[2];
}
if (isset($_REQUEST['update_prof_confirm'])) {
    update_prof($mysqli);
}

function update_prof($mysql)
{
    $username = $_SESSION['username'];
    $password = $_REQUEST['password'];
    $profile = $_REQUEST['profile'];
    $full_name = $_REQUEST['full_name'];
    $sql = "update user set `password` = '$password', `profile` = '$profile',
    `full_name` = '$full_name' where username = '$username'";
    if (!$result = $mysql->query($sql)) {
        echo "Error <br>";
        echo $sql;
    } else {
        echo "<script>
        alert('Update Successfully')
        </script>";
        header("refresh:3; url=profile.php");
    }

}


function information($mysql)
{
    $username = $_SESSION['username'];
    $sql = "select * from user where username = '$username'";
    if (!$result = $mysql->query($sql)) {
        echo "Error <br>";
        echo $sql;
    }
    while ($row = $result->fetch_assoc()) {
        $password = $row['password'];
        $full_name = $row['full_name'];
        $profile = $row['profile'];
        $information = array($password, $full_name, $profile);
    }
    return $information;

}


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
if (isset($_SESSION['admin']) && !isset($_REQUEST['update_prof'])) {
    include 'parts/profile.php';
}
if (isset($_SESSION['admin']) && isset($_REQUEST['update_prof'])) {
    include 'parts/update_prof.php';
}
if (!isset($_SESSION['admin'])) {
    include "parts/not_login.php";
    header('refresh:3;url=index.php');
}


echo "</body>";


echo "</html>";

