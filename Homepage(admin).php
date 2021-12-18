<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>VWorld ADMIN Main</title>
        <link rel="stylesheet" href="css/h1.css"> 
        <link rel="stylesheet" href="css/h(admin).css">     
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" ></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>
        <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Lato|Quicksand'>
        <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css'>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <!--Navigation Bar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                    <a class="nav-link" href="#">VWorld // ADMIN MAIN <span class="sr-only">(current)</span></a>
                    </li>
                </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                <a class="nav-link" href="sign out.php">Sign Out</a>
                </li>
            </ul>
        </nav>
        <?php include ('sql_connect.php');?>
        <?php
        session_start();
        $name=$_SESSION['name'];
        $sql="SELECT admin_ID,admin_Name FROM vadmin WHERE admin_Name='$name'";
        if (!$sql) {
            echo 'Could not run query: ' . mysql_error();
            exit;
        }
        $cursor=mysql_query($sql);
        $row = mysql_fetch_row($cursor);
        $_SESSION['ic']=$row[1];
        ?>
        <form class="menubox" action="" method="POST">
            <div class="mbox">
                <h1>ADMIN INFORMATION</h1>
                <div class="ainfo">
                    <br>
                    <p><?php echo "Staff Name  : ".$row[1];?></p>
                    <p><?php echo "Staff ID    : ".$row[0];?></p>
                    <br>
                    <hr class="rule">
                    <section id="menu">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <div class="uinfo">
                                        <br>
                                        <a class="button" style="vertical-align: middle" href="createPackage.php"><span>Create Package</span></a>
                                        <br>
                                        <a class="button" style="vertical-align: middle" href="reservationOverview(admin).php"><span>Reservation Overview</span></a>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="uinfo">
                                        <br>
                                        <a class="button" style="vertical-align: middle" href="viewPackage.php"><span>Package Overview</span></a>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="uinfo">
                                        <br>
                                        <p>SYSTEM INFO: version 1</p>
                                        <p>DATE: <?php echo date("d/m/Y");?></p>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </form>
    </body>
</html>