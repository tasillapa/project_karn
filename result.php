<?php
if(isset($_POST['num_1'])) {
	$num_1 = $_POST['num_1'];
	$num_2 = $_POST['num_2'];
	
	$num_result = $num_1 + $num_2;
	
	echo $num_result;	
}

?>