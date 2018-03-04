<?php
    session_start(); 
    include('../service/connect_db.php');

    $edit_emp_id        = $_POST["edit_emp_id"];
    $edit_department_id = $_POST["edit_department_id"];
    $edit_rank_id       = $_POST["edit_rank_id"];
    $edit_title_name    = $_POST["edit_title_name"];
    $edit_emp_fname      = $_POST["edit_emp_fname"];
    $edit_emp_lname     = $_POST["edit_emp_lname"];
   
   

        $sql = 'UPDATE employee SET  dep_id  = "'.$edit_department_id.'" , rank_id = "'.$edit_rank_id.'" ,emp_name_title = "'.$edit_title_name.'" ,emp_fname = "'.$edit_emp_fname.'" ,emp_lname = "'.$edit_emp_lname.'"  WHERE  emp_id = "'.$edit_emp_id.'"';

        $result = mysqli_query($conn,$sql) or die ("Error in query: $sql " .mysqli_error());


        if($result){
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




