<?php
    session_start(); 
    include('../service/connect_db.php');
   
	$del_emp_id  = $_POST["del_emp_id"];
  

$sql = 'DELETE FROM `employee` WHERE  emp_id = "'.$del_emp_id.'"';

$result = mysqli_query($conn,$sql) or die ("Error in query: $sql " .mysqli_error());


if($result !=0){
    echo "<script language=\"JavaScript\">";
    echo "window.location =  '../show_emp.php';";
    echo "</script>";
}
else{
    echo "<script type='text/javascript'>";
    echo "alert('Error!');";
    echo "</script>";
}






?>




