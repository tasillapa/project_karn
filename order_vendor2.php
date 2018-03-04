<?php
 include('service/connect_db.php');
 session_start();

function getemp_name($conn)
{
  
  
  $sdd = $_SESSION['mem_password'];
  $sql = " SELECT * FROM employee JOIN member WHERE emp_id=$sdd LIMIT 1 ";
  $result = mysqli_query($conn,$sql);
  
  while($row = mysqli_fetch_array($result)){
            echo $row["emp_name_title"]." ".$row['emp_fname']." ".$row['emp_lname'];
            
           
          
          }
         
 
}
function getemp_id($conn)
{
  
  $sdd = $_SESSION['mem_password'];
  $sql = " SELECT * FROM employee JOIN member WHERE emp_id=$sdd LIMIT 1 ";
  $result = mysqli_query($conn,$sql);
  
  while($row = mysqli_fetch_array($result)){
           
          
           echo $row["emp_id"];
          
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
        <h1 class="text-center">การสั่งซื้อ </h1>
      </div>

      <div class="mt-4 mb-3">
        <div class="jumbotron" style="padding-top: 30px">
            
          <form name="add_vendor2" action="add_data/add_ven2.php" method="post"> 
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
                                <label >รหัสบิล</label>
                                <input  type="text"    class="form-control"  name="ven_id" id="ven_id"   value="<?php echo runnum($conn) ;?>"  readonly="readonly">
                          </div>
                                <div class="col-md-6">
                                  <label >ชื่อ vender</label>
                                      <select id="chOrder" class="selectpicker form-control" name="v_name">
                                      <?php
                                            include('service/connect_db.php');
                                              $sql = "SELECT * FROM vendor ";
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
                  <div class="col-md-6"></div> 
                </div>
              </div>
              
              <!-- table-->
              <div class="mt-4 mb-3">
            <div class="row">
              <div class="col-md-1">

              </div>

              <div class="col-md-10">
                    <!--<th><button type="button" class="btn btn-primary" id ="addrow" onclick="AddRow()">เพิ่ม</button></th>
                    <th><button  type="button" class="btn btn-danger" id="removeRow"  >ลบ</button></th>
                    <br>
                    <br>-->
					
              <table class="table table-hover" border="2" id="table">
             
              <thead>
                <tr align='center' border="2" >
                  <th scope="col" >ลำดับ</th>
                  <th scope="col">รายการ</th>
                  <th scope="col">จำนวน</th>
                  <th scope="col">ราคาต่อชิ้น</th>
                </tr>
              </thead>
              <tbody>
                <tr class="prototype" id="tr_table">
                
                  <!-- <th scope="row">1</th> -->
                  <td align="center" id="number_row" value="1" readonly="readonly" >1</td>
                    <!-- <input type="number" id="number_row" value="1" readonly="readonly" > -->
                
                 
                  <td>
                  <!-- รายการ -->
                  <div id="order_orner"></div>
                      <select class="selectpicker form-control order" name="order" id="order" >
                      </select>
                  </td>
                  <td>
                  <!-- จำนวน -->
                  <center>
                  <input type="text" class="form-control" name="name_num1" id="num" value=0  onKeyUp="cal('order','num1','show_pri')" >
                  </center>
                  </td>
                  <td>
                      <div align="center" >
                        <input  type="text" class="form-control"  id="show_pri" name="show_pri" readonly="readonly">
                      </div>
                  </td>
                    
                </tr>
              </tbody>
            </table>
              </div>
                  <div class="col-md-1">
                  </div>
        </div>
    </div>
              <div class="mt-4 mb-3">
            <div class="row">
               <div class="col-md-6">
                            <label>ชื่อพนักงาน</label>
                            <input  type="text" class="form-control"   id="emp_name" name="emp_name" value="<?php echo getemp_name($conn)?>" readonly="readonly">
                         
                           
                </div>
                <div class="col-md-6">
                            <!-- <label>รหัสพนักงาน</label>-->
                            <input  type="hidden" class="form-control"   id="emp_id2" name="emp_id2" value="<?php echo getemp_id($conn)?>" readonly="readonly">
                         <label>ราคารวม</label>
                                      <input type="number" class="form-control"  name="show" id="show" readonly="readonly" >
                           
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
	$(".order").html('<option selected >กรุณาเลือกข้อมูล</opition>');
      $('#chOrder').change(function(){
         $.ajax({
        url:"session_id.php",
        method:"POST",
        data:{v_id:$('#chOrder').val()},
        success:function(data){
          // alert(data); 
            // console.log(data);
			
			$('#table').find('select.order').html('');
			if($('#chOrder').val() == ''){
			$('#table').find('select.order').html('');
			}else{
			$('#table').find('select.order').append('<option selected >show order</opition>');
			}
			$('#table').find('select.order').append(data);
        }
       });
      });
	
      $('#tr_table td #order').change(function(){
	 
			var i = $("#table tr").length;
			i = i - 1;
            var price = $(this).val();
            $('#show_pri').val(price);
            var option = $('option:selected', this).attr('tag');
            $('#order_name').val(option); 
      });
	
});

function cal(){
  price1 = $('#order').val() * $('#num').val();
  $('#show').val(price1);
}

function AddRow()
{
    $("#table").append($("#tr_table").clone());
    var i = $("#table tr").length;
    i = i - 1;
    $("#table tr").last().attr("id", "tr_table" + i );
    $("#table tr").last().attr("class", "prototype" + i);
	$("#table tr td div input").last().attr("id", "show_pri" + i);
	$("#table tr td center input").last().attr("id", "num" + i);
	$("#table").find('select').last().attr("id", "order" + i);
    $('tr.prototype' + i).each(function(){  
    $(this).find('td').eq(0).text(i);
    $(this).find("td center input#num"+i).val("0");
	$(this).find("td div input#show_pri"+i).val("");
    });
    
  }
      $('#removeRow').on("click", function(){
      $('#table tr:last:not(tr.prototype)').remove();
      })
</script>









