<?php
session_start();
$name=$_POST['name'];
//echo $name;
$gender=$_POST['gen'];
//echo $gender;
$email=$_POST['email'];
//echo $email;
$domain=$_POST['domain'];
//echo $password;
$phone=$_POST['mobile'];
//echo $mobile;

   $dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = '';
   $dbname = 'blockchain contracts trading';
   // Create connection
   $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
   
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql="insert into intern_register (name,gender,email,domain,phone) values ('$name','$gender','$email','$domain','$phone')";

   if ($conn->query($sql) === TRUE) {
   //echo "New record created successfully";
?>
	<script type="text/javascript">
    alert("Registered successfully");
    window.location.href = "profile.php";
    </script>
<?php
	//header("Location:profile.php");
	}

else {
echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();	
?>