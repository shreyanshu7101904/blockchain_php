<?php
session_start();
$project_name=$_POST['project_name'];
$technology=$_POST['technology'];

$status=$_POST['status'];


   $dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = '';
   $dbname = 'blockchain contracts trading';
   // Create connection
   $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
   
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql="insert into project_details (project_name,technology,status) values ('$project_name','$technology','$status')";

   if ($conn->query($sql) === TRUE) {
   //echo "New record created successfully";
?>
	<script type="text/javascript">
    alert("Uploaded successfully");
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