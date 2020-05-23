<?php
$username = $_SESSION['username'];
$sql_prof = "SELECT * FROM user WHERE username = '$username'";
if (!$result = $mysqli->query($sql_prof)) {
    echo "Error <br>";
    echo $sql_prof;
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
echo "</table>";

?>
<!--<table>-->
<!--    <tr>-->
<!--        <th>Username</th>-->
<!--        <th>Name</th>-->
<!--        <th>Profile Text</th>-->
<!--    </tr>-->
<!--    <tr>-->
<!--        <td>1</td>-->
<!--        <td>1</td>-->
<!--        <td>1</td>-->
<!--    </tr>-->
<!--</table>-->


