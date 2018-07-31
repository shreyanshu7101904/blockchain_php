<?php
session_start();
$username=$_POST['username'];
//echo $username;
$password=$_POST['pass'];
//echo $password;


   $dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = '';
   $dbname = 'blockchain contracts trading';
   // Create connection
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
   
   if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
   
 // echo 'Connected successfully';
   
  // mysql_close($conn);


$query="select * from admin_login where username='$username' and  password='$password'";
$res=$conn->query($query);
if ($res->num_rows > 0)
{
$_SESSION['user']=$username;
header("Location:profile.php");
}
else
{
header("Location:main.php");	
}

?>