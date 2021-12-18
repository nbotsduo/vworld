<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
        <title>VWorld Package Editor</title>
        
        <link rel="stylesheet" href="css/insert(table).css">
         
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
                <a class="nav-link" href="#">VWorld // PACKAGE EDITOR <span class="sr-only">(current)</span></a>
                </li>
            </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
            <a class="nav-link" href="Homepage(user).php">MAIN MENU</a>
            </li>
        </ul>
    </nav>
      <form action=""method="POST">
        <div class="box">
            <span class="head">Available Package : </span>
            <br>
           <!--Database connection-->
            <?php
            include("sql_connect.php");
            ?>
            <!--table-->
            <table class="table table-hover table-sm table-bordered">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">ID</th>
                  <th scope="col">Name</th>
                  <th scope="col">Location</th>
                  <th scope="col">Date</th>
                  <th scope="col">Price (RM)</th>
                  <th scope="col">Pax</th>
                </tr>
              </thead>
            <?php
            $sql="SELECT* FROM vpackage";
            $query=mysql_query($sql);
            if(mysql_num_rows($query)>0)
            {
              $i=1;
              while($row=mysql_fetch_object($query))
              {
            ?>
            <tbody>
              <tr>
                <td><?php echo $i++;?></td>
                <td><?php echo $row->pack_ID;?></td>
                <td><?php echo $row->pack_Name;?></td>
                <td><?php echo $row->pack_Location;?></td>
                <td><?php echo $row->pack_Date;?></td>
                <td><?php echo $row->pack_Price;?></td>
                <td><?php echo $row->pack_Pax;?></td>
              </tr>
            </tbody>
            <?php
              }
            }
            ?>
          </table>
        </div>
      </form>
    </body>
</html>