<?php include('connection.php');?>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="description" content="online evaluation">
	<meta name="author" content="Blessie Gelidon">
	<title>Register</title>
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
					if(!empty($_POST['username']) && !empty($_POST['password']))
					{
						$username = mysqli_real_escape_string($conn, $_POST['username']);
						$password = mysqli_real_escape_string($conn, $_POST['password']);
						$firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
						$lastname = mysqli_real_escape_string($conn, $_POST['lastname']);

						$query = "INSERT INTO `users`(`username`, `password`, `firstname`, `lastname`) VALUES ('$username', '$password','$firstname','$lastname')";
						$resulta = mysqli_query($conn, $query);
						if($resulta)
						{
							echo "Sucessfully Registered new account.";
						?>
							<a href="<?php echo "join-signin.php" ?>">Login</a>
						<?php
						}
						else
						{
							echo "Something went wrong. please try again.";
						}
					}
					else
					{
				?>
				<form action="register.php" method="post">
					<table id="sign-in-table">
						<tr>
							<td><span style="font-size: 30px;">Register</span></td>
						</tr>
						<tr>
							<td><input name="username" id="username" type="text" placeholder="Username / School I.D."></td>
						</tr>
						<tr>
							<td><input name="password" id="password" type="password" placeholder="Password"></td>
						</tr>
						<tr>
							<td><input name="firstname" id="username" type="text" placeholder="Firstname"></td>
						</tr>
						<tr>
							<td><input name="lastname" id="username" type="text" placeholder="Lastname"></td>
						</tr>
						<tr>
							<td><a style=" text-decoration: none; color: #000000; font-size: 12px;" href="">By Registering you Agree to our Terms and Conditions.</a></td>
						</tr>
						<tr>
							<td></td>
						</tr>
						<tr>
							<td><input id="submit" type="submit" value="Register"></td>
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