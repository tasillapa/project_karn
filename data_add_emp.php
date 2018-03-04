<?php session_start(); 

include('service/connect_db.php');

function emp_id($conn){

  $sql = " SELECT * FROM employee ORDER BY  emp_id  DESC LIMIT 0,1 ";
  $result = mysqli_query($conn,$sql);

    while($row = mysqli_fetch_assoc($result)){
      echo $row['emp_id'] + 1 ;

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
        <a class="navbar-brand" href="index.html">Start Bootstrap</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="data_add_emp.php" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  เพิ่มข้อมูลพนักงาน
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
                    <a class="dropdown-item" href="show_emp.php">แสดงข้อมูลพนักงาน</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link -toggle" href="service/logout_emp.php"   aria-haspopup="true" aria-expanded="false">
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
        <h1 class="text-center"> ข้อมูลพนักงาน</h1>
      </div>

      <!-- <h1 class="text-center">กรอกข้อมูลพนักงาน</h1> -->
     
      <div class="mt-4 mb-3">
        <div class="jumbotron">
            
          <form name="add_data" action="add_data/add_emp.php" method="post" > 
              <div class="form-group">
    

                  <label >ID พนักงาน</label>
                  <input  disabled class="form-control"  name="random"   value="<?php echo emp_id($conn) ;?>"   >
                 

                </div>
                 <div class="form-group">
                 <label >ชื่อแผนก</label>
                      <select class="selectpicker form-control"  required name="department_id">
                      <option >---เลือกแผนก---</option>
                        <option value="1">แผนกขาย</option>
                        <option value="2">แผนกบัญชี</option>
                        <option value="3">แผนกสโตร์</option>
                        <option value="4">แผนกประกอบ</option>
                        <option value="5">แผนกเชื่อม</option>
                        <option value="6">แผนกเสียบครอย</option>
                        <option value="7">แผนกปั๊ม</option>
                      </select>



                    <!-- <label for="department-id">ID แผนก</label>
                    <input type="text" class="form-control"  required  name="department_id" id="department_id" placeholder="กรอกข้อมูล id แผนก"> -->
               </div>
               <div class="form-group">
               <label >ชื่อตำแหน่ง</label>
                      <select class="selectpicker form-control"  required name="rank_id">
                      <option >---เลือกตำแหน่ง---</option>
                        <option value="1">หนักงานทั่วไป</option>
                        <option value="2">หัวหน้าแผนก</option>
                      </select>
                  <!-- <label for="rank-id">ID ตำแหน่ง</label>
                  <input type="text" class="form-control"  required name="rank_id"  id="rank_id" placeholder="กรอกข้อมูล id ตำแหน่ง"> -->
             </div> 
               <div class="form-group">
                <div class="row">
                <div class="col-md-2">
                <label >คำนำหน้าชื่อ</label>
                      <select class="selectpicker form-control"  required name="Mr_Mrs">
                      <option >เลือกคำนำหน้า</option>
                        <option >นาย</option>
                        <option >นาง</option>
                        <option >นางสาว</option>
                      </select>
                </div>

                  <div class="col-md-5">
                    <label for="fname">ชื่อ</label>
                    <input type="text" class="form-control" required  name="fname" id="fname" placeholder="กรอกชื่อ พนักงาน" >
                  </div>
                  <div class="col-md-5">
                    <label for="lname">นามสกุล</label>
                    <input type="text" class="form-control" required  name="lname"id="lname" placeholder="กรอกนามกุล พนักงาน" >
                  </div> 
                </div>
              </div>

              <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                        <label >เพศ</label>
                      <select class="selectpicker form-control"  required name="gender">
                        <option>ชาย</option>
                        <option>หญิง</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                      <label for="address">ที่อยู่</label>
                      <input type="text" class="form-control"required  name="address"  id="address" placeholder="กรอกที่อยู่ พนักงาน">
                    </div>
              </div>
              <div class="form-group">
                  <div class="row">
                    <div class="col-md-4">
                      <label >เลขบัตรประชาชน</label>
                      <input type="text" class="form-control" required  name="pe_id" id="pe_id" placeholder="กรอก id เลขบัตรประชาชน">
                    </div>
                    <div class="col-md-4">
                      <label for="nat-id">สัญชาติ</label>
                      <input type="text" class="form-control" required  name="nat_id"  id="nat_id" placeholder="กรอกข้อมูลสัญชาติ">
                    </div> 
                    <div class="col-md-4">
                        <label for="phone-id">เบอร์โทรศัพท์</label>
                        <input type="text" class="form-control" required  name="phone_id"id="phone_id" placeholder="กรอกเบอร์โทรศัพท์ ">
                      </div>
                  </div>
                </div>
                <div class="form-group">
                    <div class="row">
                      <div class="col-md-6">
                        <label for="date">วัน/เดือน/ปีเกิด</label>
                        <input type="date" class="form-control"required  name="date" id="date" placeholder="กรอก วัน/เดือน/ปีเกิด (2017-10-10)">
                        
                      </div>
                      <div class="col-md-6">
                        <label for="account">เลขที่บัญชี</label>
                        <input type="text" class="form-control"  required name="account" id="account" placeholder="กรอก เลขที่บัญชี">
                      </div> 
                    </div>
                  </div>
                  <div class="form-group">
                      <div class="row">
                        <div class="col-md-6">
                            <label for="eduction">วุฒิการศึกษา</label>
                            <select class="selectpicker form-control" required name="eduction">
                              <option>ม.3/ม.6</option>
                              <option>ปวช/ปวส</option>
                              <option>ปริญญาตรี</option>
                              <option>สูงกว่าปริญญาตรี</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                          <label for="social_se">ประกันสังคม</label>
                          <input type="text" class="form-control" required  name="social_se" id="social_se" placeholder="กรอก ข้อมูลประกันสังคม">
                        </div> 
                      </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                          <div class="col-md-12">
                              <label for="date">วันเริ่มทำงาน</label>
                              <input type="date" class="form-control" required name="fday" id="fday" placeholder="กรอก วันเริ่มทำงาน">
                          </div> 
                        </div>
                      </div>  
                     
                      <div class="row">
                      <div class="col-md-3">     
                    </div>
                    <div class="col-md-3">
                        <input type="submit" class="btn btn-lg btn-success btn-block"  name="add"  id="add" value="บันทึก">  
                      </div>  
                          <div class="col-md-3">
                              <input type="reset" class="btn btn-lg btn-danger btn-block" name="reset"  value="ยกเลิก">  
                            </div>  
                           <div class="col-md-3">       
                        </div>     
                  </div>     
                    </form>

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
