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
        <a class="navbar-brand" href="manage_cus.php">Home</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              เกี่ยวกับการค้า
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
                <a class="dropdown-item" href="show_addcus.php">เพิ่มข้อมูลลูกค้า</a>
                    <a class="dropdown-item" href="data_customs.php">แสดงข้อมูลลูกค้า</a>

              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="ordor_vendor.php" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              การสั่งซื้อ
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
                <a class="dropdown-item" href="order_customs.php">การสั่งซื้อ</a>
                <a class="dropdown-item" href="detail_customs.php">แสดงการสั่งซื้อ</a>

              </div>
            </li>
             <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              เคลมสินค้า
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
                <a class="dropdown-item" href="#">เพิ่มข้อมูลการเคลม</a>
                <a class="dropdown-item" href="#">แสดงข้อมูลการเคลม</a>

              </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">ส่งออกสินค้า</a>
            </li>
          </ul>
        </div>

          <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link -toggle" href="service/logout_emp.php" id=""  aria-haspopup="true" aria-expanded="false">
                 ออกจากระบบ
                </a>
              </li>
          </ul>
      </div>
    </nav>

    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <div class="mt-4 mb-3">
        <h1 class="text-center">แสดงรายชื่อลูกค้า</h1>
      </div>

    <div id="page-wrapper">


            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">

                        <table width="100%" class="table table-hover" id="dataTables-example" border="2">
                            <?php
	                            include('service/connect_db.php');
                                    $sql = "SELECT * FROM customer ";
                                    $result = mysqli_query($conn,$sql);




                                    echo "<tbody>";
                                    echo "<thead align='center' >  " ;
                                    echo "<tr align='center' > " ;
                                            echo "<th  align='center'>" ."ลำดับ". "</th>";
                                            echo "<th  align='center'>" ."รหัสลูกค้า". "</th>";
                                            echo "<th align='center'>" ."ชื่อลูกค้า". "</th>";
                                            echo "<th align='center'>" ."เบอร์โทรศัพท์ลูกค้า". "</th>";
                                            echo "<th align='center'>" ."จัดการ". "</th>";
                                    echo "</thead>";
                                    echo "</tr>";
                                    $i = 1;
								              while($row = mysqli_fetch_array($result)){
                                                             echo "<td style='width:6%' >" .$i. "</td>";
                                                             echo "<td style='width:6%' >" .$row["cus_id"]. "</td>";
                                                             echo "<td style='width:10%' >" .$row["cus_prefix"]." ".$row["cus_fname"]." ".$row["cus_lname"]."</td>";
                                                             echo "<td style='width:10%' >" .$row["cus_phone"]. "</td>";
                                                             echo "<td scope='col' style='width:10%'>
                                                              <a href='#' data-toggle='modal' data-target='#view'><button type='button' class='btn btn-info btn-sm'  onclick='javascript: view_modal(".$row["cus_id"].")'>ดู</button></a>
                                                             <a href='#' data-toggle='modal' data-target='#edit'><button type='button' class='btn btn-warning btn-sm'  onclick='javascript: edit_modal(".$row["cus_id"].")'>แก้ไข</button></a>
                                                             <a href='#' data-toggle='modal' data-target='#delete'><button type='button' class='btn btn-danger btn-sm' onclick='javascript: delete_modal(".$row["cus_id"].")'>ลบ</button></a>

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
        data:{edit_cus_modal:id},

        success:function(data){
        console.log(data);

        $('#edit_cus_id').val(data[0].cus_id);
        $('#edit_cus_prefix').val(data[0].cus_prefix);
        $('#edit_cus_fname').val(data[0].cus_fname);
        $('#edit_cus_lname').val(data[0].cus_lname);

        $('#edit_cus_address').val(data[0].cus_address);
        $('#edit_cus_phone').val(data[0].cus_phone);
        $('#edit_cus_email').val(data[0].cus_email);
        $('#edit_cus_accunt').val(data[0].cus_account);


        }
});
}

function view_modal(id3){


  $.ajax({
        url:"load_data.php",
        type:"application/json",
        method:"POST",
        data:{view_modal:id3},
        success:function(data){

        console.log(data);

        $('#cus_id').val(data[0].cus_id);
        $('#cus_fname').val(data[0].cus_prefix +" " +  data[0].cus_fname +" " +  data[0].cus_lname  );
        $('#cus_address').val(data[0].cus_address);
        $('#cus_phone').val(data[0].cus_phone);
        $('#cus_email').val(data[0].cus_email);
        $('#cus_account').val(data[0].cus_account);
        }
});

}


    function delete_modal(id2){

        
          $('#cus_del_id').val(id2);
    }


  $(function(){
    $('.btn-warning .btn-sm').on('click', function(){
    $('#edit').modal('show');
    });
  });


  $(function(){

    $('.btn-info .btn-sm').on('click', function(){
    $('#view').modal('show');
    });
  });



  $(function(){
    $('.btn-danger .btn-sm').on('click', function(){
    $('#delete').modal('show');
    });
  });
