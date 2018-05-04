<?php include('connection.php');?>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="description" content="online evaluation">
	<meta name="author" content="Blessie Gelidon">
	<title>Sign In</title>
	<link rel="stylesheet" type="text/css" href="css/main-style.css" />
</head>
<body>
	<center>
		<div class="wrapper">
			<div class="header">
				<table>
					<tr>
						<td>PeerPal</td>
						<td align="right"><div id="sign-in"><a href="">Contact Us</a></div></td>
					</tr>
				</table>
			</div>
			<div class="body">
				<?php
					if(!empty($_POST['Username']) && !empty($_POST['Password']))
					{
						$user = mysqli_real_escape_string($conn, $_POST['Username']);
						$pass = mysqli_real_escape_string($conn, $_POST['Password']);

						$query = mysqli_query($conn, "SELECT *FROM `users` WHERE username = '$user' and password = '$pass'");
     		 			$row = mysqli_fetch_array($query,MYSQLI_ASSOC);      
      					$count = mysqli_num_rows($query);
      
     			
      					if($count == 1) 
      					{
         					$_SESSION['username'] = $user;
         					$_SESSION['firstname'] = $row['firstname'];
         					$_SESSION['lastname'] = $row['lastname'];
        	 
         					header("location: classroom.php");
      					}
      					else 
      					{
         					echo "Your Login Name or Password is invalid";
         					?>
         					<a href="join-signin.php">Try again.</a>
         					<?php
      					}
					}
					else
					{
				?>
				<form action="join-signin.php" method="post">
					<table id="sign-in-table">
						<tr>
							<td><span style="font-size: 30px;">Sign In</span></td>
						</tr>
						<tr>
							<td><input name="Username" id="username" type="text" placeholder="Username / School I.D."></td>
						</tr>
						<tr>
							<td><input name="Password" id="password" type="password" placeholder="Password"></td>
						</tr>
						<tr>
							<td><a style=" text-decoration: none; color: #000000; font-size: 12px;" href="register.php">Register a new account here.</a></td>
						</tr>
						<tr>
							<td></td>
						</tr>
						<tr>
							<td><input id="submit" type="submit" value="Sign In"></td>
						</tr>
					</table>
				</form>
				<?php
					}
				?>
			</div>
		</div>
	</center>
</body>
</html>