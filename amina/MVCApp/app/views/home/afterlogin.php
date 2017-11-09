<?php
session_start();
if(isset($_SESSION['username']))
{
?>
<html>
<body>
<table>
        <form name="logout" method="post">
            <h1>Hey <?php print_r($_SESSION['username'])?> !</h1>
        <tr>
            <td><input type="submit" name="logout" value="Logout"></td>
        </tr>
        </form>
    </table>
</body>
</html>
<?php
}
else
{
    echo 'session not found';
}
?>