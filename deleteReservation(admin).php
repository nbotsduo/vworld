<?php
// Delete package
     
    include('sql_connect.php');
    $error="";
    if(isset($_GET['deleted'])){
		$sql="delete from vreservation where reser_ID='{$_GET['id']}'";
		$query=mysql_query($sql);
		if($query){
			{
                header('Refresh:0;reservationOverview(admin).php');
                echo ("<SCRIPT LANGUAGE='JavaScript'>
                window.alert('Reservation Deleted Succesfully!.')
                </SCRIPT>");
                
			}
		}
	}
    ?>