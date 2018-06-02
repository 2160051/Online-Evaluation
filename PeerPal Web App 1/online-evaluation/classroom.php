<?php include('connection.php');?>
<html>
<head>
  <meta charset="UTF-8">
  <title>Online Evaluation (SLU)</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css'>
      <link rel="stylesheet" href="css/style.css">
</head>

<body>
<div class="offcanvas">
  <div class="offcanvas__container"><a class="offcanvas__exit-overlay" href="#" data-toggle="offcanvas" data-target="exit"></a>
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header navbar-header--double-btn">
          <button class="navbar-toggle navbar-toggle--left" type="button" data-toggle="offcanvas" data-target="left" aria-expanded="false"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><a class="navbar-brand navbar-brand--center" href="#">Online Evaluation</a>
        </div>
        <div class="navbar-offcanvas offcanvas__content offcanvas__content--left">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#"><span class="glyphicon glyphicon-home"></span>&nbsp;Home</a></li>
            <li class=""><a href="#"><span class="glyphicon glyphicon-plus"></span>&nbsp;Add a Class</a></li>
          </ul>
        </div>
      </div>
    </nav>
      
    <div class="container">
        <div class="page"
        <div class="col-sm-2">
            <h1>&nbsp; <?php               
                $user = mysqli_real_escape_string($conn, $_SESSION['username']);
                
                $sql = "select * from user_course join users using(id) join course using(courseCode) where users.username =  '$user'";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                        while($row = mysqli_fetch_assoc($result)) {
                            echo "<div>" .$row["courseCode"].  "<br>" . $row["courseName"]. "<br> <br>";
                        }
                    } else {
                        echo "0 results";
                }
                ?></h1>
        </div>
    </div>
  </div>
</div>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js'></script>
    <script  src="js/index.js"></script>
</body>
</html>