<?php
if(isset($_SESSION['username']))
{
    echo 'login';
}
else
{
    header('Location:index.php');
}
?>
