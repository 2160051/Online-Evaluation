<?php include('connection.php');?>
<html>

<head>
    <meta charset="UTF-8">
    <title>Online Evaluation (SLU)</title>
    <meta name="viewport" content="width=dev01ice-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel="stylesheet" href="css/insideClassroom.css">
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
                            <li class=""><a href="#"><?php echo $_SESSION['courseCode']. " ". $_SESSION['courseName'];?></a></li>
                        </ul>
                    </div>
                </div>
            </nav>