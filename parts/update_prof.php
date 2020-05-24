<?php

echo "<form action=\"./profile.php\" method=\"post\">";
echo "   <table>";
echo "       <tr>";
echo "           <th>Username</th>";
echo "           <td>$username</td>";
echo "       </tr>";
echo "       <tr>";
echo "           <th>Password</th>";
echo "           <td><input type=\"password\" name = 'password' value='$password'></td>";
echo "       </tr>";
echo "       <tr>";
echo "           <th>Full Name</th>";
echo "           <td><input type=\"text\" name='full_name' value='$full_name'></td>";
echo "       </tr>";
echo "       <tr>";
echo "           <th>Profile</th>";
echo "           <td><input type=\"text\" name='profile' value='$profile'></td>";
echo "       </tr>";
echo "   </table>";
echo "   <div style=\"text-align: center\">";
echo "   <button type=\"submit\" name=\"update_prof_confirm\">Save</button>";
echo "   <button type=\"reset\">Reset</button>";
echo "   </div>";
echo "</form>";

