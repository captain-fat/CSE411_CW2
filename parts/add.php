
<div style="border: solid;text-align: center;margin-top:5%;padding-top: 2%;padding-bottom: 5%">
    <h1>Add Sport Record</h1>
<form action="./add.php" method="get">
    <table style="margin-left: 30%;width: 40%;border-width: 0;margin-bottom: 15px">
        <tr>
            <td>Sport</td>
            <td><input type="text" name="sport" placeholder="basketball"></td>
        </tr>
        <tr>
            <td>Duration</td>
            <td><input type="text" name="duration"></td>
        </tr>
        <tr>
            <td>StartTime</td>
            <td><input type="time" name="starttime1"></td>
        </tr>
        <tr>
            <td>Date</td>
            <td><input type="date" name="starttime2"></td>
        </tr>
        <tr>
            <td>avgSpeed</td>
            <td><input type="text" name="avgspeed"></td>
        </tr>
        <tr>
            <td>Distance</td>
            <td><input type="text" name="distance"></td>
        </tr>
        <tr>
            <td>calories</td>
            <td><input type="text" name="calories"></td>
        </tr>
        <tr>
            <td>share (0 or 1)</td>
            <td><input type="text" name="share" onkeyup="value=value.replace(/[^0-1]/g, '')" maxlength="1"></td>
        </tr>
    </table>
    <button style="margin-right: 20px" type="submit" name="add_confirm">Save</button>
    <button type="reset">reset</button>

</form>
</div>