</script>

 <div id="view" class="modal fade " role="dialog">
        <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form method="post"   role="form">
                            <div class="modal-header" >
                                    <h2 class="modal-title" align="center">ดู</h2>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                           </div>
                            <div class="modal-body">
                                     <div class="form-group">
                                            <label class="control-label col-sm-4" for="">รหัสลูกค้า</label>
                                                <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="cus_id" name="cus_id" readonly="readonly">
                                                </div>
                                            <label class="control-label col-sm-4" for="">ชื่อลูกค้า</label>
                                                <div class="col-sm-12">
                                                        <input type="hidden" class="form-control" id="cus_prefix" name="cus_prefix" readonly="readonly">
                                                </div>
                                                <div class="col-sm-12">
                                                        <input type="text" class="form-control" id="cus_fname" name="cus_fname" readonly="readonly">
                                                </div>
                                                <div class="col-sm-12">
                                                        <input type="hidden" class="form-control" id="cus_lname" name="cus_lname" readonly="readonly">
                                                </div>
                                            <label class="control-label col-sm-4" for="item_code">ที่อยู่</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="cus_address" name="cus_address" readonly="readonly">
                                                </div>
                                            <label class="control-label col-sm-4" for="item_code">เบอร์โทรศพท์:</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="cus_phone" name="cus_phone" readonly="readonly">
                                                </div>
                                            <label class="control-label col-sm-4" for="item_code">อิเมลล์</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="cus_email" name="cus_email" readonly="readonly">
                                                </div>
                                            <label class="control-label col-sm-4" for="item_code">เลขบัญชี</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="cus_account" name="cus_account" readonly="readonly">
                                                </div>
                                            <br>
                            </div>
                    </form>
                </div>
            </div>
    </div>
 </div>

  <!-- /modal -->

 <div id="delete" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <form method="post"  action="delete_data/del_data_cus_modal.php" role="form" >
                    <!-- Modal content-->
                    <div class="modal-content">

                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>

                        </div>

                        <div class="modal-body">
                            <input type="hidden"  id="cus_del_id"name="cus_del_id"  >
                            <p>
                                <div class="alert alert-danger">คุณต้องการลบข้อมูลใช่หรือ ไม่ ?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="submit"  class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>ตกลง</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span>ยกเลิก</button>
                            </div>
                        </div>
                </form>
                </div>
            </div>
        </div>
   <!--Edit Item Modal -->

   <div id="edit" class="modal fade " role="dialog">
          <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                      <form method="post"  action="edit_data/edit_datacus_modal.php"  role="form">
                              <div class="modal-header" >
                                      <h2 class="modal-title" align="center">แก้ไข</h2>
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                             </div>
                              <div class="modal-body">
                                       <div class="form-group">
                                              <label class="control-label col-sm-4" for="">รหัสลูกค้า</label>
                                                  <div class="col-sm-12">
                                                          <input type="text" class="form-control" id="edit_cus_id" name="edit_cus_id" readonly="readonly">
                                                  </div>
                                              <label class="control-label col-sm-4" for="">ชื่อลูกค้า</label>
                                                <div class="row">

                                                  <div class="col-sm-4">
                                                          <input type="text" class="form-control" id="edit_cus_prefix" name="edit_cus_prefix" >
                                                  </div>
                                                  <div class="col-sm-4">
                                                          <input type="text" class="form-control" id="edit_cus_fname" name="edit_cus_fname" >
                                                  </div>
                                                  <div class="col-sm-4">
                                                          <input type="text" class="form-control" id="edit_cus_lname" name="edit_cus_lname" >
                                                  </div>
                                                </div>


                                              <label class="control-label col-sm-4" for="item_code">ที่อยู่</label>
                                                  <div class="col-sm-12">
                                                      <input type="text" class="form-control" id="edit_cus_address" name="edit_cus_address" >
                                                  </div>
                                              <label class="control-label col-sm-4" for="item_code">เบอร์โทรศพท์:</label>
                                                  <div class="col-sm-12">
                                                      <input type="text" class="form-control" id="edit_cus_phone" name="edit_cus_phone" >
                                                  </div>
                                              <label class="control-label col-sm-4" for="item_code">อิเมลล์</label>
                                                  <div class="col-sm-12">
                                                      <input type="text" class="form-control" id="edit_cus_email" name="edit_cus_email" >
                                                  </div>
                                              <label class="control-label col-sm-4" for="item_code">เลขบัญชี</label>
                                                  <div class="col-sm-12">
                                                      <input type="text" class="form-control" id="edit_cus_accunt" name="edit_cus_accunt" >
                                                  </div>
                                              <br>
                              </div>

                              <div class="row">
                                  <div class="col-sm-6" align="right">
                                          <button type="submit" class="btn btn-warning">บันทึก</button>
                                  </div>
                                  <div class="col-sm-6">
                                          <button type="button" class="btn btn-danger" data-dismiss="modal" >ยกเลิก</button>
                                  </div>

                      </div>


                      </form>
                  </div>
              </div>
      </div>
   </div>




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
