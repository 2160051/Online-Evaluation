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
            <li class=""><a href="joinClass.php"><span class="glyphicon glyphicon-plus"></span>&nbsp;Join a Class</a></li>
          </ul>
            <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> Welcome <?php echo $_SESSION['firstname']. " ". $_SESSION['lastname'];?></a></li>
      <li><a href="signout.php"><span class="glyphicon glyphicon-log-out"></span> Log-out</a></li>
    </ul>
        </div>
      </div>
    </nav>
	<!-- /.navbar -->

  <div class="container">
    <div class="row">
					<?php               
                $user = mysqli_real_escape_string($conn, $_SESSION['username']);
                
                $sql = "select * from user_course join users using(id) join course using(courseCode) where users.username =  '$user'";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                        while($row = mysqli_fetch_assoc($result)) {
                            echo "<div class='col-md-3'> <div class='grey-box-icon'> <div class='icon-box-top grey-box-icon-pos'>
                                        <img src='assets/images/1.PNG' alt='' style='width: 100px; height: auto;' />
                                    </div> <h4>&nbsp; <div>" .$row["courseCode"].  "<br>" . $row["courseName"]. "<br></h4> <p>Teacher: Lorem Ipsum</p>
						</div>
					</div>";
                        }
                    } else {
                        echo "0 results";
                }
                ?>
    </div>

	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="assets/js/modernizr-latest.js"></script> 
	<script type='text/javascript' src='assets/js/jquery.min.js'></script>
    <script type='text/javascript' src='assets/js/fancybox/jquery.fancybox.pack.js'></script>
    
    <script type='text/javascript' src='assets/js/jquery.mobile.customized.min.js'></script>
    <script type='text/javascript' src='assets/js/jquery.easing.1.3.js'></script> 
    <script type='text/javascript' src='assets/js/camera.min.js'></script> 
    <script src="assets/js/bootstrap.min.js"></script> 
	<script src="assets/js/custom.js"></script>
    <script>
		jQuery(function(){
			
			jQuery('#camera_wrap_4').camera({
                transPeriod: 500,
                time: 3000,
				height: '600',
				loader: 'false',
				pagination: true,
				thumbnails: false,
				hover: false,
                playPause: false,
                navigation: false,
				opacityOnGrid: false,
				imagePath: 'assets/images/'
			});

		});
      
	</script>
    
</body>
</html>
