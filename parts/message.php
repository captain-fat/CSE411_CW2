<?php

$username = $_SESSION['username'];
$sql_message = "SELECT * FROM message WHERE to_user = '$username'";
if (!$result = $mysqli->query($sql_message)) {
    echo "Error <br>";
    echo $sql_message;
}



echo "<form action = './message.php' method = 'post'>";
echo "<button style='float: right' type=\"submit\" name=\"delete\">Delete</button>";
echo "<button style='float: right' type=\"submit\" name=\"add\">Add</button>";
echo "<table>";
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

?>






