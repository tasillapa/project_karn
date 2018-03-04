<?php
    session_start();
    include('../service/connect_db.php');

    $cus_id = $_REQUEST["cus_id"];
  //  $cus_name  = $_REQUEST["cus_name"];
    $date_name  = $_REQUEST["date_name"];
  //  $order   = $_REQUEST["order"];
    $name_num1   = $_REQUEST["name_num1"];
    $show_pri  = $_REQUEST["show_pri"];
    $emp_id2   = $_REQUEST["emp_id2"];
    $show   = $_REQUEST["show"];
      $p_id = $_REQUEST["p_id"];





$check = "SELECT * FROM customer WHERE cus_id='$cus_id'";
$result = mysqli_query($conn,$check) or die ("Error in query: $check " .mysqli_error($conn));
$num = mysqli_num_rows($result);

if($num = 0){

    echo "<script language=\"JavaScript\">";
    echo "alert('Add already exists!!');window.location ='manage_cus.php';";
    echo "</script>";
}else{
    $sql = "INSERT INTO customer_order(cus_id,cus_order_total,cus_order_date)
                    VALUES('$emp_id2','$show','$date_name')";

    $sql2 =   "INSERT INTO customer_detail_order(cus_de_units,cus_de_price ,p_id,cus_order_id)
            VALUES('$name_num1','$show_pri','$p_id','$cus_id')";

    $result = mysqli_query($conn,$sql) or die ("Error in query: $sql " .mysqli_error());

    $result2 = mysqli_query($conn,$sql2) or die ("Error in query: $sql2 " .mysqli_error());
    if($result && $result2 ){

            echo "<script language=\"JavaScript\">";
            echo "alert('Save Successfuly');window.location ='../manage_cus.php';";
            echo "</script>";
    }
    else{
            echo "<script type='text/javascript'>";
            echo "alert('Error!');";
            echo "</script>";
        }
    }






?>
