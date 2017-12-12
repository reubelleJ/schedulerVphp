<!HTML>

<?php
	
	//Start new or resume existing session
	session_start();
	//Create a connection with mysqli_connect($servername, $username, $password, $dbname) fucntion
	$con = mysqli_connect("localhost","root","","php");

?>
<html>
	<head>

		<title>View users - Admin Panel</title>
		
<!-- some css for the table & body of the page -->
<style>

body{
	padding:0;
	margin:0;
	background:#205060;
}

table{
	color:white;
	padding:2px;
	width:1000px;
	background:#2d7086;
	border:2px solid black;
}
h3{
	float:right;
	margin-right:105px;
}
input{
	padding:5px;
}
</style>
	</head>

<body>

<!-- Create a table with <table> tag -->
	<table align="center">
	<!-- <tr> creates a row in the table -->
		<tr align="center">
			<td colspan="8"><h2>Admin Panel</h2></td>
		</tr>
		<tr align="center">
		<!-- <th> tag defines a header cell in an HTML table -->
			<th style="color: #133039">S.N</th>
			<th style="color: #133039">Name</th>
			<th style="color: #133039">Email</th>
			<th style="color: #133039">Password</th>			
			<th style="color: #133039">Image</th>
			<th style="color: #133039">Date</th>
			<th style="color: #133039">Edit</th>
			<th style="color: #133039">Delete</th>	
		</tr>
	
		<?php
//**FETCH TABLE DATA**//	
	
			//create query, select all database table rows
			$select = "SELECT * FROM register_user ";
			
			//run the query against database
			$run = mysqli_query($con,$select);
			
			$i=0;
			//fetch all database table rows to an associate array
			//use local varibles and array to store the table values
			while($row=mysqli_fetch_array($run))
			{
				$id = $row['user_id'];
				$name= $row['user_name'];
				$email= $row['user_email'];
				$image = $row['user_image'];
				$date = $row['register_date'];
				$pass = $row['user_pass'];
				$i++;
		?>
		
		<!-- display data into HTML table -->
		<tr align="center">
			<td><?php echo $i; ?></td>
			<td><?php echo $name; ?></td>
			<td><?php echo $email; ?></td>
			<td><?php echo $pass; ?></td>
			<td><img src="images/<?php echo $image; ?>" width="40" height="40"/></td>
			<td><?php echo $date; ?></td>
			<td><a href="admin_edit_users.php?id=<?php echo $id;?>">Edit</a></td>
			<td><a href="admin_view_users.php?id=<?php echo $id;?>">Delete</a></td>
		</tr>	
	
	<?php }//end while ?>
	
	</table>
	
	<h3>Admin: <?php echo $_SESSION['admin_email'];?><a href="admin_logout.php"> Logout</a></h3>
	
	
	
	<?php
//**DELETE USER FROM TABLE**//

		//Execute when "delete" link is clicked
		//isset determines if a variable is set and is not NULL.
		//$_GET can collect data sent in the URL
		if(isset($_GET['id']))
		{
			//save id in local variable
			$user_id = $_GET['id'];
			
			//create query to delete a user
			$delete_user = "DELETE FROM register_user WHERE user_id='$user_id'";
			
			//run query against database
			$run = mysqli_query($con,$delete_user);
			
			//prompt admin if user deleted
			if($run)
			{
				echo "<script>alert('User Deleted')</script>";
			}
		}
	?>
	
	
</body>
</html>