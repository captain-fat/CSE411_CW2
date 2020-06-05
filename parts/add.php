<div style="border: solid;text-align: center;margin-top:5%;padding-top: 2%;padding-bottom: 5%">
    <h1>Add Sport Record</h1>
    <form action="./add.php" method="get">
        <table style="margin-left: 30%;width: 40%;border-width: 0;margin-bottom: 15px">
            <tr>
                <td>Sport</td>
                <td><input type="text" name="sport" placeholder="basketball"
                           onkeyup="value=value.replace(/[^0-9a-zA-Z_]/g,'')" required="required"></td>
            </tr>
            <tr>
                <td>Duration</td>
                <td><input type="text" name="duration" placeholder="10"
                           onkeyup="value=value.replace(/[^0-9]/g, '')" required=" required">
                </td>
            </tr>
            <tr>
                <td>StartTime</td>
                <td><input type="time" name="starttime1" required="required"></td>
            </tr>
            <tr>
                <td>Date</td>
                <td><input type="date" name="starttime2" required="required"></td>
            </tr>
            <tr>
                <td>avgSpeed</td>
                <td><input type="text" name="avgspeed" placeholder="10" onkeyup="value=value.replace(/[^0-9]/g, '')"
                           required="required">
                </td>
            </tr>
            <tr>
                <td>Distance</td>
                <td><input type="text" name="distance" placeholder="10" onkeyup="value=value.replace(/[^0-9]/g, '')"
                           required="required">
                </td>
            </tr>
            <tr>
                <td>calories</td>
                <td><input type="text" name="calories" placeholder="10" onkeyup="value=value.replace(/[^0-9]/g, '')"
                           required="required">
                </td>
            </tr>
            <tr>
                <td>share (0 or 1)</td>
                <td><input type="text" name="share" placeholder="1" onkeyup="value=value.replace(/[^0-1]/g, '')"
                           maxlength="1" required="required"></td>
            </tr>
        </table>
        <button class='btn' style="margin-right: 20px" type="submit" name="add_confirm">Save</button>
        <button class='btn' type="reset">reset</button>

    </form>
</div>
