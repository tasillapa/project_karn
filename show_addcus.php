
<?php session_start();

include('service/connect_db.php');
function getemp_name($conn)
{
  // $output = '';
  $sdd = $_SESSION['mem_password'];
  $sql = " SELECT * FROM employee JOIN member WHERE emp_id=$sdd LIMIT 1 ";
  $result = mysqli_query($conn,$sql);

  while($row = mysqli_fetch_array($result)){

            echo  $row["emp_name_title"]." ".$row['emp_fname']." ".$row['emp_lname'];

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

    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <div class="mt-4 mb-3">
        <h1 class="text-center">เพิ่มข้อมูลลูกค้า</h1>
      </div>

      <!-- <h1 class="text-center">กรอกข้อมูลพนักงาน</h1> -->

      <div class="mt-4 mb-3">
        <div class="jumbotron">

          <form  action="add_data/add_cus.php" method="post" >
              <div class="form-group">
              <?php
              include('service/connect_db.php');
              function runnum($conn){
                $sql = " SELECT * FROM customer ORDER BY  cus_id  DESC LIMIT 0,1 ";
                $result = mysqli_query($conn,$sql);

                  while($row = mysqli_fetch_assoc($result)){

                    echo  $row['cus_id'] +1 ;

                  }

              }
              ?>
                    <div class="row">
                          <div class="col-md-12">

                            <label>รหัสบิลลูกค้า</label>

                            <input type="text" class="form-control"  name="random_id"  id="random_id"  value="<?php echo runnum($conn) ;?>" readonly="readonly">
                          </div>
                    </div>
                    <div class="row">
                          <div class="col-md-2">
                            <br>
                          <label >คำนำหน้าชื่อ</label>
                          <select class="selectpicker form-control"  required name="prefix">
                          <option  >เลือก</option>
                            <option  value="นาย">นาย</option>
                            <option  value="นาง">นาง</option>
                            <option  value= "นางสาว">นางสาว</option>
                          </select>
                          </div>
                          <div class="col-md-5">
                          <br>
                            <label>ชื่อ</label>
                            <input type="text" class="form-control" required name="name_cus" id="name_cus" placeholder="กรอกชื่อลูกค้า" autofocus>
                          </div>
                          <div class="col-md-5">
                          <br>
                            <label >นามสกุล </label>
                            <input type="text" class="form-control" required name="cus_lname" id="cus_lname" placeholder="กรอกนามสกุล ลูกค้า " >
                          </div>
                    </div>


              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-6">
                    <label >ที่อยู่</label>
                    <input type="text" class="form-control" required name="add_cus" id="add_cus" placeholder="กรอกที่อยู่ " >
                  </div>
                  <div class="col-md-6">
                    <label >เบอร์โทรศัพท์</label>
                    <input type="text" class="form-control" required name="mem_cus" id="mem_cus" placeholder="กรอกเบอร์โทรศัพท์" >
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-6">
                    <label >อีเมลล์</label>
                    <input type="text" class="form-control" required name="email_cus" id="email_cus" placeholder="กรอกอีเมลล์" >
                  </div>
                  <div class="col-md-6">
                  <label >เลขบัญชี</label>
                    <input type="text" class="form-control" required name="acc_num" id="acc_num" placeholder="กรอกเลขบัญชี" >
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="row">
                  <div class="col-md-6">
                    <label >ชื่อพนักงาน</label>
                    <input type="text" class="form-control" required name="id_cus" id="id_cus" readonly="readonly" value="<?php echo getemp_name($conn)?>">
                  </div>
                  <div class="col-md-6">
                    <label >รหัสพนักงาน</label>
                    <input type="text" class="form-control" required name="id_cus" id="id_cus" readonly="readonly" value="<?php echo getemp_id($conn)?>">
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
