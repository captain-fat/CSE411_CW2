<?php
session_start();
include "parts/dbconnect.php";
$fruitName = "orange";


if (isset($_REQUEST['delete'])){
    if (isset($_REQUEST['select_id']))
    {
        delete($mysqli);
    }else{
        echo "Please select a record";
        header("refresh:3; url=message.php");
    }
}
if (isset($_REQUEST['add_confirm'])){
    add_message($mysqli);
}

function delete($mysql){
    $delete_id = $_REQUEST['select_id'];
    $sql_delete = "delete from message where id = '$delete_id'";
    if (!$result_delete = $mysql->query($sql_delete)) {
        echo "Error <br>";
        echo $sql_delete;
    }else {
        echo "Delete Successfully";
        header("refresh:3; url=manage.php");
    }
}

function add_message($mysql){
    $username = $_SESSION['username'];
    $receiver = $_REQUEST['receiver'];
    $message = $_REQUEST['message'];
    $sql_search = "select * from user where username = '$receiver'";
    if (!$result_search = $mysql->query($sql_search)) {
        echo "Error <br>";
        echo $sql_search;
    }
    $rowCount = mysqli_num_rows($result_search);
    if ($rowCount == 0){
        echo "<script>
        alert('Please check the username you want to send message to')
        </script>";
        header("refresh:0; url=message.php");
        exit;
    }
    $sql_send = "insert into message (`from_user`, `to_user`, `message`) values ('$username', '$receiver', '$message')";
    if (!$result_send = $mysql->query($sql_send)) {
        echo "Error <br>";
        echo $sql_send;
    }
    echo "<script>
        alert('Send successfully')
        </script>";
//    echo "Send successfully <br>";
//    echo "Receiver = $receiver <br>";
//    echo "Message = $message ";
//    echo $sql_send;
    header("refresh:0 url=message.php");
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
echo"<body id = \"$fruitName\">";
if (isset($_SESSION['admin']) && !isset($_REQUEST['add'])){
    include 'parts/message.php';
}
if (isset($_SESSION['admin']) && isset($_REQUEST['add'])){
    include 'parts/add_message.php';
}
if (!isset($_SESSION['admin'])){
    echo "please <a href='index.php'>login</a>";
    header('refresh:3;url=index.php');
}



echo"</body>";



echo "</html>";

