<?php

session_start();
include('../service/connect_db.php');

$v_order_id = $_POST["v_order_id"];
$sql = 'DELETE FROM `vendor_order` WHERE  v_order_id = "' . $v_order_id . '"';
$sql2 = 'DELETE FROM `vendor_detail_order` WHERE  v_order_id = "' . $v_order_id . '"';

$result = mysqli_query($conn, $sql) or die("Error in query: $sql " . mysqli_error());
$result2 = mysqli_query($conn, $sql2) or die("Error in query: $sql2 " . mysqli_error());


if ($result&&$result2) {
    echo "<script language=\"JavaScript\">";
    echo "window.location =  '../detail_vendor.php';";
    echo "</script>";
} else {
    echo "<script type='text/javascript'>";
    echo "alert('Error!');";
    echo "</script>";
}
?>




