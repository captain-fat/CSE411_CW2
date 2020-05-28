<?php
session_start();
include "parts/dbconnect.php";
$fruitName = "orange";

if (isset($_REQUEST['register'])){
    register($mysqli);
}
function register($mysql)
{
    $fNam = $_REQUEST['username'];
    $fPas = $_REQUEST['password'];
    if (($fNam=='')||($fPas=='')){
        echo "Please enter username or password";
        header('refresh:3;url=register.php');
        exit;
    }

    $runQ = "select username from user where username = '$fNam'";
    if (!$result = $mysql->query($runQ)) {
        echo "Error, handle";
    }
    $rowCount = mysqli_num_rows($result);
    if ($rowCount == 1) {
        echo "<script>
        alert('Username has already been used \\n Please use another username')
        </script>";
//
//        echo "please use another username";
//        header('refresh:5;url=register.php');
    }
    else{
        $sql_insert = "insert into user (`username`,`password`) values ('$fNam','$fPas')";

        if (!$result_insert = $mysql->query($sql_insert)) {
            echo "Error, handle <br>";
            echo $sql_insert;
        }

        echo "Register successfully <br>";
        echo "Username = $fNam <br>";
        echo "Password = $fPas ";

        header('refresh:3;url=index.php');

    }


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
echo"<body id = \"$fruitName\">";
include "parts/register.php";


echo"</body>";



echo "</html>";

