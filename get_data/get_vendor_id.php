<?php 
session_start();
	$output = '';
		if (isset($_POST["FN"]) && !empty($_POST["FN"])) {
			switch ($_POST["FN"]) {
				case "get_order_id":get_order_id();
					break;
				case "CHK_USER":check_user();
					break;
				case "CHK_PASS":check_pass();
					break;
			}
		}
		
		function get_order_id(){
			include('../service/connect_db.php');
			if( $_POST['v_order_id'] == ''){
				$output .= "<option value=''>เลือก</option>";
				echo $output; exit();
			 }else {
				 $sql = "SELECT v_order_id FROM vendor_order AS vo LEFT JOIN vendor AS vd ON vo.v_id = vd.v_id WHERE vo.v_id = '".$_POST['v_order_id']."'";
				 $result = mysqli_query($conn,$sql);
				while($row = mysqli_fetch_assoc($result)){
					$output .=  "<option value='{$row['v_order_id']}'>{$row['v_order_id']}</option>";
				}
				echo $output;
			 }
		}
		  	
?>