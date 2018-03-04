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
        <a class="navbar-brand" href="emp.php">Home</a>
        
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link -toggle" href="service/logout_emp.php"   aria-haspopup="true" aria-expanded="false">
                 ออกจากระบบ
                </a>
              </li>
          </ul>
        </div>
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
                                    $sql = "SELECT * FROM employee  
                                            JOIN rank ON rank.rank_id = employee.rank_id 
                                            JOIN department ON department.dep_id = employee.dep_id
                                            WHERE employee.emp_id; ";
                                    $result = mysqli_query($conn,$sql);
                                    

                                    
                                    echo "<tbody>";
                                 
                                    echo "<thead align='center' >  " ;
                                    echo "<tr>" ;
                                        echo "<th scope='col'>" ."ลำดับที่". "</th>";
                                        echo "<th scope='col'>" ."รหัสพนักงาน". "</th>";
                                            echo "<th scope='col'>" ."ชื่อแผนก". "</th>";
                                            echo "<th scope='col'>" ."ชื่อตำแหน่ง". "</th>";
                                            echo "<th scope='col'>" ."ชื่อพนักงาน". "</th>";
                                            echo "<th scope='col'>" ."นามสกุล". "</th>";
                                            echo "<th scope='col'>" ."จัดการ". "</th>";
                                            echo "</thead>";
                                    echo "</tr>";
                                    $i = 1;
								              while($row = mysqli_fetch_array($result)){
                                
                               
                                              echo "<tr align='center'>";
                                              echo "<th scope='col' style='width:7%'>" .$i. "</th>";
                                              echo "<td scope='col' style='width:8%'>" .$row["emp_id"]. "</td>";
                                              echo "<td scope='col' style='width:10%'>" .$row["dep_name"]. "</td>";
                                              echo "<td scope='col' style='width:10%'>" .$row["rank_name"]. "</td>";
                                              echo "<td scope='col' style='width:15%'>" .$row["emp_name_title"]." ".$row['emp_fname']."</td>";
                                              echo "<td scope='col' style='width:15%'>" .$row["emp_lname"]. "</td>";
                                              echo "<td scope='col' style='width:15%'>
                                                      <a href='#' data-toggle='modal'><button type='button' class='btn btn-warning btn-sm'><span class='glyphicon glyphicon-edit' aria-hidden='true'></span>แก้ไข</button></a>
                                                      <a href='#' data-toggle='modal'><button type='button' class='btn btn-danger btn-sm'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span>ลบ</button></a>
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
      <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2017</p>
      </div> 
     
      <!-- /.container -->
    <!-- </footer> -->

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    



  </body>

</html>
