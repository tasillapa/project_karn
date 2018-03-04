<?php
session_start(); 
include('../service/connect_db.php');


    $name_pro   = $_POST["name_pro"];
    $price = $_POST['price'];
    
    $check = "SELECT * FROM product "; 
    $result = mysqli_query($conn,$check) or die ("Error in query: $check " .mysqli_error($conn));
    $num = mysqli_num_rows($result);

    if($num = 0){
        
                        echo "<script language=\"JavaScript\">";
                        echo "alert('Add already exists!!');window.location ='../index.php';";
                        echo "</script>";
    }else{

        $sql = "INSERT INTO product(p_name,p_price) 
        VALUES('$name_pro','$price')";
        $result = mysqli_query($conn,$sql) or die ("Error in query: $sql " .mysqli_error());

        if($result){
            
                echo "<script language=\"JavaScript\">";
                echo "alert('เพิ่มข้อมูลสำเร็จ');window.location ='../index.php';";
                echo "</script>";
        }
        else{
                echo "<script type='text/javascript'>";
                echo "alert('Error!');";
                echo "</script>";
            }
        }










?>