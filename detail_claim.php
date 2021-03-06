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

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                เกี่ยวกับการค้า
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
                                <a class="dropdown-item" href="data_vendor.php">ข้อมูลผู้ค้า</a>
                                <a class="dropdown-item" href="vendor1.php">เพิ่มข้อมูลผู้ค้า</a>

                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="ordor_vendor.php" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                การสั่งซื้อ
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
                                <a class="dropdown-item" href="order_vendor2.php">การสั่งซื้อ</a>
                                <a class="dropdown-item" href="detail_vendor.php">แสดงการสั่งซื้อ</a>

                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="ordor_vendor.php" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                เคลมสินค้า
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
                                <a class="dropdown-item" href="show_claim.php">เพิ่มข้อมูลการเคลม</a>
                                <a class="dropdown-item" href="detail_claim.php">แสดงข้อมูลการเคลม</a>

                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="import_product.php">นำเข้าสินค้า</a>
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
                <h1 class="text-center"> แสดงรายการเคลม</h1>
            </div>

            <div id="page-wrapper">


                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-body">


                                <table width="100%" class="table table-hover" id="dataTables-example" border="2" >
                                    <?php
                                    include('service/connect_db.php');
                                    $sql = "SELECT * FROM vendor_claim AS vc LEFT JOIN vendor_detail_claim AS vdc ON vc.v_claim_id = vdc.v_claim_id LEFT JOIN vendor AS vd ON vc.v_id = vd.v_id";
                                    $result = mysqli_query($conn, $sql);



                                    echo "<tbody>";

                                    echo "<thead align='center' >  ";
                                    echo "<tr>";
                                    echo "<th scope='col'>" . "ลำดับ" . "</th>";
                                    echo "<th scope='col'>" . "รหัสเคลม" . "</th>";
                                    echo "<th scope='col'>" . "รหัสสั่งจอง" . "</th>";
                                    echo "<th scope='col'>" . "ชื่อบริษัท" . "</th>";
                                    echo "<th scope='col'>" . "วัน/เดือน/ปี" . "</th>";
                                    echo "<th scope='col'>" . "รายการ" . "</th>";
                                    echo "<th scope='col'>" . "จำนวน" . "</th>";
                                    echo "<th scope='col'>" . "หมายเหตุ" . "</th>";
                                    echo "<th scope='col'>" . "จัดการ" . "</th>";
                                    echo "</thead>";
                                    echo "</tr>";
                                    $i = 1;
                                    while ($row = mysqli_fetch_array($result)) {


                                        echo "<tr align='center'>";
                                        echo "<th scope='col' style='width:7%'>" . $i . "</th>";
                                        echo "<td scope='col' style='width:8%'>" . $row["v_claim_id"] . "</td>";
                                        echo "<td scope='col' style='width:10%'>" . $row["v_order_id"] . "</td>";
                                        echo "<td scope='col' style='width:10%'>" . $row["v_name"] . "</td>";
                                        echo "<td scope='col' style='width:15%'>" . $row["v_claim_date"] . "</td>";
                                        echo "<td scope='col' style='width:15%'>" . $row["p_name"] . "</td>";
                                        echo "<td scope='col' style='width:15%'>" . $row["v_declaim_quantity"] . "</td>";
                                        echo "<td scope='col' style='width:15%'>" . $row["detail_clam"] . "</td>";
                                        echo "<td scope='col' style='width:15%'>
                                                     
                                                      <a href='#' data-toggle='modal' data-target='#delete'><button type='button' class='btn btn-danger btn-sm' onclick='javascript: delete_modal(" . $row["v_claim_id"] . ")'>ลบ</button></a>
                                                      
                                                 


                                                    </td>";



                                        echo "</tr>";
                                        $i++;
                                    }



                                    echo "</tbody>";
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
        <!-- /.container -->


        <!-- Footer -->
        <br>
        <br>
        <br>
        <br>
        <br>
        <!-- modal -->
        <script>
            function edit_modal(id) {

                $.ajax({
                    url: "load_data.php",
                    type: "application/json",
                    method: "POST",
                    data: {emp_data: id},
                    success: function (data) {

                        console.log(data);

                        //data[0].dep_id
                        $('#edit_emp_id').val(data[0].emp_id);
                        console.log(data[0].rank_id);
                        $("div.edit_department_id select").val(data[0].dep_id);
                        $("div.edit_rank_id select").val(data[0].rank_id)
                        $('#edit_title_name').val(data[0].emp_name_title);
                        $('#edit_emp_fname').val(data[0].emp_fname);
                        $('#edit_emp_lname').val(data[0].emp_lname);

                    }
                });
            }


            function delete_modal(v_claim_id) {
                $('input[name="v_claim_id"]').val(v_claim_id)
            }
            $(function () {
                $('.btn-warning .btn-sm').on('click', function () {
                    $('#edit').modal('show');
                });
            });


            $(function () {
                $('.btn-danger .btn-sm').on('click', function () {
                    $('#delete').modal('show');
                });
            });

        </script>

        <div id="delete" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <form method="post" action="delete_data/del_show_clam.php"  role="form" >
                    <!-- Modal content-->
                    <div class="modal-content">

                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>

                        </div>

                        <div class="modal-body">
                            <input type="hidden"  id="v_claim_id" name="v_claim_id">
                            <p>
                            <div class="alert alert-danger">คุณต้องการลบข้อมูลหรือไม่ ?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="submit"  class="btn btn-danger .id_del"><span class="glyphicon glyphicon-trash"></span> ตกลง</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> ยกเลิก</button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
        <!--Edit Item Modal -->

        <div id="edit" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form method="post" action="edit_data/edit_show_emp.php"  role="form">
                        <div class="modal-header" >
                            <h2 class="modal-title" align="center">แก้ไข</h2>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="control-label col-sm-4" ></label>
                                <div class="col-md-12">
                                    <input type="hidden" class="form-control" required  name="edit_emp_id"  id="edit_emp_id">
                                </div>
                                <label class="control-label col-sm-4" >ชื่อแผนก</label>
                                <div class="col-sm-12 edit_department_id">
                                    <select class="selectpicker form-control"  required name="edit_department_id" id="edit_department_id" >
                                        <option >---เลือกแผนก---</option>
                                        <option value="1">แผนกขาย</option>
                                        <option value="2">แผนกบัญชี</option>
                                        <option value="3">แผนกสโตร์</option>
                                        <option value="4">แผนกทรัพยากรบุคคล</option>

                                    </select>
                                </div>
                                <br>
                                <label class="control-label col-sm-4" >ชื่อตำแหน่ง</label>
                                <div class="col-sm-12 edit_rank_id">
                                    <select class="selectpicker form-control"  required name="edit_rank_id"  id="edit_rank_id">
                                        <option  >---เลือกตำแหน่ง---</option>
                                        <option value="1">พนักงานทั่วไป</option>
                                        <option value="2">หัวหน้าแผนก</option>
                                    </select>
                                </div>
                                <br>
                                <label class="control-label col-sm-4" for="">คำนำหน้า</label>
                                <div class="col-sm-12">
                                    <select class="selectpicker form-control"  required name="edit_title_name"  id="edit_title_name">
                                        <option >---เลือกคำนำหน้า---</option>
                                        <option >นาย</option>
                                        <option >นาง</option>
                                        <option >นางสาว</option>
                                    </select>
                                </div>
                                <br>
                                <label class="control-label col-sm-12" for="">ชื่อพนักงาน:</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" required   name="edit_emp_fname"  id="edit_emp_fname">
                                </div>

                                <label class="control-label col-sm-4" for="item_code">นามสกุล</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" required  name="edit_emp_lname"  id="edit_emp_lname">
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
                        </div>
                </div>

                </form>
            </div>
        </div>
    </div>
    <!-- /modal -->















    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Your Website 2017</p>
        </div> 

        <!-- /.container -->
        <!-- </footer> -->
        <div id="ddd"></div>
        <!-- Bootstrap core JavaScript -->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>




</body>

</html>
