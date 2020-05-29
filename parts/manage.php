<?php

$username = $_SESSION['username'];
$sql_add = "SELECT * FROM sport_record WHERE username = '$username'";


if (isset($_REQUEST['sort_by_duration'])) {
    $keyword = 'duration';
    $result = my_sort($mysqli, $keyword);

} elseif (isset($_REQUEST['sort_by_avgspeed'])) {
    $keyword = 'average_speed';
    $result = my_sort($mysqli, $keyword);
} elseif (isset($_REQUEST['check_confirm'])) {
    $list = $_REQUEST['checks'];
    if ($list == null) {
        echo "<script>
        alert('Please choose option(s)')
        </script>";
        header('refresh:0;url = manage.php');
        exit;
    }
    $result = my_filter($mysqli, $list);
} else {
    if (!$result = $mysqli->query($sql_add)) {
        echo "Error <br>";
        echo $sql_add;
    }
}

function my_sort($mysql, $keyword)
{
    $username = $_SESSION['username'];
    $sort_by = "select * from sport_record where username = '$username' order by $keyword desc";
    if (!$result = $mysql->query($sort_by)) {
        echo "Error <br>";
        echo $sort_by;
    }
    echo "<script>
        alert('Operation Successfully')
        </script>";
    return $result;
}

function my_filter($mysql, $list)
{
    $username = $_SESSION['username'];
    $query_list = implode(",", $list);
    $query_list = $query_list;
    $sql = "select id,username,$query_list from sport_record where username = '$username'";
    if (!$result = $mysql->query($sql)) {
        echo "Error <br>";
        echo $sql;
    }
    echo "<script>
        alert('Operation Successfully')
        </script>";
    return $result;
}

echo "<div style=\"border: solid;text-align: center;margin-top:5%;padding-left: 2%;padding-right: 2%; padding-top: 2%; padding-bottom: 2%\">";
echo "<form action = 'manage.php' method = 'post'>";
echo "<div style='text-align: right'>";
echo "<button class='btn'  type=\"submit\" name=\"sort_by_duration\">Sort by Duration↓</button>";
echo "<button class='btn' style='margin-left: 5px' type=\"submit\" name=\"sort_by_avgspeed\">Sort by Average Speed↓</button>";
echo "</div>";
echo "</form>";
echo "<form action = 'manage.php' method = 'post'style='text-align: left'>";
echo "<input type=\"checkbox\" name=\"checks[]\" value='sport_type'>Sport</input>";
echo "<input  type=\"checkbox\" name=\"checks[]\" value='duration'>Duration</input>";
echo "<input  type=\"checkbox\" name=\"checks[]\" value='distance'>Distance</input>";
echo "<input  type=\"checkbox\" name=\"checks[]\" value='start_time'>Starttime</input>";
echo "<input  type=\"checkbox\" name=\"checks[]\" value='average_speed'>avgSpeed</input>";
echo "<input  type=\"checkbox\" name=\"checks[]\" value='calories'>Calories</input>";
echo "<input  type=\"checkbox\" name=\"checks[]\" value='share'>Share</input>";
echo "<button  class='btn' style='margin-left: 5px' type=\"submit\" name=\"check_confirm\">Filter</button>";
echo "</form>";
echo "<form action = './add.php' method = 'post'>";
echo "<div style='text-align: right; padding-bottom: 5px'>";
echo "<button class='btn'  type=\"submit\" name=\"delete\">Delete</button>";
echo "<button class='btn'  type=\"submit\" name=\"update\">Update</button>";
echo "<button class='btn'  type=\"submit\" name=\"add\">Add</button>";
echo "</div>";
echo "<table>";
echo "   <tr>";
echo "       <th>ID Num</th>";
echo "       <th>User</th>";
echo "       <th>Sport</th>";
echo "       <th>Duration</th>";
echo "       <th>Distance</th>";
echo "       <th>StartTime</th>";
echo "       <th>avgSpeed</th>";
echo "       <th>Calories</th>";
echo "       <th>Share</th>";
echo "       <th>Operation</th>";
echo "   </tr>";
while ($row = $result->fetch_assoc()) {
    $id = $row['id'];
    $user = $row['username'];
    $sport_type = $row['sport_type'];
    $start_time = $row['start_time'];
    $duration = $row['duration'];
    $distance = $row['distance'];
    $average_speed = $row['average_speed'];
    $calories = $row['calories'];
    $share = $row['share'];
    echo "<tr>";
    echo "<td>$id</td>";
    echo "<td>$user</td>";
    echo "<td>$sport_type</td>";
    echo "<td>$duration</td>";
    echo "<td>$distance</td>";
    echo "<td>$start_time</td>";
    echo "<td>$average_speed</td>";
    echo "<td>$calories</td>";
    echo "<td>$share</td>";
    echo "<td><input type='radio' name='select_id' value='$id'></td>";
    echo "</tr>";
}
echo "</form>";
echo "</div>";
?>






