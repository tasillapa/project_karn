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
        <button type="button" class="btn btn-info" href="manage_vendor.php">back</button>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <div class="mt-4 mb-3">
        <h1 class="text-center">การสั่งซื้อ</h1>
      </div>

      <!-- <h1 class="text-center">กรอกข้อมูลพนักงาน</h1> -->

      <div class="mt-4 mb-3">
        <div class="jumbotron">
            
          <form> 
              <div class="form-group">
                    <div class="row">
                          <div class="col-md-6">
                            <label for="van-name">รหัสบิล</label>
                            <input type="text" class="form-control" id="van-name" placeholder="Random บิล  vandor">
                          </div>
                          <div class="col-md-6">
                            <label for="vander-name">ชื่อ vender</label>
                            <select class="selectpicker form-control">
                              <option>A</option>
                              <option>B</option>
                              <option>C</option>
                              <option>D</option>
                              <option>E</option>
                              <option>F</option>
                            </select>
                          </div> 
                    </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-6">
                    <label for="date">วันเดือนปี</label>
                    <input type="text" class="form-control" id="date" placeholder="กรอก วันเดือนปี">
                  </div>
                  <div class="col-md-6">
        
                  </div> 
                </div>
              </div>
  
                
            </div>
              
          </form>


          <div class="mt-4 mb-3">
            <div class="row">
              <div class="col-md-1">

              </div>

              <div class="col-md-10">
              <table class="table  table-responsive-md">
              <thead>
                <tr>
                  <th scope="col">ลำดับ</th>
                  <th scope="col">รายการ</th>
                  <th scope="col">จำนวน</th>
                  <th scope="col">ราคาต่อชิ้น</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>
                      <select class="selectpicker form-control ">
                              <option>A</option>
                              <option>B</option>
                              <option>C</option>
                              <option>D</option>
                              <option>E</option>
                              <option>F</option>
                      </select>
                  </td>
                  <td>
                  <input type="text" class="form-control" placeholder="จำนวน">
                  </td>
                  <td>
                  <input type="text" class="form-control" placeholder="เลือกมาจาก product">
                  </td>
                  
                </tr>
                <tr>
                  <th scope="row">2</th>
                  <td><select class="selectpicker form-control ">
                              <option>A</option>
                              <option>B</option>
                              <option>C</option>
                              <option>D</option>
                              <option>E</option>
                              <option>F</option>
                      </select></td>
                  <td> <input type="text" class="form-control" placeholder="จำนวน"></td>
                  <td>
                  <input type="text" class="form-control" placeholder="เลือกมาจาก product"></td>
                </tr>
                <tr>
                  <th scope="row">3</th>
                  <td><select class="selectpicker form-control ">
                              <option>zccwcwcwcwcwcwcwcwcwcwcwcwcwcwcwA</option>
                              <option>B</option>
                              <option>C</option>
                              <option>D</option>
                              <option>E</option>
                              <option>F</option>
                      </select></td>
                  <td> <input type="text" class="form-control" placeholder="จำนวน"></td>
                  <td>
                  <input type="text" class="form-control" placeholder="เลือกมาจาก product"></td>
                </tr>
              </tbody>
            </table>
              </div>
                  <div class="col-md-1">
                  </div>
        </div>
    </div>

   
      
    <form> 
              <div class="mt-4 mb-3">
            <div class="row">
              <div class="col-md-1">
              </div>
               <div class="col-md-6">
                            <label for="emp-name">ชื่อพนักงาน</label>
                            <input type="text" class="form-control" id="emp-name" placeholder="กรอกชื่อพนักงาน">
                </div>
                <div class="col-md-5">
                <label for="pri">ราคารวม</label>
                            <input type="text" class="form-control" id="pri" placeholder="แสดงราคาทั้งหมด">

              </div>





            </div>
          </div>
              

            </div>
          </form>
 


       
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
