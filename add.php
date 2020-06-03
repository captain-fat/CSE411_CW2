<?php
session_start();
include "parts/dbconnect.php";
$fruitName = "orange";
$sport = null;
$starttime = null;
$duration = null;
$distance = null;
$avg_speed = null;
$calories = null;
$share = null;
$Select_id = null;
###################################################
if (isset($_REQUEST['delete'])) {
    if (isset($_REQUEST['select_id'])) {
        delete($mysqli);
    } else {
        echo "Please select a record";
        header("refresh:3; url=manage.php");
    }
}
if (isset($_REQUEST['add_confirm'])) {
    add($mysqli);
}

if (isset($_REQUEST['update'])) {
    if (isset($_REQUEST['select_id'])) {
        echo "update";
        $records = search($mysqli);
        $sport = $records[0];
        $starttime = $records[1];
        $duration = $records[2];
        $distance = $records[3];
        $avg_speed = $records[4];
        $calories = $records[5];
        $share = $records[6];
        $Select_id = $records[7];
    } else {
        echo "<script>
        alert('Please select a record')
        </script>";
        header("refresh:0; url=manage.php");
    }
}

if (isset($_REQUEST['update_confirm'])) {
    update($mysqli);
}

function update($mysql)
{
    $id = $_REQUEST['id'];
    $sport = $_REQUEST['sport'];
    $duration = $_REQUEST['duration'];
    $starttime = $_REQUEST['starttime2'] . " " . $_REQUEST['starttime1'];
    $avgSpeed = $_REQUEST['avgspeed'];
    $calories = $_REQUEST['calories'];
    $share = $_REQUEST['share'];
    $distance = $_REQUEST['distance'];
    $sql_update = "update sport_record set `sport_type` = '$sport', `start_time` = '$starttime', `duration` = '$duration',
                    `distance` = '$distance', `average_speed` = '$avgSpeed', `calories` = '$calories', `share` = '$share'
                    where id = '$id'";
    if (!$result_add = $mysql->query($sql_update)) {
        echo "Error <br>";
        echo $sql_update;
    } else {
        echo "<script>
        alert('Update Successfully')
        </script>";
        header("refresh:0; url=manage.php");
    }

}

function add($mysql)
{
    $username = $_SESSION['username'];
    $sport = $_REQUEST['sport'];
    $duration = $_REQUEST['duration'];
    $starttime = $_REQUEST['starttime2'] . " " . $_REQUEST['starttime1'];
    $avgSpeed = $_REQUEST['avgspeed'];
    $calories = $_REQUEST['calories'];
    $share = $_REQUEST['share'];
    $distance = $_REQUEST['distance'];
    $sql_add = "insert into sport_record (`username`, `sport_type`, `start_time`, `duration`, `distance`, `average_speed`, `calories`,
                `share`) values ('$username', '$sport', '$starttime', '$duration', '$distance', '$avgSpeed', '$calories', '$share')";
    if (!$result_add = $mysql->query($sql_add)) {
        echo "Error <br>";
        echo $sql_add;
    } else {
        echo "<script>
        alert('Add Successfully')
        </script>";
        header("refresh:0; url=manage.php");
    }
}


function search($mysql)
{
    $record = array();
    $id = $_REQUEST['select_id'];
    $sql = "select * from sport_record where id = '$id'";
    if (!$result = $mysql->query($sql)) {
        echo "Error <br>";
        echo $sql;
    }
    while ($row = $result->fetch_assoc()) {
        $id = $row['id'];
        $sport = $row['sport_type'];
        $starttime = $row['start_time'];
        $duration = $row['duration'];
        $distance = $row['distance'];
        $avg_speed = $row['average_speed'];
        $calories = $row['calories'];
        $share = $row['share'];
        $record = array($sport, $starttime, $duration, $distance, $avg_speed, $calories, $share, $id);
    }
    return $record;

}


function delete($mysql)
{
    $delete_id = $_REQUEST['select_id'];
    $sql_delete = "delete from sport_record where id = '$delete_id'";
    if (!$result_delete = $mysql->query($sql_delete)) {
        echo "Error <br>";
        echo $sql_delete;
    } else {
        echo "<script>
        alert('Delete Successfully')
        </script>";
        header("refresh:0; url=manage.php");
    }
}

###############################################

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
if (isset($_REQUEST['add'])) {
    include "parts/add.php";
}
if (isset($_REQUEST['update'])) {
    if (isset($_REQUEST['select_id'])) {
        include "parts/update.php";
    }

}


echo "</body>";


echo "</html>";

