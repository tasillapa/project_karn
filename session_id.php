<?php 
 include('service/connect_db.php');
session_start();
	$output = '';
	
		if( $_POST['v_id'] == ''){
				$output .='<option value="" tag=""]>กรุณาเลือกข้อมูล</option>';
				echo $output;
		}else{
		$sql = "SELECT * FROM product WHERE v_id='".$_POST['v_id']."' ";
		$result = mysqli_query($conn,$sql);
		while($row = mysqli_fetch_array($result))
		{
		  $output .='<option codepd="'.$row["p_id"].'" value="'.$row["p_cost"].'" tag="'.$row["p_name"].'">'.$row["p_name"].'</option>';
		}
		echo $output;
		}
	
?>