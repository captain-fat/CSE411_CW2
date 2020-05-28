<?php
error_reporting(E_ALL^E_NOTICE^E_WARNING);
?>


<div style="border: solid;text-align: center;margin-top:5%;padding-top: 2%;padding-bottom: 5%">
    <h1>Login</h1>
    <form action="./index.php" method="post">
        <table style="margin-left: 30%;width: 40%;border-width: 0;margin-bottom: 15px">
            <tr>
                <td>
                    Username
                </td>
                <td>
                    <input type="text" name="username" placeholder="username" value="admin">
                </td>
            </tr>
            <tr>
                <td>
                    Password
                </td>
                <td>
                    <input type="password" name="password" value="admin">
                </td>
            </tr>
        </table>
        <button class="btn" style="margin-right: 20px" type="submit" name="login">submit</button>
        <a href="./register.php">
            <button class="btn" type="button" value="register">register</button>
        </a>

    </form>
</div>
