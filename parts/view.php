<?php

$username = $_SESSION['username'];
$sql_view = "SELECT * FROM sport_record WHERE share = 1";

if (isset($_REQUEST['sort_by_duration'])) {
    $keyword = 'duration';
    $result = my_sort($mysqli, $keyword);

} elseif (isset($_REQUEST['sort_by_distance'])) {
    $keyword = 'distance';
    $result = my_sort($mysqli, $keyword);
} elseif (isset($_REQUEST['confirm'])) {
    $type = $_REQUEST['filter'];
    $keyword = $_REQUEST['type'];
    if ($type == 'user') {
        $type = 'username';
    }
    if ($type == 'sport') {
        $type = 'sport_type';
    }
    $result = my_filter($mysqli, $keyword, $type);
} else {
    if (!$result = $mysqli->query($sql_view)) {
        echo "Error <br>";
        echo $sql_view;
    }
}
function my_sort($mysql, $keyword)
{
    $sort_by = "select * from sport_record where share = '1' order by $keyword desc";
    if (!$result = $mysql->query($sort_by)) {
        echo "Error <br>";
        echo $sort_by;
    }
    echo "<script>
        alert('Operation Successfully')
        </script>";
    return $result;
}

function my_filter($mysql, $keyword, $type)
{
    $filter = "select * from sport_record where share = 1 and $type = '$keyword'";
    if ($keyword == null) {
        echo "<script>
        alert('Please enter a keyword')
        </script>";
        header("refresh:0; url = view.php");
        exit;
    }
    if (!$result = $mysql->query($filter)) {
        echo "Error <br>";
        echo $filter;
    }
    $rowCount = mysqli_num_rows($result);
    if ($rowCount != 0) {
        echo "<script>
        alert('Operation Successfully')
        </script>";
        return $result;
    } else {
        echo "<script>
        alert('Wrong Keywords!')
        </script>";
        header("refresh:0;url=view.php");
    }

}

echo "<div style=\"border: solid;text-align: center;margin-top:5%;padding-left: 2%;padding-right: 2%; padding-top: 2%; padding-bottom: 2%\">";
echo "<form style='text-align: right; margin-right: 5px' action = 'view.php' method = 'post'>";
echo "Find by <input style='text-align: right; margin-right: 5px; width: 80px' type='text' name='type'>";
echo "<select style='text-align: right; margin-right: 5px' name='filter' id = 'filter'>";
echo "<option name = 'user' value = 'user'>User</option>";
echo "<option name = 'sport' value = 'sport'>Sport</option>";
echo "</select>";
echo "<button class='btn' style='text-align: right' type=\"submit\" name=\"confirm\">Confirm</button>";
echo "</form>";
echo "<form action = 'view.php' method = 'post' style='text-align: right; margin-top: 5px'>";
echo "<button class='btn'  style='margin-right: 5px' type=\"submit\" name=\"sort_by_duration\">Sort by Duration↓</button>";
echo "<button class='btn'  type=\"submit\" name=\"sort_by_distance\">Sort by Distance↓</button>";
echo "</form>";

echo "<table style='margin-top: 5px'>";
echo "   <tr>";
echo "       <th>ID Num</th>";
echo "       <th>User</th>";
echo "       <th>Sport</th>";
echo "       <th>Duration</th>";
echo "       <th>Distance</th>";
echo "       <th>StartTime</th>";
echo "       <th>avgSpeed</th>";
echo "       <th>Calories</th>";
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
    echo "<tr>";
    echo "<td>$id</td>";
    echo "<td>$user</td>";
    echo "<td>$sport_type</td>";
    echo "<td>$duration</td>";
    echo "<td>$distance</td>";
    echo "<td>$start_time</td>";
    echo "<td>$average_speed</td>";
    echo "<td>$calories</td>";
    echo "</tr>";
}
echo "</div>";










