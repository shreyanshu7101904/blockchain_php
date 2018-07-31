<?php
session_start();
$intern_name=$_POST['intern_name'];
$amount=$_POST['amount'];
$date=date_default_timezone_set('Asia/Kolkata');
$currentDateTime = date('y-m-d H:i:s');
//echo $currentDateTime;

   $dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = '';
   $dbname = 'blockchain contracts trading';
   // Create connection
   $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
   
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql="insert into payment_details (intern_name,amount,date) values ('$intern_name','$amount','$currentDateTime')";

   if ($conn->query($sql) === TRUE) {
   //echo "New record created successfully";
?>
	<script type="text/javascript">
    alert("Details added successfully");
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
	
	
	
	
	