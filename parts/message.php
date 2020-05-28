<?php

$username = $_SESSION['username'];
$sql_message = "SELECT * FROM message WHERE to_user = '$username'";
if (!$result = $mysqli->query($sql_message)) {
    echo "Error <br>";
    echo $sql_message;
}


echo "<div style=\"border: solid;text-align: center;margin-top:5%;padding-left: 2%;padding-right: 2%; padding-top: 2%; padding-bottom: 2%\">";
echo "<form action = './message.php' method = 'post' style='text-align: right'>";
echo "<button class='btn' style='margin-right: 5px' type=\"submit\" name=\"add\">Add</button>";
echo "<button class='btn' type=\"submit\" name=\"delete\">Delete</button>";
echo "<table style='margin-top: 5px'>";
echo "   <tr>";
echo "       <th>Sender</th>";
echo "       <th>Message</th>";
echo "       <th>Operation</th>";
echo "   </tr>";
while ($row = $result->fetch_assoc()) {
    $from = $row['from_user'];
    $message = $row['message'];
    $id = $row['id'];
    echo "<tr>";
    echo "<td>$from</td>";
    echo "<td>$message</td>";
    echo "<td><input type='radio' name='select_id' value='$id'></td>";
    echo "</tr>";
}
echo "</form>";
echo "</div>";
?>






