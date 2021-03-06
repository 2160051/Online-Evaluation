<?php include('connection.php');?>
<html>

<head>
    <meta charset="UTF-8">

    <title>Register</title>
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
                        <h2>Registration</h2>
                    </div>
                    <div class="row clearfix">
                        <div class="">
                            <?php
					if(!empty($_POST['username']) && !empty($_POST['password']))
					{
						$username = mysqli_real_escape_string($conn, $_POST['username']);
						$password = mysqli_real_escape_string($conn, $_POST['password']);
						$firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
						$lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
                        $identification = mysqli_real_escape_string($conn, $_POST['identification']);

						$query = "INSERT INTO `users`(`username`, `password`, `firstname`, `lastname`, `identification`) VALUES ('$username', '$password','$firstname','$lastname', '$identification')";
						$resulta = mysqli_query($conn, $query);
						if($resulta)
						{
							echo "Sucessfully Registered new account.";
						?>
                                <a href="<?php echo " join-signin.php " ?>">Login</a>
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
                                        <div class="input_field"> <span><i aria-hidden="true" class="fa fa-envelope"></i></span>
                                            <input type="username" name="username" placeholder="Username or ID Number" required />
                                        </div>
                                        <div class="input_field"> <span><i aria-hidden="true" class="fa fa-lock"></i></span>
                                            <input type="password" name="password" placeholder="Password" required />
                                        </div>
                                        <div class="input_field"> <span><i aria-hidden="true" class="fa fa-lock"></i></span>
                                            <input type="password" name="password" placeholder="Re-type Password" required />
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col_half">
                                                <div class="input_field"> <span><i aria-hidden="true" class="fa fa-user"></i></span>
                                                    <input type="text" name="firstname" placeholder="First Name" />
                                                </div>
                                            </div>
                                            <div class="col_half">
                                                <div class="input_field"> <span><i aria-hidden="true" class="fa fa-user"></i></span>
                                                    <input type="text" name="lastname" placeholder="Last Name" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="input_field radio_option">
                                            <input type="radio" name="identification" id="rd1" value="teacher">
                                            <label for="rd1">Teacher</label>
                                            <input type="radio" name="identification" id="rd2" value="student">
                                            <label for="rd2">Student</label>
                                        </div>
                                        <input class="button" type="submit" value="Register" />
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
