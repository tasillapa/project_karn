<?php
    session_start();
    include('../service/connect_db.php');

    $random_id = $_REQUEST["random_id"];
     $prefix  = $_REQUEST["prefix"];
    $name_cus  = $_REQUEST["name_cus"];
    $cus_lname   = $_REQUEST["cus_lname"];

    $add_cus   = $_REQUEST["add_cus"];
    $mem_cus   = $_REQUEST["mem_cus"];
    $email_cus   = $_REQUEST["email_cus"];
    $acc_num   = $_REQUEST["acc_num"];
    $id_cus = $_REQUEST["id_cus"];


$check = "SELECT * FROM customer WHERE cus_lname='$cus_lname'";
$result = mysqli_query($conn,$check) or die ("Error in query: $check " .mysqli_error($conn));
$num = mysqli_num_rows($result);

if($num = 0){

    echo "<script language=\"JavaScript\">";
    echo "alert('Add already exists!!');window.location ='manage_cus.php';";
    echo "</script>";
}else{
    $sql = "INSERT INTO customer(cus_id,cus_prefix,cus_fname,cus_lname,cus_address,cus_phone,cus_email,cus_account,emp_id) 
            VALUES('$random_id','$prefix','$name_cus','$cus_lname','$add_cus','$mem_cus','$email_cus','$acc_num','$id_cus')";

    $result = mysqli_query($conn,$sql) or die ("Error in query: $sql " .mysqli_error());
    if($result){

            echo "<script language=\"JavaScript\">";
            echo "alert('Save Successfuly');window.location ='../data_customs.php';";
            echo "</script>";
    }
    else{
            echo "<script type='text/javascript'>";
            echo "alert('Error!');";
            echo "</script>";
        }
    }






?>
