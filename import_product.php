<?php
include('service/connect_db.php');
session_start();

function getemp_name($conn) {


    $sdd = $_SESSION['mem_password'];
    $sql = " SELECT * FROM employee JOIN member WHERE emp_id=$sdd LIMIT 1 ";
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_array($result)) {
        echo $row["emp_name_title"] . " " . $row['emp_fname'] . " " . $row['emp_lname'];
    }
}

function getemp_id($conn) {

    $sdd = $_SESSION['mem_password'];
    $sql = " SELECT * FROM employee JOIN member WHERE emp_id=$sdd LIMIT 1 ";
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_array($result)) {


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

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                เกี่ยวกับการค้า
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
                                <a class="dropdown-item" href="vendor1.php">เพิ่มข้อมูลผู้ค้า</a>
                                <a class="dropdown-item" href="data_vendor.php">ข้อมูลผู้ค้า</a>

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
                <h1 class="text-center">นำเข้าสินค้า</h1>
            </div>

            <div class="mt-4 mb-3">
                <div class="jumbotron" style="padding-top: 30px">

                    <form name="add_vendor2" action="delete_data/del_update_import.php" method="post"> 
                        <input type="hidden" name="order_name" id="order_name">
                        <div class="form-group">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>วันเดือนปี</label>
                                        <input type="date" class="form-control" required  name="v_mat_date" id="v_mat_date" >
                                    </div>
                                    <div class="col-md-6">
                                        <label >รหัสบิล</label>
                                        <select id="chOrder" class="selectpicker form-control" name="v_order_id" required>
                                            <?php
                                            include('service/connect_db.php');
                                            $sql = "SELECT * FROM vendor_order AS vo LEFT JOIN vendor_detail_order AS vdo ON vo.v_order_id = vdo.v_order_id LEFT JOIN vendor AS vd ON vo.v_id = vd.v_id";
                                            $result = mysqli_query($conn, $sql);

                                            echo "<option value=''>เลือก</option>";
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo"<option p_name='{$row['p_name']}' v_id='{$row['v_id']}' number='{$row['v_deorder_units']}' v_name='{$row['v_name']}' price='{$row['v_order_total']}' value='{$row['v_order_id']}'>{$row['v_order_id']}</option>";
                                            }
                                            ?> 
                                        </select>
                                    </div> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label >ชื่อบริษัท</label>
                                    <input  type="text"    class="form-control"  name="v_name" id="v_name" value="" readonly="readonly">
                                </div>
                                <div class="col-md-6">
                                    <!-- <label>รหัสพนักงาน</label>-->
                                    <input  type="hidden" class="form-control"   id="emp_id" name="emp_id" value="<?php echo getemp_id($conn) ?>" readonly="readonly">
                                    <label>ราคารวม</label>
                                    <input type="number" class="form-control"  name="price" id="price" readonly="readonly" >
                                    <input type="hidden" class="form-control"  name="v_deorder_units" id="v_deorder_units" readonly="readonly" >
                                    <input type="hidden" class="form-control"  name="v_id" id="v_id" readonly="readonly" >
                                    <input type="hidden" class="form-control"  name="p_name" id="p_name" readonly="readonly" >

                                </div>
                            </div>
                        </div>
                        <div class="mt-4 mb-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>ชื่อพนักงาน</label>
                                    <input  type="text" class="form-control"   id="emp_name" name="emp_name" value="<?php echo getemp_name($conn) ?>" readonly="readonly">


                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="submit" class="btn btn-lg btn-success btn-block"  name="add"  id="add" value="นำเข้า">  
                            </div>
                            <div class="col-md-6">
                                <input type="reset" class="btn btn-lg btn-danger btn-block" name="reset"  value="ยกเลิก">  
                            </div>
                        </div>
                        <!-- table-->
                        <div class="mt-4 mb-3">
                            <div class="row">
                                <div class="col-md-1">

                                </div>
                                <div class="col-md-1">
                                </div>
                            </div>
                        </div>
                        <table width="100%" class="table table-hover" id="dataTables-example" border="2" >
                            <?php
                            include('service/connect_db.php');
                            $sql = "SELECT * FROM vendor_order AS vo LEFT JOIN vendor_detail_order AS vdo ON vo.v_order_id = vdo.v_order_id LEFT JOIN vendor AS vd ON vo.v_id = vd.v_id";
                            $result = mysqli_query($conn, $sql);



                            echo "<tbody>";

                            echo "<thead align='center' >  ";
                            echo "<tr>";
                            echo "<th scope='col'>" . "ลำดับ" . "</th>";
                            echo "<th scope='col'>" . "รหัสบิล" . "</th>";
                            echo "<th scope='col'>" . "ชื่อบริษัท" . "</th>";
                            echo "<th scope='col'>" . "วัน/เดือน/ปี" . "</th>";
                            echo "<th scope='col'>" . "รายการ" . "</th>";
                            echo "<th scope='col'>" . "จำนวน" . "</th>";
                            echo "<th scope='col'>" . "ราคารวม" . "</th>";
                            echo "</thead>";
                            echo "</tr>";
                            $i = 1;
                            while ($row = mysqli_fetch_array($result)) {


                                echo "<tr align='center'>";
                                echo "<th scope='col' style='width:7%'>" . $i . "</th>";
                                echo "<td scope='col' style='width:8%'>" . $row["v_order_id"] . "</td>";
                                echo "<td scope='col' style='width:10%'>" . $row["v_name"] . "</td>";
                                echo "<td scope='col' style='width:10%'>" . $row["v_order_date"] . "</td>";
                                echo "<td scope='col' style='width:15%'>" . $row["p_name"] . "</td>";
                                echo "<td scope='col' style='width:15%'>" . $row["v_deorder_units"] . "</td>";
                                echo "<td scope='col' style='width:15%'>" . $row["v_order_total"] . "</td>";
                                echo "</tr>";
                                $i++;
                            }



                            echo "</tbody>";
                            ?>
                        </table>

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
                        $('#chOrder').change(function () {
                            var v_name = $('option:selected', this).attr('v_name');
                            $('#v_name').val(v_name);
                            var price = $('option:selected', this).attr('price');
                            $('#price').val(price);
                            var v_id = $('option:selected', this).attr('v_id');
                            $('#v_id').val(v_id);
                            var p_name = $('option:selected', this).attr('p_name');
                            $('#p_name').val(p_name);
                            var v_deorder_units = $('option:selected', this).attr('number');
                            $.ajax({
                                url: "get_data/get_vendor_id.php",
                                method: "POST",
                                data: {FN: 'get_p_qoh', p_name: p_name},
                                success: function (data) {
                                    $('#v_deorder_units').val(parseInt(data) + parseInt(v_deorder_units));
                                }
                            });

                        });
                    });
                </script>









