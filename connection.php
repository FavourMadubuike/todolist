<?php
$connect=mysqli_connect("localhost", "root", "", "todolist");
if (!$connect) {
    die("connection failed". mysqli_connect_error());
}
else {
    $msg="connection successful";
}
?>