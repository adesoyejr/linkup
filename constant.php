<?php
require_once('connect.php');
session_start();
if(!isset($_SESSION['username'])){
    session_destroy();
    header('location:login.php');
}
$username=$_SESSION['username'];
$firstname=$_SESSION['firstname'];
$lastname = $_SESSION['lastname'];
$dob = $_SESSION['dob'];
$bio = $_SESSION['bio'];
$location = $_SESSION['location'];
$dp=$_SESSION['dp'];


?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>LinkUp</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <link href="assets/css/main.css" rel="stylesheet"/>

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="blue" data-image="assets/img/sidebar-5.jpg">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="index.php" class="simple-text">
                    LinkUp
                </a>
            </div>

            <ul class="nav">
                <li>
                    <a href="index.php?username=<?php echo $username; ?>">
                        <i class="pe-7s-home"></i>
                        <p>Home</p>
                    </a>
                </li>
                <li>
                    <a href="myprofile.php?username=<?php echo $username; ?>">
                        <i class="pe-7s-user"></i>
                        <p>My Profile</p>
                    </a>
                </li>
                <li>
                    <a href="search.php?username=<?php echo $username; ?>">
                        <i class="pe-7s-search"></i>
                        <p>Search</p>
                    </a>
                </li>
                <li>
                    <a href="messages.php?username=<?php echo $username; ?>">
                        <i class="pe-7s-mail"></i>
                        <p>Messages</p>
                    </a>
                </li>
                <li>
                    <a href="likedposts.php?username=<?php echo $username; ?>">
                        <i class="pe-7s-like2"></i>
                        <p>Liked posts</p>
                    </a>
                </li>
                <li>
                    <a href="following.php?username=<?php echo $username; ?>">
                        <i class="pe-7s-users"></i>
                        <p>Following</p>
                    </a>
                </li>
                <li>
                    <a href="notifications.php?username=<?php echo $username; ?>">
                        <i class="pe-7s-bell"></i>
                        <p>Notifications</p>
                    </a>
                </li>
                <li>
                    <a href="settings.php?username=<?php echo $username; ?>">
                        <i class="pe-7s-tools"></i>
                        <p>Settings</p>
                    </a>
                </li>


            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                        <a href="myprofile.php?username=<?php echo $username; ?>">
                         <img src="data:image/jpeg;charset=utf8;base64,<?php echo base64_encode($dp); ?>" class="img-circle" alt="display picture" width="50" height="50" style="float:right">
                        </a>
                        </li>
                        <li>
                            <a href="logout.php">
                                Log out
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
