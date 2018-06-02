<?php include('connection.php');?>
<html>
<head>
	<meta charset="UTF-8">
	<title>Sign In</title>
	<link rel="stylesheet" type="text/css" href="css/rstyle.css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,400" rel="stylesheet">
</head>
<body>
    <center>
        <div class="header">
            <h1>Online Evaluation</h1>
        </div>
        <div class="wrapper">
            <div class="form_wrapper">
            <div class="form_container">
                <div class="title_container">
                    <h2>Log In</h2>
                </div>
                <div class="row clearfix">
                    <div class="">
                        <?php
					if(!empty($_POST['username']) && !empty($_POST['password']))
					{
						$user = mysqli_real_escape_string($conn, $_POST['username']);
						$pass = mysqli_real_escape_string($conn, $_POST['password']);
                        

						$query = mysqli_query($conn, "SELECT *FROM `users` WHERE username = '$user' and password = '$pass' and identification = 'student'");
     		 			$row = mysqli_fetch_array($query,MYSQLI_ASSOC);      
      					$count = mysqli_num_rows($query);
                        
                        $Tquery = mysqli_query($conn, "SELECT *FROM `users` WHERE username = '$user' and password = '$pass' and identification = 'teacher'");
     		 			$Trow = mysqli_fetch_array($Tquery,MYSQLI_ASSOC);      
      					$Tcount = mysqli_num_rows($Tquery);
     			
      					if($count == 1) 
      					{
         					$_SESSION['username'] = $user;
         					$_SESSION['firstname'] = $row['firstname'];
         					$_SESSION['lastname'] = $row['lastname'];
        	 
         					header("location: classroom.php");
      					}
                        
      					if($Tcount == 1) 
      					{
         					$_SESSION['username'] = $user;
         					$_SESSION['firstname'] = $Trow['firstname'];
         					$_SESSION['lastname'] = $Trow['lastname'];
                            header("location: teacherpage.php"); 
                            
      					}
      					else 
      					{
         					echo "<div id='tag-line'>Your Login Name or Password is invalid</div>";
         					?>
         					<a href="join-signin.php" id="tag-line" style="color: red;">Try again.</a>
         					<?php 
      					}
					}
					else
					{
				?>
                                <form action="join-signin.php" method="post">
                                    <div class="input_field"> <span><i aria-hidden="true" class="fa fa-envelope"></i></span>
                                        <input type="username" name="username" placeholder="Username or ID Number" required />
                                    </div>
                                    <div class="input_field"> <span><i aria-hidden="true" class="fa fa-lock"></i></span>
                                        <input type="password" name="password" placeholder="Password" required />
                                    </div>
                                    
                                    <input class="button" type="submit" value="Log-in" />
                                    <a href="register.php">Don't have an account yet? Register now!</a>
                                </form>
                    </div>
                </div>
            </div>
            <?php
					}
				?>
        </div>
        </div>
    </center>
</body>
</html>