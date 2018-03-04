<?php
$conn = mysqli_connect("localhost","root","1234","mtec") or die("Error: " . mysqli_error($conn));
mysqli_query($conn, "SET NAMES 'utf8' ");
?>
