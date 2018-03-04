<?php

include('service/connect_db.php');
header('Content-type: application/json');

$output = '';

if(isset($_POST["p_id"]))
{
        if($_POST["p_id"] != '')
        {
            $sql = "SELECT * FROM product  WHERE p_id = '".$_POST["p_id"]."'";

        }
        else{

            $sql = "SELECT * FROM product";

        }
        $result = mysqli_query($conn,$sql);

        while($row = mysqli_fetch_array($result))
        {
            $output .= $row["p_id"];
            // $output .= $row["p_price"];
        }
        echo $output;



}
if(isset($_POST["v_id"]))
{
    
        if($_POST["v_id"] != '')
        {
            $sql = "SELECT pro.p_price,pro.p_name FROM vendor as vd right join product as pro 
            on vd.v_id = pro.v_id WHERE vd.v_id = '".$_POST["v_id"]."'";

        }
        else{
          //  echo "dis_value";

        }
        $result = mysqli_query($conn,$sql);
        $output = array();
        $i = 0;
        while($row = mysqli_fetch_array($result))
        {
          
          $output[$i] ="price:".$row["p_price"] ."name:".$row["p_name"];
          $output[$i] = "<tr class='prototype' id='tr_table'><tr>";
          $output[$i] = "<td align='center'id='number_row' value='1' readonly='readonly' ><td>";
          $output[$i] =  "<td>";
        //   $output[$i] =  "<div id='order_orner'> "</div>";
        //   $output[$i] =  "<select class='selectpicker form-control' name='order1' id='order1' >"      
        //   "<option>"show order"</option>"
          


          
        //   " </select>";

           
                
                    
                     
        //         </select>
        //     </td>
        //     <td>
        //     <!-- จำนวน -->
        //     <center>
        //     <input type="text" class="form-control" name="name_num1" id="num1" value=0  onKeyUp="cal('order','num1','show_pri')" >
        //     </center>
        //     </td>
        //     <td>
        //         <div align="center" >
        //           <input  type="text" class="form-control"  id="show_pri1" name="show_pri1" readonly="readonly">
        //         </div>
        //     </td>
              
        //   </tr>
         $i++;
        }
        print_r($output);
        exit();
        

}

//edit_model_datavendor//
if(isset($_POST["vv_id"]))
{
   
        if($_POST["vv_id"] != '')
        {
            $sql = "SELECT * FROM vendor  WHERE v_id = '".$_POST["vv_id"]."'";

        }
        else{

            echo "";

        }
        $result = mysqli_query($conn,$sql);
        $output = [];

        while($row = mysqli_fetch_array($result))
        {
          array_push($output , ['v_id' => $row["v_id"],'v_name' => $row["v_name"],'v_phone' => $row["v_phone"],'v_account' => $row["v_account"],'v_address' => $row["v_address"],'v_email' => $row["v_email"]]);

        }
        echo  json_encode($output);

}
//edit_model_datavendor//

// delete_model_datavendor//
    if(isset($_POST["del_data"])){

        if($_POST["del_data"] != '')
        {
            $sql = "SELECT * FROM vendor  WHERE v_id = '".$_POST["del_data"]."'";
            


        }
        else
        {
            echo "";
            
        }
        $result = mysqli_query($conn,$sql);

        $output = [];

        while($row = mysqli_fetch_array($result))
        {
          array_push($output , ['v_id' => $row["v_id"],'v_name' => $row["v_name"],'v_phone' => $row["v_phone"],'v_account' => $row["v_account"],'v_address' => $row["v_address"],'v_email' => $row["v_email"]]);

        }
        echo  json_encode($output);
    }

// delete_model_datavendor//


//edit_model_datavendor//
if(isset($_POST["emp_data"]))
{
   
        if($_POST["emp_data"] != '')
        {
            // $sql = "SELECT * FROM employee  WHERE employee.emp_id  = '".$_POST["emp_data"]."'";
            
            $sql = "SELECT * FROM employee JOIN rank ON rank.rank_id = employee.rank_id  JOIN department ON department.dep_id = employee.dep_id WHERE employee.emp_id  = '".$_POST["emp_data"]."'";
			

		}
        else{

            echo "";

        }
        $result = mysqli_query($conn,$sql);
        $output = [];

        while($row = mysqli_fetch_array($result))
        {
          array_push($output , ['emp_id' => $row["emp_id"],
                                'dep_id' => $row["dep_id"],
                                'rank_id' => $row["rank_id"],
                                'emp_name_title' => $row["emp_name_title"],
                                'emp_fname' => $row["emp_fname"],
                                'emp_lname' => $row["emp_lname"]]);

        }
        echo  json_encode($output);

}
//edit_model_datavendor//



?>