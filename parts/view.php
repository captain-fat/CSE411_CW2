<?php

$username = $_SESSION['username'];
$sql_view = "SELECT * FROM sport_record WHERE share = 1";

if (isset($_REQUEST['sort_by_duration'])){
    $keyword = 'duration';
    $result = my_sort($mysqli, $keyword);

}
elseif(isset($_REQUEST['sort_by_distance'])){
    $keyword = 'distance';
    $result = my_sort($mysqli, $keyword);
}
elseif(isset($_REQUEST['confirm'])){
    $type =$_REQUEST['filter'];
    $keyword = $_REQUEST['type'];
    if ($type == 'user'){
        $type = 'username';
    }
    if ($type == 'sport'){
        $type = 'sport_type';
    }
    $result = my_filter($mysqli, $keyword, $type);
}
else{
    if (!$result = $mysqli->query($sql_view)) {
        echo "Error <br>";
        echo $sql_view;
    }
}
function my_sort($mysql,$keyword){
    $sort_by = "select * from sport_record where share = '1' order by $keyword desc";
    if (!$result = $mysql->query($sort_by)){
        echo "Error <br>";
        echo $sort_by;
    }
    echo "<script>
        alert('Operation Successfully')
        </script>";
    return $result;
}

function my_filter($mysql, $keyword, $type){
    $filter = "select * from sport_record where share = 1 and $type = '$keyword'";
    if($keyword == null){
        echo "<script>
        alert('Please enter a keyword')
        </script>";
        header("refresh:0; url = view.php");
        exit;
    }
    if (!$result = $mysql->query($filter)){
        echo "Error <br>";
        echo $filter;
    }
    $rowCount = mysqli_num_rows($result);
    if ($rowCount != 0){
        echo "<script>
        alert('Operation Successfully')
        </script>";
        return $result;
    }else{
        echo "<script>
        alert('Wrong Keywords!')
        </script>";
        header("refresh:0;url=view.php");
    }

}

echo "<div style=\"border: solid;text-align: center;margin-top:5%;padding-left: 2%;padding-right: 2%; padding-top: 2%; padding-bottom: 2%\">";
echo "<form style='float:left' action = 'view.php' method = 'post'>";
echo "<input style='float:left' type='text' name='type'>";
echo "<select style='float:left' name='filter' id = 'filter'>";
echo "<option name = 'user' value = 'user'>User</option>";
echo "<option name = 'sport' value = 'sport'>Sport</option>";
echo "</select>";
echo "<button style='float: left' type=\"submit\" name=\"confirm\">Confirm</button>";
echo "</form>";
echo "<form action = 'view.php' method = 'post'>";
echo "<button style='float: right' type=\"submit\" name=\"sort_by_duration\">Sort by Duration↓</button>";
echo "<button style='float: right' type=\"submit\" name=\"sort_by_distance\">Sort by Distance↓</button>";
echo "</form>";

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










