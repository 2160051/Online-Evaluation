<?php include('connection.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="free-educational-responsive-web-template-webEdu">
	<meta name="author" content="webThemez.com">
	<title>Classes</title>
	<link rel="favicon" href="assets/images/favicon.png">
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css"> 
	<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen"> 
	<link rel="stylesheet" href="assets/css/style.css">
    <link rel='stylesheet' id='camera-css'  href='assets/css/camera.css' type='text/css' media='all'>
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="assets/js/html5shiv.js"></script>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<!-- Fixed navbar -->
	<div class="navbar navbar-inverse">
		<div class="container">
			<div class="navbar-header">
				<!-- Button for smallest screens -->
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                <a class="navbar-brand" href="index.html"><h1 style="color: dimgray; padding,margin: 0px !important;">Online Evaluation Tool</h1></a>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav pull-right mainNav">
					<li class="active "><a href="#">Home</a></li>
					<li><a href="#">About</a></li>
                    <li><a href="#">Add a class</a></li>
					<li style="color: white; font-size: 18px; margin: auto; padding: 6px; background-color: #3d84e6">Welcome &nbsp; <?php echo $_SESSION['firstname']. " ". $_SESSION['lastname'];?></li>
				</ul>
			</div>
			<!--/.nav-collapse -->
		</div>
	</div>
	<!-- /.navbar -->

  <div class="container">
    <div class="row">
					<?php               
                $user = mysqli_real_escape_string($conn, $_SESSION['username']);
                
                $sql = "select * from user_course join users using(id) join course using(courseCode) where users.username =  '$user'";
                $sql1 = "select * from course join user_course using(courseCode) join users using(id) where users.username =  '$user' or users.identification ='teacher';";
                    $result = mysqli_query($conn, $sql);
                    $result1 = mysqli_query($conn, $sql1);

                    if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                        while($row = mysqli_fetch_assoc($result) and $row1 = mysqli_fetch_assoc($result1)) {
                            
                            echo "<div class='col-md-3'> 
                                    <div class='grey-box-icon'> 
                                        <div class='icon-box-top grey-box-icon-pos'>
                                            <img src='assets/images/1.PNG' alt='' style='width: 100px; height: auto;'/>
                                        </div> 
                                    <h4>&nbsp; <div>" .$row["courseCode"].  "<br>" . $row["courseName"]. "<br></h4> 
                                    <p>Teacher: ".$row1["firstname"].  "<br>" . $row1["lastname"]."</p>
						</div>
					</div>";
                        }
                        echo "<a><div class='col-md-2' data-toggle='modal' data-target='#myModal'></a>
                                <div class='grey-box-icon'> 
                                    <div class='icon-box-top grey-box-icon-pos' style='margin: 0px;'>
                                        <img src='assets/images/2.PNG' alt='' style='width: 100px; height: auto;' />
                                    </div> 
                                <h4 style='margin: 10px; padding: 0px; color: black;'>Join class</h4>
						      </div>
					       </div></a>";
                    } else {          
                                echo "<a><div class='col-md-2' data-toggle='modal' data-target='#myModal'></a>
                                <div class='grey-box-icon'> 
                                    <div class='icon-box-top grey-box-icon-pos' style='margin: 0px;'>
                                        <img src='assets/images/2.PNG' alt='' style='width: 100px; height: auto;' />
                                    </div> 
                                <h4 style='margin: 10px; padding: 0px; color: black;'>Join class</h4>
						      </div>
					       </div></a>";
                                       
                }
                ?>
                  <!-- Modal -->
                  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" >
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-header" style="background-color: #3d84e6">
                            <h5 class="modal-title" id="exampleModalLongTitle" style="text-align: center; color: white; font-size: 2em">JOIN A CLASS</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body" style="text-align: center; font-size: 1.3em;">
                            To join a class, type in the code given <br> by your teacher below
                              <div class="form-group">
                                  <label for="usr"></label>
                                  <form method="post" action=''>
                                    <input type="text" class="form-control" id="usr" placeholder="code" name="classcode">
                                  </form>
                              </div>               
                          </div>
                          <div class="modal-footer">
                              
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <!--<button type="button" class="btn btn-primary" id="join" name="joinbutton">Join</button>-->
                              <form method="post" action=''> 
                                <input type="submit" name="joinbutton"  value="My Button">
                              </form>
                               
                              
                            <?php
                              if (isset($_POST['joinbutton']))
                                {                                                 
                                   $sql = "INSERT INTO user_course (userCourseID, id, courseCode, groupID)
                                            VALUES (?,?,?);";
                                  $stmt = mysqli_prepare($sql);
                                  $stmt->bind_param("sss", $_POST['classcode']);
                                  $stmt->execute();
                                }
                            ?>
                                
                                <!--<script> 
                                    $("#join").click(function(){
                                        $.post($("#usr"), $("#usr:input").serializeArray(), function(info){$("#result").html(info);});
                                        });

                                    $("#usr").submit(function(){
                                        return false;
                                    });
                                </script> -->                          
                          </div>
                        </div>
                      </div>
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
    
</body>
</html>
