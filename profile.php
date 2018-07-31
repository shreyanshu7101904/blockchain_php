<?php
session_start();
echo "<h2>Welcome ".$_SESSION['user']."</h2>";
//echo "<br/>";
if($_SESSION['user']=="")
{
	session_destroy();
	header("Location:main.php");
}
   $dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = '';
   $dbname = 'blockchain contracts trading';
   // Create connection
   $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
   
   if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
} 

$sql="select name from intern_register";
$result =$conn->query($sql);

$query="select * from payment_details";
$res = $conn->query($query);
?>
<html>
<head>

<link rel="stylesheet" href="style.css?<?php echo time(); ?>" /> 

</head>
<body class="main">
<br/>
<a href="logout.php"><input type="button" value="Logout"></a>
<br/>	
<br/>
<div class="parent">

<div class="left">
<center><p><b>Register Intern<b></p>
<form action="reg_intern_code.php" method="post">
<table>
<tr>
<td>Name</td><td><input type="text" name="name"/></td>
</tr>
<tr>
<td>Gender</td><td><input type="radio" name="gen" value="male"/>Male
<input type="radio" name="gen" value="female"/>female</td>
</tr>
<tr>
<td>Email</td><td><input type="email" name="email"/></td>
</tr>
<tr>
<td>Domain</td><td><input type="text" name="domain"/></td>
</tr>
<tr>
<td>Mobile</td><td><input type="text" name="mobile"/></td>
</tr>
<tr>
<td></td>
<td><input type="submit" value="Register"/></td>
</tr>
</table>
</form>
</center>
</div>

<div class="center">
<center>
<p><b>New Project Details<b></p>
<form action="project_details.php" method="post">
<table>
<tr>
<td>Project Name</td><td><input type="text" name="project_name"/></td>
</tr>
<tr>
<td>Technology</td><td><input type="text" name="technology"/></td>
</tr>
<tr>
<td>Status</td><td><input type="radio" name="status" value="completed"/>completed
<input type="radio" name="status" value="ongoing"/>ongoing</td>
</tr>
<tr>
<td></td>
<td><input type="submit" value="upload"/></td>
</table>
</form>
</center>
</div>
	
<div class="right">
<center>
<p><b>payment<b></p>
<form action="payment_details.php" method="post">
<table>
<tr>
<td>Name of Intern</td><td>
<?php
	if ($result->num_rows > 0){
	echo "<select name='intern_name'>";
	while ($row = $result->fetch_assoc()){
		echo "<option>".$row['name']."</option>";
	}
	echo "</select>";
	}  

?>
</td>
</tr>
<!--<input type="text" name="intern_name"/><br/>-->
<tr>
<td>Amount Paid</td><td><input type="text" name="amount"/></td>
</tr>
<tr>
<td></td>
<td><input type="submit" value="submit"/></td>
</tr>
</table>
</form>
</center>
</div>

</div>


<div class="payment-container">
<p>Details of Payments Done</p>
<marquee direction="up" scrollamount="3">
<table align="center">
<tr>
<th>Name</th><th>Amount</th><th>Date</th>
</tr>
<?php
	
	if ($res->num_rows > 0){
		while ($rows = $res->fetch_assoc()){
		echo "<tr>";
		echo "<td>".$rows['intern_name']."</td>";
		echo "<td>".$rows['amount']."</td>";
		echo "<td>".$rows['date']."</td>";
		echo "</tr>";
		
		
	} 
	} 
?>

</table>
</marquee>
</div>




</body>
</html>
