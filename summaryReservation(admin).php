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
        $rID=$_SESSION['reser_id'];
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
        $cust_Name=$v1->cust_Name;
        $cust_Address=$v1->cust_Address;
        $cust_Phone=$v1->cust_Phone;
        $cust_Nationality=$v1->cust_Nationality;
        $cust_Email=$v1->cust_Email;
        //calculation
        if($reser_Room=="king"){
            $rCharge=300;
        }elseif($reser_Room=="queen"){
            $rCharge=200;
        }elseif($reser_Room=="double"){
            $rCharge=100;
        }else{
            $rCharge=80;
        }
        echo $pPrice;
        echo $rCharge;
        echo $pPax;
        $price=($pPrice+$rCharge)*$reser_Pax;
        //update reser_Price into vreservation
        $sql3="UPDATE vreservation SET reser_Price='$price' WHERE reser_ID='$rID'";
        $query1=mysql_query($sql3);
        if(isset($_POST['submit'])){
            //update latest pack_Pax into vpackage 
            $lPax=$pPax-$reser_Pax;
            $sql4="UPDATE vpackage SET pack_Pax='$lPax' WHERE pack_ID='$pID'";
            $query=mysql_query($sql4);
            if($query){
                header('Refresh:0;reservationOverview(admin).php');
                $_SESSION['reser_id']=null;
            }
        }
        ?>
        <form name="register2" method="POST">
                <div class="box">
                <span class="head">Summary: </span>
                <hr class="rule">
                <h2>User Information:</h2>
                    <div class="uinfo">
                        <p><?php echo "Name           : ".$cust_Name;?></p>
                        <p><?php echo "IC/Passport No : ".$cID;?></p>
                        <p><?php echo "Address        : ".$cust_Address;?></p>
                        <p><?php echo "Nationality    : ".$cust_Nationality;?></p>
                        <p><?php echo "Email          : ".$cust_Email;?></p>
                        <p><?php echo "Phone          : ".$cust_Phone;?></p>
                    </div>
                <h2>Package Information:</h2>
                <div class="uinfo">
                    <p><?php echo "Package Name           : ".$pName;?></p>
                    <p><?php echo "Package Location       : ".$pLocation;?></p>
                    <p><?php echo "Package Date           : ".$pDate;?></p>
                </div>
                <h2>Reservation Information:</h2>
                <div class="uinfo">
                    <p><?php echo "ID                 : ".$rID;?></p>
                    <p><?php echo "No                 : ".$reser_No;?></p>
                    <p><?php echo "Pax                : ".$reser_Pax;?></p>
                    <p><?php echo "Room Type          : ".$reser_Room;?></p>
                    <p><?php echo "Additional Request : ".$reser_Request;?></p>
                    <p><?php echo "Total Price        : RM".$price;?></p>
                </div>
                <div class="uinfo">
                    <br>
                    <p>*Customer can edit the reservation at reservation overview page</p>
                    <p>*Please print this page and bring IC and passport to our office for futher procedure</p>
                </div>
                <button class="btn btn-primary btn-lg float-right" name="submit">Save</button>
            </div>
        </form>
    </body>
</html>