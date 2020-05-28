<?php
error_reporting(E_ALL^E_NOTICE^E_WARNING);
###############sql##############
//head picture
$username = $_SESSION['username'];
$runsql = "SELECT * FROM sportsheader";
if (!$result = $mysqli->query($runsql)) {
    echo "Error";
}
$runsql_nav = "SELECT * FROM sportsnav";
$titles = array();
$images = array();
while ($row = $result->fetch_assoc()) {
    $title = $row['title'];
    $image = $row['image'];
    $titles[] = $title;
    $images[] = $image;
}
//head nav
$titles_nav = array();
if (!$result_nav = $mysqli->query($runsql_nav)) {
    echo "Error";
}
while ($row = $result_nav->fetch_assoc()) {
    $title = $row['nav_title'];
    $titles_nav[] = $title;
}
//$result->free();
//$mysqli->close();
#####################################
$title = "Need for Sports";

// functions
function displayHeadImg($titles, $images){
    echo "<section id = \"headsection\">";
    for ($i=0; $i < count($titles); $i++) {
        echo"<img class = \"Imgtest_title\" src = \"$images[$i].png\">";
    }
    echo "</section>";
}


//page

//title part
echo "<header style='padding-bottom: 2%'>";
echo "<div style='padding-top: .5%'>";
echo "<h1>$title</h1>";
echo "</div>";
displayHeadImg($titles, $images);
echo "<div style='margin-top: 10px'>";
if (isset($username)){
    echo "Hello, $username<br>";
    echo "<a href='logout.php'>logout</a>";
}
echo "</div>";
echo "</header>";


