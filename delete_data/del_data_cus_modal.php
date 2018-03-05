<?php
    session_start();
    include('../service/connect_db.php');


    $cus_del_id = $_REQUEST["cus_del_id"];


$sql = 'DELETE FROM customer WHERE cus_id = "'.$cus_del_id.'"';

$result = mysqli_query($conn,$sql) or die ("Error in query: $sql " .mysqli_error());


if($result !=0){
    echo "<script language=\"JavaScript\">";
    echo "window.location =  '../data_customs.php';";
    echo "</script>";
}
else{
    echo "<script type='text/javascript'>";
    echo "alert('Error!');";
    echo "</script>";
}
