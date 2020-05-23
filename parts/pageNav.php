<?php
// all the array list and vars
//$titles = array('apple', 'orange', 'lemon', 'banana');
//$images = array("images/Red_Apple", "images/Orange-Whole-&-Split", "images/Lemon-Whole-Split", "images/Bananas");

// functions
function showNav($titles){
    echo "<nav>";
	echo "<table>";
    echo "<div class = \"nav_bar\">";
    for ($i=0; $i < count($titles); $i++) {
        echo"<th><a href=\"$titles[$i].php\">$titles[$i]</a></th>";
    }
    echo "</div>";
	echo "</table>";
	echo "</nav>";
}





showNav($titles_nav);



