<?php
$username = $_SESSION['username'];
$sql_prof = "SELECT * FROM user WHERE username = '$username'";
$sql_prof_dis = "SELECT SUM(distance) from sport_record where username = '$username'";
$sql_prof_cal = "SELECT SUM(calories) from sport_record where username = '$username'";
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

?>
<form action="./profile.php" method="post">
    <button type="submit" name="update_prof">Update</button>
</form>



