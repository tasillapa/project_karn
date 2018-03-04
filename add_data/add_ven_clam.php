<?php

session_start();
include('../service/connect_db.php');

    $v_claim_id = $_REQUEST["v_claim_id"];
    $v_id = $_POST["v_id"];
    $emp_id = $_POST["emp_id"]; //
    $v_claim_date = $_POST['v_claim_date'];
    $v_order_id = $_POST['v_order_id'];
    $p_name = $_POST['order1'];
    $v_declaim_quantity= $_POST['v_declaim_quantity'];
    $detail_clam = $_POST['detail_clam'];
    
    
    $sql = "INSERT INTO  vendor_claim(v_claim_id,v_id,emp_id,v_claim_date)
            VALUES('$v_claim_id','$v_id','$emp_id','$v_claim_date')";
    $sql2 = "INSERT INTO  vendor_detail_claim(v_order_id,v_claim_id,p_name,v_declaim_quantity,detail_clam)
            VALUES('$v_order_id','$v_claim_id','$p_name','$v_declaim_quantity','$detail_clam')";
    
    $result = mysqli_query($conn,$sql) or die ("Error in query: $sql " .mysqli_error());
    $result2 = mysqli_query($conn,$sql2) or die ("Error in query: $sql2 " .mysqli_error());
    
     if ($result) {

        echo "<script language=\"JavaScript\">";
        echo "alert('Save Successfuly');window.location ='../detail_claim.php';";
        echo "</script>";
      } else {
            echo "<script type='text/javascript'>";
            echo "alert('Error!');";
            echo "</script>";
        }
?>




