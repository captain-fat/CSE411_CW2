<?php
$username = $_SESSION['username'];
$sql_prof = "SELECT * FROM user WHERE username = '$username'";
$sql_prof_dis = "SELECT SUM(distance) from sport_record where username = '$username'";
$sql_prof_cal = "SELECT SUM(calories) from sport_record where username = '$username'";
$sql_add = "SELECT * FROM sport_record WHERE username = '$username'";
if (!$result = $mysqli->query($sql_prof)) {
    echo "Error <br>";
    echo $sql_prof;
}
if (!$result_dis = $mysqli->query($sql_prof_dis)) {
    echo "Error <br>";
    echo $sql_prof_dis;
}
if (!$result_cal = $mysqli->query($sql_prof_cal)) {
    echo "Error <br>";
    echo $sql_prof_cal;
}
if (!$result_record = $mysqli->query($sql_add)) {
    echo "Error <br>";
    echo $sql_add;
}
while ($row_dis = $result_dis->fetch_assoc()) {
    $distance = $row_dis['SUM(distance)'];
}
while ($row_cal= $result_cal->fetch_assoc()) {
    $calories = $row_cal['SUM(calories)'];
}
while ($row = $result->fetch_assoc()) {
    $full_name = $row['full_name'];
    $prof = $row['profile'];
}
echo "<table>";
echo "   <tr>";
echo "       <th>Username</th>";
echo "       <td>$username</td>";
echo "   </tr>";
echo "   <tr>";
echo "       <th>Name</th>";
echo "       <td>$full_name</td>";
echo "   </tr>";
echo "   <tr>";
echo "       <th>Profile Text</th>";
echo "       <td>$prof</td>";
echo "   </tr>";
echo "   <tr>";
echo "       <th>Total Travel Distance</th>";
echo "       <td>$distance</td>";
echo "   </tr>";
echo "   <tr>";
echo "       <th>Total Burned Calories</th>";
echo "       <td>$calories</td>";
echo "   </tr>";
echo "</table>";


echo "<form action=\"./profile.php\" method=\"post\">";
echo "<button type=\"submit\" name=\"update_prof\">Update</button>";
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
        echo "       <th>Share</th>";
        echo "   </tr>";
    while ($row = $result_record->fetch_assoc()) {
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
        echo "</tr>";
    }
    echo "</form>";



