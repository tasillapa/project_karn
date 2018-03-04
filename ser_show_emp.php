<?php
	session_start();
	
	include('service/connect_db.php');

	$sql = "SELECT * FROM employee  ORDER BY emp_id DESC LIMIT 0,1";
	$result = mysqli_query($conn,$sql);
	
	// echo $result;
	print_r($result);
	
	

    
	//table1
	// $check = "SELECT * FROM employee WHERE emp_fname='$fname'";
	// $result = mysqli_query($conn,$check) or die ("Error in query: $check " .mysqli_error($conn));
	// $num = mysqli_num_rows($result);
	
	// if($num=0)
	// {
	
		
	// 	echo "<script language=\"JavaScript\">";
	// 	echo "alert('Add already exists!!');window.location ='login.php';";
	// 	echo "</script>";
	// }
	// else{

	// $sql = "INSERT INTO employee(dep_id,rank_id,emp_fname,emp_lname,emp_gender,emp_address,emp_nationality,emp_idcard,emp_tel,emp_birthday,emp_account,emp_edu,emp_socialsecurity,emp_firstdaywork) 
	// 		VALUES('$department_id','$rank_id','$fname','$lname','$gender','$address','$nat_id','$pe_id','$phone_id','$date','$account','$eduction','$social_se','$fday')";
	// $result = mysqli_query($conn,$sql) or die ("Error in query: $sql " .mysqli_error());

	// if($result){
	// 	echo"Record Add Successfully";
	// 	echo "<script language=\"JavaScript\">";
	// 	echo "alert('Save Successfuly');window.location ='../show_emp.php';";
	// 	echo "</script>";
	// }
	// else{
	// 	echo "<script type='text/javascript'>";
	// 	echo "alert('Error!');";
	// 	echo "</script>";
	// }
	// }


?>