<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>VWorld Make Reservation</title>
        <link rel="stylesheet" href="css/h1.css">
        <link rel="stylesheet" href="css/hu(insert).css"> 
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" ></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>
        <!--===============================================================================================-->	
            <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
        <!--===============================================================================================-->
            <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
        <!--===============================================================================================-->
            <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <!--===============================================================================================-->
            <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
        <!--===============================================================================================-->
            <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
        <!--===============================================================================================-->
            <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
        <!--===============================================================================================-->	
            <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
        <!--===============================================================================================-->
            <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
        <!--===============================================================================================-->
            <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
        <!--===============================================================================================-->	
            <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
        <!--===============================================================================================-->
            <link rel="stylesheet" type="text/css" href="css/util.css">
            <link rel="stylesheet" type="text/css" href="css/main.css">
        <!--===============================================================================================-->
    </head>
    <body>
        <!--Navigation Bar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                <a class="nav-link" href="#">VWorld // Make Reservation <span class="sr-only">(current)</span></a>
                </li>
            </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
            <a class="nav-link" href="Homepage(user).html">Main Menu</a>
            </li>
        </ul>
    </nav>
    <!---Form-->
    <?php
    include('sql_connect.php');
    $error="";
    session_start();
    $ic=$_SESSION['ic'];
    $sql="select * from customer where ic='{$_GET['cust_IC']}'";
    $query=mysql_query($sql);
    $row=mysql_fetch_object($query);
    $cust_IC=$row->cust_IC;
    $cust_Name=$row->cust_Name;
    $cust_Address=$row->cust_Address;
    $cust_Nationality=$row->$cust_Nationality;
    $cust_email=$row->$cust_email;
    ?>
    <form class="register" action="" method="POST">
        <div class="box">
            <span class="head">Reservation Form: </span>

            <div class="wrap-input100 validate-input" data-validate="Name is required">
                <span class="label-input100">Full Name</span>
                <input class="input100" type="text" name="name" placeholder="Name..." value="<?php echo $cust_Name; ?>">
                <span class="focus-input100"></span>
            </div>
            <div class="wrap-input100 validate-input" data-validate="Address is required">
                <span class="label-input100">Address</span>
                <input class="input100" type="text" name="address" placeholder="Address...">
                <span class="focus-input100"></span>
            </div>
            <section>
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="wrap-input100 validate-input" data-validate="IC/Passport is required">
                                <span class="label-input100">IC/Passport No</span>
                                <input class="input100" type="text" name="ic" placeholder="IC/Passport...">
                                <span class="focus-input100"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="wrap-input100 validate-input" data-validate="Phone Number is required">
                                <span class="label-input100">Phone Number:</span>
                                <input class="input100" type="text" name="ic" placeholder="Phone Number...">
                                <span class="focus-input100"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section>
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="wrap-input100 validate-input" data-validate="Email is required">
                                <span class="label-input100">Email</span>
                                <input class="input100" type="text" name="ic" placeholder="Email...">
                                <span class="focus-input100"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="wrap-input100 validate-input" data-validate="Nationality is required">
                                <span class="label-input100">Nationality:</span>
                                <input class="input100" type="text" name="ic" placeholder="Nationality...">
                                <span class="focus-input100"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </form>
    </body>
</html>