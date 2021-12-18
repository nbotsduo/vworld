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
            <a class="nav-link" href="Homepage(user).php">Main Menu</a>
            </li>
        </ul>
    </nav>
    <!---Form-->
    <?php
    include('sql_connect.php');
    $error="";
    $rID=$_GET['id'];
        //get data from vreservation
        $sql="SELECT * FROM vreservation WHERE reser_ID='$rID'";
        $result = mysql_query($sql);
        $value = mysql_fetch_object($result);
        $pID = $value->pack_ID;
        $cID=$value->cust_IC;
        $reser_Room=$value->reser_Room;
        $reser_Request=$value->reser_Request;
        $reser_Pax=$value->reser_Pax;
        $reser_No=$value->reser_No;
        //get data from vpackage
        $sql1="SELECT * FROM vpackage WHERE pack_ID='$pID'" ;
        $result1=mysql_query($sql1);
        $v=mysql_fetch_object($result1);
        $pPax=$v->pack_Pax;
        $pName=$v->pack_Name;
        $pLocation=$v->pack_Location;
        $pDate=$v->pack_Date;
        $pPrice=$v->pack_Price;
        //get data from customer
        $sql2="SELECT * FROM customer WHERE cust_IC='$cID'";
        $result2=mysql_query($sql2);
        $v1=mysql_fetch_object($result2);
        $cust_No=$v1->cust_No;
        $cust_Name=$v1->cust_Name;
        $cust_Address=$v1->cust_Address;
        $cust_Phone=$v1->cust_Phone;
        $cust_Nationality=$v1->cust_Nationality;
        $cust_Email=$v1->cust_Email;
    //update new reservation on vreservation database
    if(isset($_POST['submit'])){
        $uName=$_POST['name'];
        $uAddress=$_POST['Address'];
        $uIC=$_POST['ic'];
        $uPhone=$_POST['pno'];
        $uEmail=$_POST['email'];
        $uNationality=$_POST['country'];
        $sql3="UPDATE customer SET cust_IC='$cust_IC',cust_Name='$cust_Name',cust_Address='$cust_Address',cust_Phone='$cust_Phone',cust_Nationality='$cust_Nationality',cust_Email='$cust_Email' WHERE cust_No='$cust_No'";
        $query4=mysql_query($sql3);
        $_SESSION['reser_id']=$rID;
        $pID=$_POST['package'];
        $_SESSION['pID']=$pID;
        $request=$_POST['Request'];
        $room=$_POST['radio'];
        $sql2="UPDATE vreservation SET pack_ID='$pID',reser_Room='$room' WHERE reser_ID='$rID'";
        $query3=mysql_query($sql2);
        echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.location.href='editReservation1.php'
            </SCRIPT>");
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
                                <input class="input100" type="text" name="ic" placeholder="IC/Passport..." value="<?php echo $cID; ?>">
                                <span class="focus-input100"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="wrap-input100 validate-input" data-validate="Phone Number is required">
                                <span class="label-input100">Phone Number:</span>
                                <input class="input100" type="text" name="pno" placeholder="Phone Number..." value="<?php echo $cust_Phone; ?>">
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
                                <input class="input100" type="text" name="email" placeholder="Email..." value="<?php echo $cust_Email; ?>">
                                <span class="focus-input100"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="wrap-input100 validate-input" data-validate="Nationality is required">
                                <span class="label-input100">Nationality:</span>
                                <input class="input100" type="text" name="country" placeholder="Nationality..." value="<?php echo $cust_Nationality; ?>">
                                <span class="focus-input100"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <h2>Package Selection</h2>
            <div class="sel sel--">
                <select name="package" ?>">
                    
                    <option  <?php if($pID=='2') echo 'selected'; ?>  value="2" >Kuala Lumpur</option>
                    <option <?php if($pID=='3') echo 'selected'; ?> value="3" >Melaka</option>
                    <option <?php if($pID=='4') echo 'selected'; ?> value="4">Kuala Terengganu</option>
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
                    <input <?php if($reser_Room=='single') echo 'checked'; ?> type="radio"  name="radio" value="single">
                    <span class="checkmark"></span>
                </label>
                <label class="container">Double
                    <input <?php if($reser_Room=='double') echo 'checked'; ?> type="radio" name="radio" value="double">
                    <span class="checkmark"></span>
                </label>
                <label class="container">Queen
                    <input <?php if($reser_Room=='queen') echo 'checked'; ?> type="radio" name="radio" value="queen">
                    <span class="checkmark"></span>
                </label>
                <label class="container">King
                    <input <?php if($reser_Room=='king') echo 'checked'; ?> type="radio" name="radio" value="king">
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