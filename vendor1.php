
<?php session_start();

include('service/connect_db.php');

function v_id($conn){

  $sql = " SELECT * FROM vendor ORDER BY  v_id  DESC LIMIT 0,1 ";
  $result = mysqli_query($conn,$sql);

    while($row = mysqli_fetch_assoc($result)){
      echo $row['v_id'] + 1 ;

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
        <h1 class="text-center">เพิ่มข้อมูลผู้ค้า</h1>
      </div>


      <!-- <h1 class="text-center">กรอกข้อมูลพนักงาน</h1> -->
     

      <div class="mt-4 mb-3">
        <div class="jumbotron">
            
          <form  action="add_data/add_ven.php" method="post" > 
              <div class="form-group">
                    <div class="row">
                          <div class="col-md-12">
                            <label>รหัสผู้ค้า</label>
                            <input disabled type="text" class="form-control"  name="random_id"  required value="<?php echo v_id($conn);?>" >
                          </div>
                    </div>
                    <div class="row">
                          <div class="col-md-6">
                            <br>
                            <label >ชื่อบริษัท</label>
                            <input type="text" class="form-control" required name="van_name" id="van_name" placeholder="กรอกชื่อ บริษัท">
                          </div>
                          <div class="col-md-6">
                            <br>
                            <label>เบอร์โทรศัพท์</label>
                            <input type="text" class="form-control" required name="mem_num" id="mem_num" placeholder="กรอกเบอร์โทรศัพท์">
                          </div> 
                    </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-6">
                    <label >เลขบัญชี</label>
                    <input type="text" class="form-control" required name="acc_num" id="acc_num" placeholder="กรอกชื่อเลขบัญชี">
                  </div>
                  <div class="col-md-6">
                    <label >ที่อยู่</label>
                    <input type="text" class="form-control" required name="van_add" id="van_add" placeholder="กรอกที่อยู่ vandor">
                  </div> 
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-6">
                    <label >อีเมลล์</label>
                    <input type="text" class="form-control" required name="email_van" id="email_van" placeholder="กรอกอีเมลล์">
                  </div>
                  <div class="col-md-6">
                  </div> 
                </div>
              </div>
                 
              <div class="row">
                      <div class="col-md-3">     
                    </div>
                    <div class="col-md-3">
                        <input type="submit" class="btn btn-lg btn-success btn-block" name="add"  value="บันทึก">  
                      </div>  
                          <div class="col-md-3">
                              <input type="reset" class="btn btn-lg btn-danger btn-block"  name="reset" value="ยกเลิก">  
                            </div>  
                           <div class="col-md-3">       
                        </div>     
                  </div>     
            </div>
              
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
