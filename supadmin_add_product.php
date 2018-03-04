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
        <a class="navbar-brand" href="#">เพิ่มข้อมูล</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
          <li class="nav-item">
                <a class="nav-link -toggle" href="#">
                    แสดงข้อมูลผลิตภัณฑ์
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link -toggle" href="service/logout_emp.php">
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
        <h1 class="text-center">เพิ่มข้อมูลผลิตภัณฑ์</h1>
      </div>

      <!-- <h1 class="text-center">กรอกข้อมูลพนักงาน</h1> -->
     
      <div class="mt-4 mb-3">
        <div class="jumbotron">
            
          <form name="sup_add_product" action="add_data/sup_add_product.php" method="post" > 
                 <div class="form-group">
                    <label>ชื่อสินค้า</label>
                    <input type="text" class="form-control"  required  name="name_pro" id="name_pro" placeholder="กรอกชื่อสินค้า">
               </div>
               <div class="form-group">
                  <label>ราคาสินค้า</label>
                  <input type="text" class="form-control"  required name="price"  id="price" placeholder="กรอกราคาสินค้า">
             </div> 
                    <div class="col-md-12">
                        <input type="submit" class="btn btn-lg btn-success btn-block"  name="add"  id="add" value="บันทึก"> 
                        <br>
                        
                      </div>  
                          <div class="col-md-12">
                          <input type="reset" class="btn btn-lg btn-danger btn-block" name="reset"  value="ยกเลิก">  
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
