<?php

session_start();
include('../service/connect_db.php');

$v_order_id = $_POST["v_order_id"];
$v_deorder_units = $_POST["v_deorder_units"];
$v_mat_date = $_POST["v_mat_date"];
$emp_id = $_POST["emp_id"];
$v_id = $_POST["v_id"];
$price = $_POST["price"];
$p_name = $_POST["p_name"];

$sql = 'DELETE FROM `vendor_order` WHERE  v_order_id = "' . $v_order_id . '"';
$sql2 = 'DELETE FROM `vendor_detail_order` WHERE  v_order_id = "' . $v_order_id . '"';

$result = mysqli_query($conn, $sql) or die("Error in query: $sql " . mysqli_error());
$result2 = mysqli_query($conn, $sql2) or die("Error in query: $sql2 " . mysqli_error());

$sql_insert = "INSERT INTO vendor_material(v_mat_date,v_order_id,emp_id,v_id)"
       . "VALUES ('$v_mat_date','$v_order_id','$emp_id','$v_id')";
$result3 = mysqli_query($conn, $sql_insert) or die("Error in query: $sql_insert " . mysqli_error());

$sql_update ="UPDATE product SET p_qoh = '$v_deorder_units' WHERE p_name = '$p_name'";
$result4 = mysqli_query($conn, $sql_update) or die("Error in query: $sql_update " . mysqli_error());

if ($result && $result2&&$result3&&$result4) {
    echo "<script language=\"JavaScript\">";
    echo "window.location =  '../import_product.php';";
    echo "</script>";
} else {
    echo "<script type='text/javascript'>";
    echo "alert('Error!');";
    echo "</script>";
}
?>




