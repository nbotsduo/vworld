<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>VWorld Make Reservation</title>
        
        <link rel="stylesheet" href="css/insert.css"> 
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" ></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>
        <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Lato|Quicksand'>
        <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css'>
        <link rel="stylesheet" href="css/style.css">
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
            <a class="nav-link" href="Homepage(admin).php">Main Menu</a>
            </li>
        </ul>
    </nav>
    <!---Form-->
    <?php
    include('sql_connect.php');
    $error="";
    //get information from customer database
    
    $IC=$_SESSION['ic'];
    $sql="SELECT * FROM customer WHERE cust_IC='$IC'";
    $query=mysql_query($sql);
    $row=mysql_fetch_object($query);
    $cust_IC=$row->cust_IC;
    $cust_Name=$row->cust_Name;
    $cust_Address=$row->cust_Address;
    $cust_Phone=$row->cust_Phone;
    $cust_Email=$row->cust_Email;
    $cust_Nationality=$row->cust_Nationality;

    //get information from package database
    $sql1="SELECT * FROM vpackage";
    $query1=mysql_query($sql1);
    if(mysql_num_rows($query1)>0){
        $package=array(100);
        $pName=array(100);
        $i=0;
        while($row1=mysql_fetch_object($query1)){
            $package[$i]=$row1->pack_ID;
            $pName[$i]=$row1->pack_Name;
            $pPax[$i]=$row1->pack_Pax;
            $i++;
        }
    }

    //insert new reservation on vreservation database
    if(isset($_POST['submit'])){
        $rID=uniqid();
        $_SESSION['reser_id']=$rID;
        $pID=$_POST['package'];
        $_SESSION['pID']=$pID;
        $room=$_POST['radio'];
        $sql2="INSERT INTO vreservation(reser_ID,cust_IC,pack_ID,reser_Room) VALUES ('$rID','$cust_IC','$pID','$room')";
        $query3=mysql_query($sql2);
        if($query3){
            echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.location.href='createReservation1(admin).php'
            </SCRIPT>");
        }
    }
    ?>
    <form class="register" action="" method="POST">
        <div class="box">
            <span class="head">Reservation Form: </span>
            <hr class="rule">
            <br> <h2>Personal Information</h2><br>
            <input type="hidden" name="reser_id" value="<?php echo $rID; ?>"/>
            <div class="wrap-input100 validate-input" data-validate="Name is required">
                <span class="label-input100">Full Name</span>
                <input class="input100" type="text" name="name" placeholder="Name..." value="<?php echo $cust_Name; ?>">
                <span class="focus-input100"></span>
            </div>
            <div class="wrap-input100 validate-input" data-validate="Address is required">
                <span class="label-input100">Address</span>
                <input class="input100" type="text" name="Address" placeholder="Address..." value="<?php echo $cust_Address; ?>">
                <span class="focus-input100"></span>
            </div>
            <section>
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="wrap-input100 validate-input" data-validate="IC/Passport is required">
                                <span class="label-input100">IC/Passport No</span>
                                <input class="input100" type="text" name="ic" placeholder="IC/Passport..." value="<?php echo $cust_IC; ?>">
                                <span class="focus-input100"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="wrap-input100 validate-input" data-validate="Phone Number is required">
                                <span class="label-input100">Phone Number:</span>
                                <input class="input100" type="text" name="ic" placeholder="Phone Number..." value="<?php echo $cust_Phone; ?>">
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
                                <input class="input100" type="text" name="ic" placeholder="Email..." value="<?php echo $cust_Email; ?>">
                                <span class="focus-input100"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="wrap-input100 validate-input" data-validate="Nationality is required">
                                <span class="label-input100">Nationality:</span>
                                <input class="input100" type="text" name="ic" placeholder="Nationality..." value="<?php echo $cust_Nationality; ?>">
                                <span class="focus-input100"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <h2>Package Selection</h2>
            <div class="sel sel--">
                <select name="package">
                    <option value="" disabled>Package</option>
                    <option value="2" >Kuala Lumpur</option>
                    <option value="3" >Melaka</option>
                    <option value="4">Kuala Terengganu</option>
                        <?php
                            /*$j=0; 
                            while($j<$i){?>
                                <option value="<?php $package[$j];?>"><?php echo $pName[$j];?></option>
                            <?php $j++;}*/?>
                </select>
            </div>

            <div>
            <span class="label-input100">Room Type:</span>
            </div>
            <div class="room">
                <label class="container">Single
                    <input type="radio" checked="checked" name="radio" value="single">
                    <span class="checkmark"></span>
                </label>
                <label class="container">Double
                    <input type="radio" name="radio" value="double">
                    <span class="checkmark"></span>
                </label>
                <label class="container">Queen
                    <input type="radio" name="radio" value="queen">
                    <span class="checkmark"></span>
                </label>
                <label class="container">King
                    <input type="radio" name="radio" value="king">
                    <span class="checkmark"></span>
                </label>
            </div>

           <div class="container-login100-form-btn">
							<div class="wrap-login100-form-btn">
								<div class="login100-form-bgbtn"></div>
								<button class="login100-form-btn" name="submit">
									Next
							</button>
				</div>
            </div>
        </div>
    </form>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
    <script src="js/index.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="js/counter.js"></script>
    </body>
</html>