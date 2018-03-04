<?php
    session_start(); 
    include('../service/connect_db.php');
   
 
    $vendor_id = $_REQUEST["vendor_id"];
    $vendor_name  = $_REQUEST["vendor_name"];
    $vendor_phone  = $_REQUEST["vendor_phone"];
    $vendor_account= $_REQUEST["vendor_account"];
    $vendor_address   = $_REQUEST["vendor_address"];
    $vendor_email   = $_REQUEST["vendor_email"];
  

$sql = 'UPDATE vendor SET v_name = "'.$vendor_name.'" ,v_phone = "'.$vendor_phone.'" ,v_account = "'.$vendor_account.'" , v_address = "'.$vendor_address.'" , v_email = "'.$vendor_email.'"  WHERE  v_id = "'.$vendor_id.'"';

$result = mysqli_query($conn,$sql) or die ("Error in query: $sql " .mysqli_error());


if($result){
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




