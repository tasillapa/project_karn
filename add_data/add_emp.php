<?php
	session_start();
	
	include('../service/connect_db.php');

	
    $department_id = $_REQUEST["department_id"];
	$rank_id     = $_REQUEST["rank_id"];
	$Mr_Mrs = $_REQUEST["Mr_Mrs"];
    $fname      = $_REQUEST["fname"];
    $lname      = $_REQUEST["lname"];
    $gender     = $_REQUEST["gender"];
    $address    = $_REQUEST["address"];
    $pe_id      = $_REQUEST["pe_id"];
    $nat_id     = $_REQUEST["nat_id"];
    $phone_id   = $_REQUEST["phone_id"];
    $date       = $_REQUEST["date"];
    $account    = $_REQUEST["account"];
    $eduction   = $_REQUEST["eduction"];
    $social_se  = $_REQUEST["social_se"];
    $fday       = $_REQUEST["fday"];




	//table1
	$check = "SELECT * FROM employee WHERE emp_fname='$fname'";
	$result = mysqli_query($conn,$check) or die ("Error in query: $check " .mysqli_error($conn));
	$num = mysqli_num_rows($result);
	
	if($num=0)
	{
	
		
		echo "<script language=\"JavaScript\">";
		echo "alert('Add already exists!!');window.location ='login.php';";
		echo "</script>";
	}
	else{

	$sql = "INSERT INTO employee(dep_id,rank_id,emp_name_title,emp_fname,emp_lname,emp_gender,emp_address,emp_idcard,emp_nationality,emp_tel,emp_birthday,emp_account,emp_edu,emp_socialsecurity,emp_firstdaywork) 
			VALUES('$department_id','$rank_id','$Mr_Mrs','$fname','$lname','$gender','$address','$pe_id','$nat_id','$phone_id','$date','$account','$eduction','$social_se','$fday')";
	$result = mysqli_query($conn,$sql) or die ("Error in query: $sql " .mysqli_error());

	if($result){
		//echo"Record Add Successfully";
		echo "<script language=\"JavaScript\">";
		echo "alert('Save Successfuly');window.location ='../show_emp.php';";
		echo "</script>";
	}
	else{
		echo "<script type='text/javascript'>";
		echo "alert('Error!');";
		echo "</script>";
	}
	}


?>