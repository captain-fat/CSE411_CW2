<?php

$username = $_SESSION['username'];
$sql_add = "SELECT * FROM sport_record WHERE username = '$username'";
if (!$result = $mysqli->query($sql_add)) {
    echo "Error <br>";
    echo $sql_add;
}
echo "<form action = './add.php' method = 'post'>";
echo "<button style='float: right' type=\"submit\" name=\"delete\">Delete</button>";
echo "<button style='float: right' type=\"submit\" name=\"update\">Update</button>";
echo "<button style='float: right' type=\"submit\" name=\"add\">Add</button>";
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

?>






