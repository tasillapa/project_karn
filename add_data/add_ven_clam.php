<?php
    session_start(); 
    include('../service/connect_db.php');
	
    $ven_id = $_REQUEST["ven_id"]; 
    $v_name = $_POST["v_name"]; 
    $v_claim_date = $_POST["date_name"]; //
    $order_name = $_POST['order_name'];  
	$v_order_id = $_POST['v_order_id'];  
	$v_id = $_POST['v_id'];
	$emp_id = $_POST['emp_id'];
	$emp_id = $_POST['name_num1'];
	
	
?>




