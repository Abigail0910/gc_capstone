<?php
    $connection = mysqli_connect("localhost", "root", "", "db_web");
if(isset($_POST["btnLogin"]))
{
    $username = $_POST["username"];
    $password = $_POST["password"];

    echo $username;
}

?>
