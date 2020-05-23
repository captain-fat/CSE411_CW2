<?php
include "parts/dbconnect.php";
session_start();
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
        echo "please use another username";
        header('refresh:5;url=register.php');
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

