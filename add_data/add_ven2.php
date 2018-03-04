<?php
    session_start(); 
   
    include('../service/connect_db.php');
    $ven_id = $_REQUEST["ven_id"]; //ใส่ในตาราง vendor_detail_order v_order_id
    $v_name   = $_POST["v_name"]; //ใส่ในตาราง 

    $date_name   = $_POST["date_name"]; //
    $order_name = $_POST['order_name'];
    
 // รายการ 
 
    //  $order1 = $_POST["order1"]; // vendor_detail_order ใน p_id
    //  $order2 = $_POST["order2"]; //vendor_detail_order ใน p_id
    //  $order3 = $_POST["order3"]; //vendor_detail_order ใน p_id
// // จำนวน 
     $name_num1 = $_POST["name_num1"]; //vendor_detail_order ใน v_deorder_units
//     //  $name_num2 = $_REQUEST["name_num2"]; //vendor_detail_order ใน v_deorder_units
//     //  $name_num3 = $_REQUEST["name_num3"]; //vendor_detail_order ใน v_deorder_units

// //ราคาต่อชิ้น 
     $show_pri1 = $_POST["show_pri"]; //vendor_detail_order ใน v_deorder_price
//     //  $show_pri2 = $_REQUEST["show_pri2"]; //vendor_detail_order ใน v_deorder_price
//     //  $show_pri3 = $_REQUEST["show_pri3"]; //vendor_detail_order ใน v_deorder_price

// //ชื่อพนักงาน 
    $emp_id2 = $_POST["emp_id2"]; //vendor_order ใน emp_id
   

    
    $show = $_POST["show"]; //vendor_order ใน v_order_total

 

            $check = "SELECT * FROM vendor_detail_order "; 
            $result = mysqli_query($conn,$check) or die ("Error in query: $check " .mysqli_error($conn));
           
            $num = mysqli_num_rows($result);

            if($num = 0){

                echo "<script language=\"JavaScript\">";
                echo "alert('Add already exists!!');window.location ='manage_vendor.php';";
                echo "</script>";
            }else{
                $sql = "INSERT INTO vendor_order(v_id,emp_id,v_order_date ,v_order_total) 
                            VALUES('$v_name','$emp_id2','$date_name','$show')";

                $sql2 = "INSERT INTO  vendor_detail_order(v_order_id,p_name,v_deorder_units,v_deorder_price)
                            VALUES('$ven_id','$order_name','$name_num1','$show_pri1')";
                    
                    $result = mysqli_query($conn,$sql) or die ("Error in query: $sql " .mysqli_error());
                    $result = mysqli_query($conn,$sql2) or die ("Error in query: $sql2 " .mysqli_error());
                    
                
                    // $result2 = mysqli_query($conn,$sql2);


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




