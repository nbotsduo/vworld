<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>VWorld Create Package</title>
        <link rel="stylesheet" href="css/h1.css">
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
                <a class="nav-link" href="#">VWorld // Create Package <span class="sr-only">(current)</span></a>
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
        $pac_id=$_POST['pac_id'];
        $pac_name=$_POST['pac_name'];
        $pac_location=$_POST['pac_location'];
        $pac_Date=$_POST['pac_date'];
        $pac_price=$_POST['pac_price'];
        $pac_pax=$_POST['pac_pax'];
        $sql="INSERT INTO vpackage(pack_ID,pack_Name,pack_Location,pack_Date,pack_Price,pack_Pax) VALUES ('$pac_id','$pac_name','$pac_location','$pac_Date','$pac_price','$pac_pax')";
        $query=mysql_query($sql);
        echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Create Succesfully!.')
            window.location.href='viewPackage.php'
            </SCRIPT>");
    }
    
    ?>
    <form class="register" action="" method="POST">
        <div class="box">
            <span class="head">Create Package: </span>
            <input type="hidden" name="pac_ID" value="0"/>
            <div class="wrap-input100 validate-input" data-validate="Package ID is required">
                <span class="label-input100">Package ID (2-KL,3-Melaka,4-K.Terengganu)</span>
                <input class="input100" type="text" name="pac_id" placeholder="Package Name..." >
                <span class="focus-input100"></span>
            </div>
            <div class="wrap-input100 validate-input" data-validate="Package Name is required">
                <span class="label-input100">Package Name</span>
                <input class="input100" type="text" name="pac_name" placeholder="Package Name..." >
                <span class="focus-input100"></span>
            </div>
            <div class="wrap-input100 validate-input" data-validate="Location is required">
                <span class="label-input100">Location</span>
                <input class="input100" type="text" name="pac_location" placeholder="Location...">
                <span class="focus-input100"></span>
            </div>
           
            <div class="wrap-input100 validate-input" data-validate="Date is required">
                <span class="label-input100">Date</span>
                <input class="input100" type="text" name="pac_date" placeholder="Date...">
                <span class="focus-input100"></span>
            </div>

            <div class="wrap-input100 validate-input" data-validate="Price is required">
                <span class="label-input100">Price per pax</span>
                <input class="input100" type="text" name="pac_price" placeholder="Price Name...">
                <span class="focus-input100"></span>
            </div> 
            
            <div class="wrap-input100 validate-input" data-validate="No of pax is required">
                <span class="label-input100">Number of pax</span>
                <input class="input100" type="text" name="pac_pax" placeholder="No of pax..." >
                <span class="focus-input100"></span>
            </div>

            <div class="container-login100-form-btn">
							<div class="wrap-login100-form-btn">
								<div class="login100-form-bgbtn"></div>
								<button class="login100-form-btn" name="submit">
									Create Package
							</button>
				</div>
			</div>
        </div>
    </form>
    </body>
</html>