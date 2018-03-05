<?php

session_start();
include('../service/connect_db.php');

$p_del_date = $_POST["p_del_date"];
$emp_id = $_POST["emp_id"];
$trans_id = $_POST["trans_id"];
$cus_id = $_POST["cus_id"];
$cus_order_id = $_POST["cus_order_id"];
$v_deorder_units = $_POST["v_deorder_units"];
$p_name = $_POST["p_name"];

$sql = 'DELETE FROM `customer_order` WHERE  cus_order_id = "' . $cus_order_id . '"';
$sql2 = 'DELETE FROM `customer_detail_order` WHERE  cus_order_id = "' . $cus_order_id . '"';

$result = mysqli_query($conn, $sql) or die("Error in query: $sql " . mysqli_error());
$result2 = mysqli_query($conn, $sql2) or die("Error in query: $sql2 " . mysqli_error());

$sql_insert = "INSERT INTO product_delivery(p_del_date,emp_id,trans_id)"
        . "VALUES ('$p_del_date','$emp_id','$trans_id')";
$result3 = mysqli_query($conn, $sql_insert);
$sql_select_product_delivery ="SELECT p_del_id FROM product_delivery";
$result_select = mysqli_query($conn, $sql_select_product_delivery);

while ($row = mysqli_fetch_array($result_select)) {
     $p_del_id = $row['p_del_id'];
}
$sql_insert2 = "INSERT INTO product_detail_delivery(cus_id,p_del_id,cus_order_id)"
        . "VALUES ('$cus_id','$p_del_id','$cus_order_id')";
$result4 = mysqli_query($conn, $sql_insert2) or die("Error in query: $sql_insert2 " . mysqli_error());
    
$sql_update = "UPDATE product SET p_qoh = '$v_deorder_units' WHERE p_name = '$p_name'";
$result5 = mysqli_query($conn, $sql_update) or die("Error in query: $sql_update " . mysqli_error());

if ($result && $result2&&$result3&&$result4&&$result5) {
    echo "<script language=\"JavaScript\">";
   echo "window.location =  '../send_product.php';";
    echo "</script>";
} else {
    echo "<script type='text/javascript'>";
    echo "alert('Error!');";
   echo "</script>";
}
?>




