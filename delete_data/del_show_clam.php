<?php

session_start();
include('../service/connect_db.php');

$v_claim_id = $_POST["v_claim_id"];
$sql = 'DELETE FROM `vendor_claim` WHERE  v_claim_id = "' . $v_claim_id . '"';
$sql2 = 'DELETE FROM `vendor_detail_claim` WHERE  v_claim_id = "' . $v_claim_id . '"';

$result = mysqli_query($conn, $sql) or die("Error in query: $sql " . mysqli_error());
$result2 = mysqli_query($conn, $sql2) or die("Error in query: $sql2 " . mysqli_error());


if ($result&&$result2) {
    echo "<script language=\"JavaScript\">";
    echo "window.location =  '../detail_claim.php';";
    echo "</script>";
} else {
    echo "<script type='text/javascript'>";
    echo "alert('Error!');";
    echo "</script>";
}
?>




