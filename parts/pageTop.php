<?php
###############sql##############
//head picture
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
$name = "Yifan";
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
echo "<header>";
echo "<h1>$title</h1>";
displayHeadImg($titles, $images);
echo "say hello to ", $name;
echo "</header>";


