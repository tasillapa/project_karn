<?php
 include('service/connect_db.php');
 session_start();

function getemp_name($conn)
{
 
  $sdd = $_SESSION['mem_password'];
  $sql = " SELECT * FROM employee JOIN member WHERE emp_id=$sdd LIMIT 1 ";
  $result = mysqli_query($conn,$sql);
  
  while($row = mysqli_fetch_array($result)){
            echo $row['emp_fname']." ".$row['emp_lname'];
   }
}
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mtec  </title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">

    <!-- add_table -->
    <script src="http://code.jquery.com/jquery-1.5.1.min.js"></script>
        <!-- add_table-->
        
        

  </head>

  <body>
    <!-- Navigation -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="manage_vendor.php">หน้าแรก</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link -toggle" href="service/logout_emp.php" id=""  aria-haspopup="true" aria-expanded="false">
                 ออกจากระบบ
                </a>
              </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <div class="mt-4 mb-3">
        <h1 class="text-center">การเคลม</h1>
      </div>

      <div class="mt-4 mb-3">
        <div class="jumbotron" style="padding-top: 30px">
            
          <form name="" action="add_data/add_ven_clam.php" method="post"> 
          <input type="hidden" name="order_name" id="order_name">
              <div class="form-group">

              <?php 
              include('service/connect_db.php');
              function runnum($conn){
                $sql = " SELECT * FROM vendor_order ORDER BY  v_order_id  DESC LIMIT 0,1 ";
                $result = mysqli_query($conn,$sql);
              
                  while($row = mysqli_fetch_assoc($result)){
                    
                    echo  $row['v_order_id'] +1 ;
              
                  }

              }
              ?>
                    <div class="row">
                          <div class="col-md-6">
                                <label >รหัสเคลม</label>
                                <input  type="text"    class="form-control"  name="ven_id" id="ven_id"   value="<?php echo runnum($conn) ;?>"  readonly="readonly">
                          </div>
                                <div class="col-md-6">
                                  <label >ชื่อบริษัท</label>
                                      <select id="chOrder"class="selectpicker form-control" name="v_name">
                                      <?php
                                      
                                            include('service/connect_db.php');
                                              $sql = "SELECT * FROM vendor";
                                              $result = mysqli_query($conn,$sql);
                                              echo "<option value=''>เลือก</option>";
                                              while($row = mysqli_fetch_assoc($result)){
                                                        echo"<option value='{$row['v_id']}'>{$row['v_name']}</option>";
                                              }
                                       ?> 
                                      </select>
                                </div> 
                    </div>
              </div>
              <div class="form-group">
                <div class="row">
                              <div class="col-md-6">
                                <label>วันเดือนปี</label>
                                <input type="date" class="form-control" required  name="date_name" id="date_name" >
                              </div>
                  <div class="col-md-6">
                  <label >รหัสสั่งจอง</label>
									<select class="selectpicker form-control" name="v_order_id" id="v_order_id">	
                                     </select>
                  </div> 
                </div>
				 <div class="row">
               <div class="col-md-12">
                            <br><label>ชื่อพนักงาน</label>
                            <input  type="text" class="form-control"   id="emp_name" name="emp_name" value="<?php echo getemp_name($conn)?>" readonly="readonly">
                       
                </div>
            </div>
              </div>
              
              <!-- table-->
              <div class="mt-4 mb-3">
            <div class="row">
              <div class="col-md-1">

              </div>

              <div class="col-md-10">
                  <!--   <th><button type="button" class="btn btn-primary" id ="addrow" onclick="AddRow()">เพิ่ม</button></th>
                    <th><button  type="button" class="btn btn-danger" id="removeRow"  >ลบ</button></th>
                    <br>
                    <br> -->
              <table class="table table-hover" border="2" id="table">
              <thead>
                <tr align='center' border="2" >
                  <th scope="col" >ลำดับ</th>
                  <th scope="col">รายการ</th>
                  <th scope="col">จำนวน</th>
                </tr>
              </thead>
              <tbody>
                <tr class="prototype" id="tr_table">
                
                  <!-- <th scope="row">1</th> -->
                  <td align="center" id="number_row" value="1" readonly="readonly" >1</td>
                    <!-- <input type="number" id="number_row" value="1" readonly="readonly" > -->
                
                 
                  <td>
                  <!-- รายการ -->
                      <select class="selectpicker form-control" name="order1" id="order1" onchange="price_summary(this.id)">
                      </select>
                  </td>
                  <td>
                  <!-- จำนวน -->
                  <center>
                  <input type="text" class="form-control" name="name_num1" id="num1" value=0  onKeyUp="cal('order','num1','show_pri')" >
                  </center>
                  </td>
                </tr>
              </tbody>
            </table>
              </div>
                  <div class="col-md-1">
                  </div>
        </div>
    </div>
          <div class="row">
                <div class="col-md-6">
                          <input type="submit" class="btn btn-lg btn-success btn-block"  name="add"  id="add" value="บันทึก">  
                </div>
                <div class="col-md-6">
                          <input type="reset" class="btn btn-lg btn-danger btn-block" name="reset"  value="ยกเลิก">  
                </div>
          </div>
              <!-- table-->
			  </form>
            </div>
			</div>
          
       
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2017</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
<!-- function table -->
<script>
$(document).ready(function(){

	  $("#order1").html('<option selected >กรุณาเลือกข้อมูล</opition>');
	  $("#v_order_id").html('<option selected >เลือก</opition>');
      $('#chOrder').change(function(){
         $.ajax({
        url:"session_id.php",
        method:"POST",
        data:{v_id:$('#chOrder').val()},
        success:function(data){
			$('#table').find('select#order1').html('');
			if($('#chOrder').val() == ''){
			$('#table').find('select#order1').html('');
			}else{
			$('#table').find('select#order1').append('<option selected >show order</opition>');
			}
			$('#table').find('select#order1').append(data);
        }
       });
	   
	     $.ajax({
        url:"get_data/get_vendor_id.php",
        method:"POST",
        data:{FN:'get_order_id',v_order_id:$('#chOrder').val() },
        success:function(data){
			
			$('.jumbotron').find('select#v_order_id').html('');
			if($('#chOrder').val() == ''){
			$('.jumbotron').find('select#v_order_id').html('');
			}else{
			$('.jumbotron').find('select#v_order_id').append('<option selected >เลือกรหัส</opition>');
			}
			$('.jumbotron').find('select#v_order_id').append(data);
        }
       });
      });
	
});

function cal(){
  price1 = $('#order1').val() * $('#num1').val();
 
  $('#show').val(price1) ;
}
function price_summary(order){
//show_pri1

  var p_id = $('#'+order).val();
      
      $.ajax({
        url:"load_data.php",
        method:"POST",
        data:{p_id:p_id},
        success:function(data){

          if(order == "order"){
            console.log(order);
            $('#show_pri1').html(data);
          }
        }
      });
}
// var id = ["tr_table"];
function AddRow()
{
    $("#table").append($("#tr_table").clone());
    var i = $("#table tr").length;
    i = i - 1;
    $("#table tr").last().attr("id", "tr_table" + i );
    $("#table tr").last().attr("class", "prototype" + i);


    $('tr.prototype' + i).each(function(){  
    $(this).find('td').eq(0).text(i);
    $(this).find("input").val("0");
    });
    
  }
      $('#removeRow').on("click", function(){
      $('#table tr:eq(2)').remove();
    
      })
    






</script>









