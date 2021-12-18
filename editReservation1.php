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
            <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>            
            <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">            
            <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">            
            <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">            
            <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">            
            <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">            	
            <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">            
            <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">            
            <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">            	
            <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">            
            <link rel="stylesheet" type="text/css" href="css/util.css">
            <link rel="stylesheet" type="text/css" href="css/main.css">
            <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
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
        <?php
        include('sql_connect.php');
        $error="";
        // get data from table vreservation and vpackage
        $rID=$_SESSION['reser_id'];
        echo $rID;
        $sql="SELECT * FROM vreservation WHERE reser_ID='$rID'";
        $result = mysql_query($sql);
        $value = mysql_fetch_object($result);
        $pID = $value->pack_ID;
        $uRequest=$value->reser_Request;
        $uPax=$value->reser_Pax;
        $sql1="SELECT pack_Pax FROM vpackage WHERE pack_ID='$pID'" ;
        $result1=mysql_query($sql1);
        $v=mysql_fetch_object($result1);
        $pPax=$v->pack_Pax;
        
        //update recent data from table vreservation
        if(isset($_POST['submit'])){
            $pax=$_POST['quantity'];
            $request=$_POST['Request'];
            $sql3="UPDATE vreservation SET reser_Pax='$pax',reser_Request='$request' WHERE reser_ID='$rID'";
            $query=mysql_query($sql3);
            if($query){
                header('Refresh:0;summaryReservation.php');
            }
        }
        ?>
        <form name="register2" method="POST">
            <div class="box">
            <span class="head">Reservation Form: </span>
            <hr class="rule">
            <br> <h2>Package Detail</h2><br>
            <div>
            <span class="label-input100">Pax</span>
            </div>
            <div class="container">
            <div class="col-lg-2">
                                        <div class="input-group">
                                    <span class="input-group-btn">
                                        <button type="button" class="quantity-left-minus btn btn-danger btn-number"  data-type="minus" data-field="">
                                          <span class="glyphicon glyphicon-minus"></span>
                                        </button>
                                    </span>
                                    <input type="text" id="quantity" name="quantity" class="form-control input-number" value="<?php echo $uPax;?>" min="1" max="<?php echo $pPax;?>">
                                    <span class="input-group-btn">
                                        <button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus" data-field="">
                                            <span class="glyphicon glyphicon-plus"></span>
                                        </button>
                                    </span>
                                </div>
                        </div>
            </div>

            <div class="wrap-input100 validate-input" data-validate="Additional Request is optional">
                <span class="label-input100">Additional Request</span>
                <input class="input100" type="text" name="Request" placeholder="Additional Request..."  value="<?php echo $uRequest;?>">
                <span class="focus-input100"></span>
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
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script src="js/counter.js"></script>
    </body>
</html>