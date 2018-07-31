<?php
   $dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = '';
   $dbname = 'blockchain contracts trading';
   // Create connection
   $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
   
   if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
} 

$intern_sql="select name from intern_register";
$result =$conn->query($intern_sql);

$list_of_projects = "select * from project_details";
$res =$conn->query($list_of_projects);
?>
<html>
<head>
<link rel="stylesheet" href="stle.css?<?php echo time(); ?>" />
</head>
<body class="main">
<h1>Blockchain Contracts Trading</h1>
<div class="parent">

	<div class="left">
	<p><center><b>list of interns<b></center></p>
	<hr/>
	<?php
	if ($result->num_rows > 0){
		echo "<marquee direction='up' scrollamount='3'>";
		while ($row = $result->fetch_assoc()){
			echo "<center>".$row['name']."</center><br/>";
		}
		echo "</marquee>";
		}  
	?>
	</div>

	<div class="center">
	<center><p><b>Admin login<b></p>
	<form action="logcode.php" method="post">
	USERNAME<input type="text" name="username"/><br/>
	PASSWORD<input type="password" name="pass"/><br/>
	<input type="submit" value="login"/>
	</form>
	</center>
	</div>

	<div class="right">
	<p><center><b>List of completed and upcoming projects<b></center></p>
	<hr/>
	<marquee direction="up" scrollamount="3">
<table align="center">
<tr>
<th>Project Name</th><th>Technology</th><th>Status</th>
</tr>
<?php
	
	if ($res->num_rows > 0){
		while ($rows = $res->fetch_assoc()){
		echo "<tr>";
		echo "<td>".$rows['project_name']."</td>";
		echo "<td>".$rows['technology']."</td>";
		echo "<td>".$rows['status']."</td>";
		echo "</tr>";
		
		
	} 
	} 
?>

</table>
</marquee>
	</div>
</div>


</body>
</html>