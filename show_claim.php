<?php
include('service/connect_db.php');
session_start();

function getemp_name($conn) {

    $sdd = $_SESSION['mem_password'];
    $sql = " SELECT * FROM employee JOIN member WHERE emp_id=$sdd LIMIT 1 ";
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_array($result)) {
        echo $row['emp_fname'] . " " . $row['emp_lname'];
    }
}

function getemp_id($conn) {

    $sdd = $_SESSION['mem_password'];
    $sql = " SELECT * FROM employee JOIN member WHERE emp_id=$sdd LIMIT 1 ";
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_array($result)) {
        echo $row['emp_id'];
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
                        <input type="hidden" name="emp_id" id="emp_id" value="<?php echo getemp_id($conn); ?>">
                        <input type="hidden" name="v_name" id="v_name">
                        <div class="form-group">

                            <?php
                            include('service/connect_db.php');

                            function runnum($conn) {
                                $sql = " SELECT * FROM vendor_claim ORDER BY  v_claim_id  DESC LIMIT 0,1 ";
                                $result = mysqli_query($conn, $sql);

                                while ($row = mysqli_fetch_assoc($result)) {

                                    echo $row['v_claim_id'] + 1;
                                }
                            }
                            ?>
                            <div class="row">
                                <div class="col-md-6">
                                    <label >รหัสเคลม</label>
                                    <input  type="text"    class="form-control"  name="v_claim_id" id="v_claim_id"   value="<?php echo runnum($conn); ?>"  readonly="readonly">
                                </div>
                                <div class="col-md-6">
                                    <label >ชื่อบริษัท</label>
                                    <select id="chOrder" class="selectpicker form-control" name="v_id">
                                        <?php
                                        include('service/connect_db.php');
                                        $sql = "SELECT * FROM vendor AS vd INNER JOIN vendor_order AS vo ON vd.v_id = vo.v_id";
                                        $result = mysqli_query($conn, $sql);
                                        echo "<option value=''>เลือก</option>";
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo"<option value='{$row['v_id']}' venName='{$row['v_name']}'>{$row['v_name']}</option>";
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
                                    <input type="date" class="form-control" required  name="v_claim_date" id="v_claim_date" >
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
                                    <input  type="text" class="form-control"   id="emp_name" name="emp_name" value="<?php echo getemp_name($conn) ?>" readonly="readonly">

                                </div>
                            </div>
                        </div>

                        <!-- table-->
                        <div class="mt-4 mb-3">
                            <div class="row">
                                <div class="col-md-1">

                                </div>
                                <div class="col-md-10">
                                    <table class="table table-hover" border="2" id="table">
                                        <thead>
                                           <tr align='center' border="2">
                                                <th scope="col" >ลำดับ</th>
                                                <th scope="col">รายการ</th>
                                                <th scope="col">จำนวนสินค้าทั้งหมด</th>
                                                <th scope="col">จำนวนเคลม</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="prototype" id="tr_table">

  <!-- <th scope="row">1</th> -->
                                                <td align="center" id="number_row" value="1" readonly="readonly" >1</td>
                                                  <!-- <input type="number" id="number_row" value="1" readonly="readonly" > -->


                                                <td>
                                                    <!-- รายการ -->
                                                    <select class="selectpicker form-control" name="order1" id="order1">
                                                    </select>
                                                </td>
                                                <td  align="center" id="num_order"></td>    
                                                <td>
                                                    <!-- จำนวน -->
                                        <center>
                                            <input type="text" class="form-control" name="v_declaim_quantity" id="v_declaim_quantity" required>
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
                        <div class="container">

                            <textarea class="form-control form-rounded" name="detail_clam" rows="3"></textarea><br>
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
    $(document).ready(function () {

        $("#order1").html('<option selected >กรุณาเลือกรหัสสั่งจอง</opition>');
        $("#v_order_id").html('<option selected >กรุณาเลือกชื่อบริษัท</opition>');
        $('#chOrder').change(function () {
            $('#num_order').html('');
            $("#order1").html('<option selected >กรุณาเลือกรหัสสั่งจอง</opition>');
            var venName = $('option:selected', this).attr('venName');
            $('#v_name').val(venName);
            $.ajax({
                url: "get_data/get_vendor_id.php",
                method: "POST",
                data: {FN: 'get_order_id', v_order_id: $('#chOrder').val()},
                success: function (data) {

                    $('.jumbotron').find('select#v_order_id').html('');
                    if ($('#chOrder').val() == '') {
                        $('.jumbotron').find('select#v_order_id').html('');
                    } else {
                        $('.jumbotron').find('select#v_order_id').append('<option selected >เลือกรหัส</opition>');
                    }
                    $('.jumbotron').find('select#v_order_id').append(data);
                }
            });
        });

        $('#v_order_id').change(function () {
            $.ajax({
                url: "get_data/get_vendor_id.php",
                method: "POST",
                data: {FN: 'get_p_name', v_order_id: $('#v_order_id').val()},
                success: function (data) {
                    $('#table').find('select#order1').html('');
                    if ($('#chOrder').val() == '') {
                        $('#table').find('select#order1').html('');
                    } else {
                        $('#table').find('select#order1').append('<option selected >show order</opition>');
                    }
                    $('#table').find('select#order1').append(data);
                }
            });
        });
        $('#order1').change(function () {
            var price = $('option:selected', this).attr('tag');
            $('#num_order').html(price);
        });
    });

</script>









