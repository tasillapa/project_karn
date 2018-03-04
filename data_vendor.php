<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mtec</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">

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

    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <div class="mt-4 mb-3">
        <h1 class="text-center">แสดงรายชื่อผู้ค้า</h1>
      </div>
    
    <div id="page-wrapper">

           
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            
                        <table width="100%" class="table table-hover" id="dataTables-example" border="2">
                            <?php
	                            include('service/connect_db.php');
                                    $sql = "SELECT * FROM vendor ";
                                    $result = mysqli_query($conn,$sql);
                                    
                                   
                                   
                                    
                                    echo "<tbody>";
                                    echo "<thead align='center' >  " ;
                                    echo "<tr align='center' > " ;
                                            echo "<th  align='center'>" ."ลำดับ". "</th>";
                                            echo "<th  align='center'>" ."รหัสผู้ค้า". "</th>";
                                            echo "<th align='center'>" ."ชื่อผู้ค้า". "</th>";
                                            echo "<th align='center'>" ."เบอร์โทรศัพ์ผู้ค้า". "</th>";
                                            echo "<th align='center'>" ."เลขบัญชี". "</th>";
                                            echo "<th align='center'>" ."ที่อยู่". "</th>";
                                            echo "<th align='center'>" ."อิเมลล์". "</th>";
                                            echo "<th align='center'>" ."จัดการ". "</th>";
                                    echo "</thead>";  
                                    echo "</tr>";
                                    $i = 1;
								              while($row = mysqli_fetch_array($result)){
                                                             echo "<td style='width:6%' >" .$i. "</td>";
                                                             echo "<td style='width:6%' >" .$row["v_id"]. "</td>";
                                                             echo "<td style='width:10%' >" .$row["v_name"]. "</td>";
                                                             echo "<td style='width:10%' >" .$row["v_phone"]. "</td>";
                                                             echo "<td style='width:10%' >" .$row["v_account"]. "</td>";
                                                             echo "<td style='width:15%' >" .$row["v_address"]. "</td>";
                                                             echo "<td style='width:5%' >" .$row["v_email"]. "</td>";
                                                             echo "<td scope='col' style='width:10%'>
                                                             <a href='#' data-toggle='modal' data-target='#edit'><button type='button' class='btn btn-warning btn-sm'  onclick='javascript: edit_modal(".$row["v_id"].")'>แก้ไข</button></a>
                                                             <a href='#' data-toggle='modal' data-target='#delete'><button type='button' class='btn btn-danger btn-sm' onclick='javascript: delete_modal(".$row["v_id"].")'>ลบ</button></a>
                                                             
                                                     </td>";

                              echo "</tbody>";

                              
                              $i++;
                                              
                            
                            }
        
                                   
	?>
                            </table>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            
      </div>
    <!-- /.table-responsive -->
  </div>

  
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <!-- /.container -->
  <!-- modal -->
<script>
function edit_modal(id){
  $.ajax({
        url:"load_data.php", 
        type:"application/json",
        method:"POST",
        data:{vv_id:id},
        
        success:function(data){
        console.log(data);

        $('#vendor_id').val(data[0].v_id);
        $('#vendor_name').val(data[0].v_name);
        $('#vendor_phone').val(data[0].v_phone);
        $('#vendor_account').val(data[0].v_account);
        $('#vendor_address').val(data[0].v_address);
        $('#vendor_email').val(data[0].v_email);
        
  
        }
});
}

function delete_modal(id2){
$('#vendor_del_id').val(id2);
}

  $(function(){
    $('.btn-warning .btn-sm').on('click', function(){
    $('#edit').modal('show');
    });
  });


  $(function(){
    $('.btn-danger .btn-sm').on('click', function(){
    $('#delete').modal('show');
    });
  });
</script>

 <div id="delete" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <form method="post"  action="delete_data/del_datavendor.php" role="form" >
                    <!-- Modal content-->
                    <div class="modal-content">

                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                           
                        </div>

                        <div class="modal-body">
                            <input type="hidden"  id="vendor_del_id"name="vendor_del_id"  >
                            <p>
                                <div class="alert alert-danger">Are you Sure you want Delete ?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="submit"  class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> YES</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> NO</button>
                            </div>
                        </div>
                </form>
                </div>
            </div>
        </div>
   <!--Edit Item Modal -->

   <div id="edit" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form method="post" action="edit_data/edit_datavendor.php"  role="form">
                            <div class="modal-header" >
                                    <h2 class="modal-title" align="center">แก้ไข</h2>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                           </div>
                            <div class="modal-body">
                                     <div class="form-group">
                                            <label class="control-label col-sm-4" for="">รหัสผู้ค้า</label>
                                                <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="vendor_id" name="vendor_id" readonly="readonly">
                                                </div>
                                            <label class="control-label col-sm-4" for="">ชื่อผู้ค้า:</label>
                                                <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="vendor_name" name="vendor_name" value=""  required="" autofocus="">
                                                </div>
                                            <label class="control-label col-sm-4" for="item_code">เบอร์โทรศัพท์:</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="vendor_phone" name="vendor_phone" value=""required="">
                                                </div>
                                            <label class="control-label col-sm-4" for="item_code">เลขบัญชี:</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="vendor_account" name="vendor_account" value=""required="">
                                                </div>
                                            <label class="control-label col-sm-4" for="item_code">ที่อยู่:</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="vendor_address" name="vendor_address" value=""required="">
                                                </div>
                                            <label class="control-label col-sm-4" for="item_code">อิเมลล์:</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="vendor_email" name="vendor_email" value=""required="">
                                                </div>
                                            <br>

                                            <div class="row">
                                                <div class="col-sm-6" align="right">
                                                        <button type="submit" class="btn btn-warning">บันทึก</button>
                                                </div>
                                                <div class="col-sm-6">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal" >ยกเลิก</button>
                                                </div>

                                    </div>
                            </div>
                    </form>
                </div>
            </div>
    </div>
  <!-- /modal -->

 

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
