<?php include('connection.php');?>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="description" content="online evaluation">
	<meta name="author" content="Blessie Gelidon">
	<title>Classes</title>
	<link rel="stylesheet" type="text/css" href="css/main-style.css" />
</head>
<body>
	<center>
		<div class="wrapper">
			<div class="header">
				<table>
					<tr>
						<td><b>Online Evaluation</b> <i style=" font-size: 20px;">classroom</i></td>
						<td align="right"><a id="add" title="Press to Create or Add class" href="">+</a></td>
						<td align="right" title="You"><?php echo $_SESSION['firstname']." ".$_SESSION['lastname']; ?></td>
						<td align="right"><div title="Please don't go" id="sign-in"><a href="signout.php">Sign Out</a></div></td>
					</tr>
				</table>
			</div>
			<div class="body">
				<table align="left" id="welcome">
					<tr>
						<td><i>Welcome</i></td>
					</tr>
				</table>
			</div>
		</div>
	</center>
</body>
</html>