<?php
    session_start(); 
    include('../service/connect_db.php');
   
 
    $vendor_del_id = $_REQUEST["vendor_del_id"];
    

$sql = 'DELETE FROM vendor WHERE v_id = "'.$vendor_del_id.'"';

$result = mysqli_query($conn,$sql) or die ("Error in query: $sql " .mysqli_error());


if($result !=0){
    echo "<script language=\"JavaScript\">";
    echo "window.location =  '../data_vendor.php';";
    echo "</script>";
}
else{
    echo "<script type='text/javascript'>";
    echo "alert('Error!');";
    echo "</script>";
}





?>




