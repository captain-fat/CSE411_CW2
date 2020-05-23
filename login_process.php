<?php
include "parts/dbconnect.php";
session_start();
if (isset($_REQUEST['login'])){
    login($mysqli);
}
function login($mysql)
{
    $fNam = $_REQUEST['username'];
    $fPas = $_REQUEST['password'];
    if (($fNam=='')||($fPas=='')){
        header('refresh:3;url=login_process.php');
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
        header("Refresh:0;url=login.php");
        exit;
    }
    header('refresh:0;url=index.php');
}

