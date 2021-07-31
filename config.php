<?php
$conn = mysqli_connect("db", "root", "root", "medico");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>
