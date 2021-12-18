<?php 
require ('sql_connect.php');
session_start();
if (isset($_POST['submit'])){
$email=mysql_escape_string($_POST['email']);
$password=mysql_escape_string($_POST['pass']);
if (!$_POST['email'] | !$_POST['pass'] | strlen($_POST['email'])<5)  
{
echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('You did not complete all of the required fields and email must at lease more than 5 character!!!')
        window.location.href='sign in(mem).html'
        </SCRIPT>"); 
exit();      
    } 
$sql= mysql_query("SELECT * FROM `customer` WHERE `cust_Email` = '$email' AND `cust_Pass` = '$password'");
if(mysql_num_rows($sql) > 0)
{
$_SESSION['email']=$email;
echo ("<SCRIPT LANGUAGE='JavaScript'>
     window.alert('Login Succesfully!.')
     window.location.href='Homepage(user).php'
     </SCRIPT>"); 

exit(); 
}
else{ echo ("<SCRIPT LANGUAGE='JavaScript'>
      window.alert('Wrong username password combination.Please re-enter.')
      window.location.href='sign in(mem).html'
      </SCRIPT>"); 
exit(); 
} 
}
else{
} 
?> 