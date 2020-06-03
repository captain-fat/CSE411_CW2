<?php

function showNav($titles)
{
    echo "<nav>";
    echo "<table>";
    echo "<div class = \"nav_bar\">";
    for ($i = 0; $i < count($titles); $i++) {
        echo "<th><a href=\"$titles[$i].php\">$titles[$i]</a></th>";
    }
    echo "</div>";
    echo "</table>";
    echo "</nav>";
}


showNav($titles_nav);



