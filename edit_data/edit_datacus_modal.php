<?php
    session_start();
    include('../service/connect_db.php');


    $edit_cus_id = $_REQUEST["edit_cus_id"];
    $edit_cus_prefix = $_REQUEST["edit_cus_prefix"];
    $edit_cus_fname = $_REQUEST["edit_cus_fname"];
    $edit_cus_lname = $_REQUEST["edit_cus_lname"];
    $edit_cus_address = $_REQUEST["edit_cus_address"];
    $edit_cus_phone  = $_REQUEST["edit_cus_phone"];
    $edit_cus_email  = $_REQUEST["edit_cus_email"];
    $edit_cus_accunt = $_REQUEST["edit_cus_accunt"];




$sql = 'UPDATE customer SET cus_prefix = "'.$edit_cus_prefix.'"
                            ,cus_fname = "'.$edit_cus_fname.'"
                            ,cus_lname = "'.$edit_cus_lname.'"
                            ,cus_address = "'.$edit_cus_address.'"
                            ,cus_phone = "'.$edit_cus_phone.'"
                            ,cus_email = "'.$edit_cus_email.'"
                            ,cus_account = "'.$edit_cus_accunt.'"

                         WHERE  cus_id = "'.$edit_cus_id.'"';

$result = mysqli_query($conn,$sql) or die ("Error in query: $sql " .mysqli_error());


if($result){
    echo "<script language=\"JavaScript\">";
    echo "window.location =  '../data_customs.php';";
    echo "</script>";
}
else{
    echo "<script type='text/javascript'>";
    echo "alert('Error!');";
    echo "</script>";
}





?>
