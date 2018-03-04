
<?php session_start(); 

include('service/connect_db.php');


function getempname($conn)
{
  $pass = $_SESSION['mem_password'];
  $sql = " SELECT emp_name_title,emp_fname ,emp_lname FROM member NATURAL JOIN employee 
            WHERE emp_id = $pass LIMIT 1;";

  $result = mysqli_query($conn,$sql);

  while($row = mysqli_fetch_array($result)){
    
          echo $row['emp_name_title']." ".$row['emp_fname']." ".$row['emp_lname']."<br/>";
           
  }

}
function getemprank($conn)
{
  $pass = $_SESSION['mem_password'];
  $sql = "SELECT * FROM `employee` INNER JOIN  rank ON rank.rank_id = employee.rank_id 
          WHERE emp_id = $pass LIMIT 1;";

  $result = mysqli_query($conn,$sql);
  
  while($row = mysqli_fetch_array($result)){
    
          echo $row['rank_name']."<br/>";
           
  }

}


// SELECT * FROM `employee` INNER JOIN 
// rank ON rank.rank_id = employee.rank_id;



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
        <a class="navbar-brand" href="emp.php">mtec</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  ข้อมูลพนักงาน
                </a>
               
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
                <a class="dropdown-item" href="data_add_emp.php">เพิ่มข้อมูลพนักงาน</a>
                    <a class="dropdown-item" href="show_emp.php">แสดงข้อมูลพนักงาน</a>
                   
                </div>
               
              </li>
              <li class="nav-item">
                <a class="nav-link -toggle" href="service/logout_emp.php" id=""  aria-haspopup="true" aria-expanded="false">
                 ออกจากระบบ
                </a>
               
              </li>

          </ul>
        </div>
      </div>
    </nav>
      <!-- Features Section -->
      <div class="container">
      <div class="mt-4 mb-3">
      <div class="jumbotron">
      <div class="row">
        <div class="col-lg-3">
        <img class="img-fluid rounded" src="http://www.top-madagascar.com/assets/images/admin/user-admin.png" alt="">
       
        </div>
        <div class="col-lg-9">
          <h2>ข้อมูลพนักงาน</h2>
          <h5>รายละเอียด</h5>
          <p>
          &nbsp; &nbsp; &nbsp;<?php  echo getempname($conn) ?>
          
          <h5>ตำแหน่ง</h5>
          &nbsp; &nbsp; &nbsp; <? echo getemprank($conn)?>
          </p>
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
        </div>
      </div>
      </div>
      </div>
      <!-- /.row -->
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
