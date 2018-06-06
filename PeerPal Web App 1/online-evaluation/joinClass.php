<?php include('connection.php');?>
<html>
<head>
  <meta charset="UTF-8">
  <title>Online Evaluation (SLU)</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css'>
      <link rel="stylesheet" href="css/insideClassroom.css">
</head>

<body>
<div class="offcanvas">
    <?php
      
    ?>
  <div class="offcanvas__container"><a class="offcanvas__exit-overlay" href="#" data-toggle="offcanvas" data-target="exit"></a>
    <nav class="navbar bg-info">
      <div class="container-fluid">
        <div class="navbar-header navbar-header--double-btn">
          <button class="navbar-toggle navbar-toggle--left" type="button" data-toggle="offcanvas" data-target="left" aria-expanded="false"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><a class="navbar-brand navbar-brand--center" href="#">Online Evaluation</a>
        </div>
        <div class="navbar-offcanvas offcanvas__content offcanvas__content--left">
          <ul class="nav navbar-nav">
            <li class="active"><a href="teacherpage.php"><span class="glyphicon glyphicon-home"></span>&nbsp;Home</a></li>
            <li class=""><a href="#"><span class="glyphicon glyphicon-plus"></span>&nbsp;Join a Class</a></li>
          </ul>
            <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> Welcome <?php echo $_SESSION['firstname']. " ". $_SESSION['lastname'];?></a></li>
      <li><a href="signout.php"><span class="glyphicon glyphicon-log-out"></span> Log-out</a></li>
    </ul>
        </div>
      </div>
    </nav>
    <div class="page-header">
        <section>
                       
                        <h1>Join Class</h1>
                        <h2>To join a class, type the code given by your instructor below </h2>
                        <?php
					if(!empty($_POST['courseCode']))
					{
						$classCode = mysqli_real_escape_string($conn, $_POST['courseCode']);
						
						$query = mysqli_query($conn, "SELECT * FROM `course` WHERE courseCode = '$classCode'");
     		 			$row = mysqli_fetch_array($query,MYSQLI_ASSOC);      
      					$count = mysqli_num_rows($query);
                        
      					if($count == 1) 
      					{
         					$_SESSION['courseCode'] = $classCode;
         					$_SESSION['courseName'] = $row['courseName'];
         					$_SESSION['courseDescription'] = $row['courseDescription'];
        	 
         					header("location: course.php");
      					}
      					else 
      					{
         					echo "<div id='tag-line'>Invalid Classcode</div>";
         					?>
                            <a href="joinClass.php" id="tag-line" style="color: red;">Try again.</a>
                            <?php 
      					}
					}
					else
					{
				?>
                            <form action="joinClass.php" method="post">

                                <input name="courseCode" placeholder='Ex. 9364A' type='text'>
                                <input class="button" type="submit" value="Enter" />
                            </form>


                    </section>
                    <?php
                    }
    ?>
    </div>
  </div>
</div>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js'></script>
    <script  src="js/index.js"></script>
</body>
</html>