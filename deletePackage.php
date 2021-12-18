<?php
// Delete package
     $pac_id="0";
     $pac_name="";
     $pac_location="";
     $pac_price="0.0";
     $pac_pax="0";
    include('sql_connect.php');
    $error="";
    $del=$_GET['id'];
    echo $del;
    if(isset($_GET['deleted'])){
		$sql="delete from vpackage where pack_ID='$del'";
		$query=mysql_query($sql);
		if($query){
			{
                header('Refresh:0;viewPackage.php');
                echo ("<SCRIPT LANGUAGE='JavaScript'>
                window.alert('Package Deleted Succesfully!.')
                </SCRIPT>");
                
			}
		}
	}
    ?>