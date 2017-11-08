<?php
session_start();
if(isset($_SESSION['username']))
{
?>

<html>
<head>
    <title>MVC</title>
</head>
<body>

    <p>
        <strong>Welcome to the home/index view</strong>
    </p>
    <p><?=$data['name']?> is <?=$data['mood']?></p>
</body>
</html>
    <?php
}
else
{
    echo 'session not found';
}
?>