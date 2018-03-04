<?php
    session_start(); 
    include('../service/connect_db.php');

   
    $van_name  = $_REQUEST["van_name"];
    $mem_num   = $_REQUEST["mem_num"];
    $acc_num   = $_REQUEST["acc_num"];
    $van_add   = $_REQUEST["van_add"];
    $email_van   = $_REQUEST["email_van"];

$check = "SELECT * FROM vendor WHERE v_name='$van_name'"; 
$result = mysqli_query($conn,$check) or die ("Error in query: $check " .mysqli_error($conn));
$num = mysqli_num_rows($result);

if($num = 0){

    echo "<script language=\"JavaScript\">";
    echo "alert('Add already exists!!');window.location ='manage_vendor.php';";
    echo "</script>";
}else{
    $sql = "INSERT INTO vendor(v_name,v_phone,v_account,v_address,v_email) 
            VALUES('$van_name','$mem_num','$acc_num','$van_add','$email_van')";
           
    $result = mysqli_query($conn,$sql) or die ("Error in query: $sql " .mysqli_error());
    if($result){
           
            echo "<script language=\"JavaScript\">";
            echo "alert('Save Successfuly');window.location ='../manage_vendor.php';";
            echo "</script>";
    }
    else{
            echo "<script type='text/javascript'>";
            echo "alert('Error!');";
            echo "</script>";
        }
    }






?>




