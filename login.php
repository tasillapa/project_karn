                    <?php session_start(); ?>
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
                    <a class="navbar-brand" href="#">ระบบสินค้า</a>
                    </div>
                    </div>
                    </nav>

                    <header>
                    </header>

                    <!-- Page Content -->
                    <div class="container">

                    <h1 class="my-6">
                    <div class="mt-4 mb-3">
                    <div class="text-center">Login</div>
                    </h1>
                    </div>

                    <div class="row">
                    <div class= "col-md-4"></div>

                    <div class= "col-md-4">
                    <div class="jumbotron">
                    <form role="form" method="post" action="service/login_member.php">
                                <div class="col-md-4"></div>
                                <div class="form-group">
                                        <label >username</label>
                                        <input type="text" class="form-control" required  name="username"  id="username"type="text" autofocus>
                                </div>
                                <div class="form-group">
                                        <label >password</label>
                                        <input type="password" class="form-control" id="password" required name="password" type="password">
                                </div>
                                <input type="submit" class="btn btn-lg btn-success btn-block"name="login" id="login" value="Login">
                                <!-- <a href="index.html" class="btn btn-lg btn-success btn-block" role="button">Login Link</a> -->
                                </div>
                    </form>
                    </div>
                    </div>
                    <div class= "col-md-4"></div>
                    </div>
                    </div>
                    <!-- Footer -->
                    <footer class="py-5 bg-dark">
                    <div class="container">
                    <p class="m-0 text-center text-white">footer</p>
                    </div>
                    <!-- /.container -->
                    </footer>

                    <!-- Bootstrap core JavaScript -->
                    <script src="vendor/jquery/jquery.min.js"></script>
                    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

                    </body>

                    </html>
