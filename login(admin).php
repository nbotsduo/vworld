<?php 
require ('sql_connect.php');
session_start();
if (isset($_POST['submit'])){
$username=mysql_escape_string($_POST['name']);
$password=mysql_escape_string($_POST['pass']);
if (!$_POST['name'] | !$_POST['pass'] | strlen($username)<5)  
{
echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('You did not complete all of the required fields and username must at lease more than 5 character!!!')
        window.location.href='sign in(admin).html'
        </SCRIPT>"); 
exit();      
    } 
$sql= mysql_query("SELECT * FROM `vadmin` WHERE `admin_Name` = '$username' AND `admin_Pass` = '$password'");
if(mysql_num_rows($sql) > 0)
{
$_SESSION['name']=$username;
echo ("<SCRIPT LANGUAGE='JavaScript'>
     window.alert('Login Succesfully!.')
     window.location.href='Homepage(admin).php'
     </SCRIPT>"); 

exit(); 
}
else{ echo ("<SCRIPT LANGUAGE='JavaScript'>
      window.alert('Wrong username password combination.Please re-enter.')
      window.location.href='sign in(admin).html'
      </SCRIPT>"); 
exit(); 
} 
}
else{
} 
?> 