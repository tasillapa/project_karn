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
                                <a class="dropdown-item" href="data_customs.php">ข้อมูลลูกค้า</a>
                                <a class="dropdown-item" href="show_addcus.php">เพิ่มข้อมูลลูกค้า</a>

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
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="send_product.php">ส่งสินค้า</a>
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
        <h1 class="text-center">แสดงรายการ</h1>
      </div>

      <!-- <h1 class="text-center">กรอกข้อมูลพนักงาน</h1> -->

      <div class="mt-4 mb-3">
             <table width="100%" class="table table-hover" id="dataTables-example" border="2" >
                            <?php
                            include('service/connect_db.php');
                            $sql = "SELECT * FROM customer_order AS co LEFT JOIN customer_detail_order AS cdo ON co.cus_order_id = cdo.cus_order_id LEFT JOIN customer AS ctm ON co.cus_id = ctm.cus_id LEFT JOIN product AS pd ON cdo.p_id = pd.p_id";
                            $result = mysqli_query($conn, $sql);



                            echo "<tbody>";

                            echo "<thead align='center' >  ";
                            echo "<tr>";
                            echo "<th scope='col'>" . "ลำดับ" . "</th>";
                            echo "<th scope='col'>" . "รหัสบิล" . "</th>";
                            echo "<th scope='col' width='20%'>" . "ชื่อลูกค้า" . "</th>";
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
                                echo "<td scope='col' style='width:8%'>" . $row["cus_order_id"] . "</td>";
                                echo "<td scope='col' style='width:10%'>" . $row["cus_prefix"] . "" . $row["cus_fname"] . " " . $row["cus_lname"] . "</td>";
                                echo "<td scope='col' style='width:10%'>" . $row["cus_order_date"] . "</td>";
                                echo "<td scope='col' style='width:15%'>" . $row["p_name"] . "</td>";
                                echo "<td scope='col' style='width:15%'>" . $row["cus_de_units"] . "</td>";
                                echo "<td scope='col' style='width:15%'>" . $row["cus_order_total"] . "</td>";
                                echo "</tr>";
                                $i++;
                            }



                            echo "</tbody>";
                            ?>
                        </table>
        
       
    </div>
    <!-- /.container -->
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
