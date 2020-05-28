<?php
session_start();
include "parts/dbconnect.php";

$fruitName = "orange";

if (isset($_REQUEST['login'])){
    login($mysqli);
}
function login($mysql)
{
    $fNam = mysqli_real_escape_string($mysql, $_REQUEST['username']);
    $fPas = mysqli_real_escape_string($mysql, $_REQUEST['password']);
    if (($fNam=='')||($fPas=='')){
        header('refresh:3;url=index.php');
        echo "Please enter username or password";
        exit;
    }

    $runQ = "select username, password from user where username = '$fNam' and password = '$fPas'";

    if (!$result = $mysql->query($runQ)) {
        echo "Error, handle";
    }

    $rowCount = mysqli_num_rows($result);
    if ($rowCount == 1) {
        $_SESSION["admin"] = true;
        $_SESSION["username"] = $fNam;
    } else {
        echo "<script>
        alert('Username or Password incorrect')
        </script>";
//        echo $runQ;
        header("Refresh:0;url=index.php");
        exit;
    }
    header('refresh:0;url=index.php');
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
echo "<link rel=\"shortcut icon\" href=\"Red_Apple.ico\"/>";
echo "</head>";
include 'parts/pageTop.php';
include 'parts/pageNav.php';
echo "<body id = \"$fruitName\">";
if (isset($_SESSION['admin'])){

    echo "<div style=\"border: solid;text-align: center;margin-top:5%;padding-top: 2%;padding-bottom: 5%\">";
    echo "Welcome <br>";
    echo "<a href='logout.php'>logout</a>";
    echo "</div>";
}
else{
    include 'parts/login.php';
}


echo "</body>";


echo "</html>";

