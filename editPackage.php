<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>VWorld Edit Package</title>
        <link rel="stylesheet" href="css/insert.css">
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
                <a class="nav-link" href="#">VWorld // Edit Package <span class="sr-only">(current)</span></a>
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
    if(isset($_POST['submit']))
    {
        $pac_name=$_POST['pac_name'];
        $pac_location=$_POST['pac_location'];
        $pac_Date=$_POST['pac_date'];
        $pac_price=$_POST['pac_price'];
        $pac_pax=$_POST['pac_pax'];
        // Update existing package
        $sql="UPDATE vpackage SET pack_Name='$pac_name',pack_Location='$pac_location',pack_Date='$pac_Date',pack_Price='$pac_price',pack_Pax='$pac_pax'WHERE pack_ID='{$_GET['id']}'";
        $query=mysql_query($sql);
        if($query){
            header('Refresh:0;viewPackage.php');
            echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Package Updated Succesfully!.')
            </SCRIPT>");
        }
    }
    if(isset($_GET['edited'])){
        $sql="SELECT * FROM vpackage WHERE pack_ID='{$_GET['id']}'";
        $query=mysql_query($sql);
        $row=mysql_fetch_object($query);
        $pac_id=$row->pack_ID;
        $pac_name=$row->pack_Name;
        $pac_location=$row->pack_Location;
        $pac_date=$row->pack_Date;
        $pac_price=$row->pack_Price;
        $pac_pax=$row->pack_Pax;
    }
    ?>
    <form class="register" action="" method="POST">
        <div class="box">
            <span class="head">Edit Package: </span>
            <input type="hidden" name="pac_ID" value="<?php echo $pac_id;?>"/>
            <div class="wrap-input100 validate-input" data-validate="Package Name is required">
                <span class="label-input100">Package Name</span>
                <input class="input100" type="text" name="pac_name" placeholder="Package Name..."  value="<?php echo $pac_name;?>">
                <span class="focus-input100"></span>
            </div>
            <div class="wrap-input100 validate-input" data-validate="Location is required">
                <span class="label-input100">Location</span>
                <input class="input100" type="text" name="pac_location" placeholder="Location..." value="<?php echo $pac_location;?>">
                <span class="focus-input100"></span>
            </div>

            <div class="wrap-input100 validate-input" data-validate="Date is required">
                <span class="label-input100">Date</span>
                <input class="input100" type="text" name="pac_date" placeholder="Date..." value="<?php echo $pac_date;?>">
                <span class="focus-input100"></span>
            </div>
           
            <div class="wrap-input100 validate-input" data-validate="Price is required">
                <span class="label-input100">Price per pax</span>
                <input class="input100" type="text" name="pac_price" placeholder="Price Name..." value="<?php echo $pac_price;?>">
                <span class="focus-input100"></span>
            </div> 
            
            <div class="wrap-input100 validate-input" data-validate="No of pax is required">
                <span class="label-input100">Number of pax</span>
                <input class="input100" type="text" name="pac_pax" placeholder="No of pax..." value="<?php echo $pac_pax;?>">
                <span class="focus-input100"></span>
            </div>
            <div class="container-login100-form-btn">
							<div class="wrap-login100-form-btn">
								<div class="login100-form-bgbtn"></div>
								<button class="login100-form-btn" name="submit">
									Update Package
							</button>
				</div>
			</div>
        </div>
    </form>
    </body>
</html>