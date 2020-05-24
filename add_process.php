<?php
include "parts/dbconnect.php";
session_start();

if (isset($_REQUEST['delete'])){
    if (isset($_REQUEST['select_id']))
    {
        delete($mysqli);
    }else{
        echo "Please select a record";
        header("refresh:3; url=manage.php");
    }
}
if (isset($_REQUEST['add'])){
    add($mysqli);
}
if (isset($_REQUEST['update'])){
    if (isset($_REQUEST['select_id'])){
        echo "update";
        $records = search($mysqli);
        update($mysqli, $records);
        $sport = $records[0];
        $starttime = $records[1];
        $duration = $records[2];
        $distance = $records[3];
        $avg_speed = $records[4];
        $calories = $records[5];
        $share = $records[6];




    }else{
        echo "Please select a record";
        header("refresh:3; url=manage.php");
    }
}

function update($mysql){

}

function add($mysql){
    $username = $_SESSION['username'];
    $sport = $_REQUEST['sport'];
    $duration = $_REQUEST['duration'];
    $starttime = $_REQUEST['starttime2']." ".$_REQUEST['starttime1'];
    $avgSpeed = $_REQUEST['avgspeed'];
    $calories = $_REQUEST['calories'];
    $share = $_REQUEST['share'];
    $distance = $_REQUEST['distance'];
    $sql_add = "insert into sport_record (`username`, `sport_type`, `start_time`, `duration`, `distance`, `average_speed`, `calories`,
                `share`) values ('$username', '$sport', '$starttime', '$duration', '$distance', '$avgSpeed', '$calories', '$share')";
    if (!$result_add = $mysql->query($sql_add)) {
        echo "Error <br>";
        echo $sql_add;
    }else {
        echo "Add Successfully";
        header("refresh:5; url=manage.php");
    }
}

function search($mysql){
    $record = array();
    $id = $_REQUEST['select_id'];
    $sql = "select * from sport_record where id = '$id'";
    if (!$result = $mysql->query($sql)){
        echo "Error <br>";
        echo $sql;
    }
    while ($row = $result->fetch_assoc()) {
        $sport = $row['sport_type'];
        $starttime = $row['start_time'];
        $duration = $row['duration'];
        $distance = $row['distance'];
        $avg_speed = $row['average_speed'];
        $calories = $row['calories'];
        $share = $row['share'];
        $record = array($sport, $starttime, $duration, $distance, $avg_speed, $calories, $share);
    }
    return $record;

}








function delete($mysql){
    $delete_id = $_REQUEST['select_id'];
    $sql_delete = "delete from sport_record where id = '$delete_id'";
    if (!$result_delete = $mysql->query($sql_delete)) {
        echo "Error <br>";
        echo $sql_delete;
    }else {
        echo "Delete Successfully";
        header("refresh:3; url=manage.php");
    }
}
?>

