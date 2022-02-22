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
                    <a href="liked.php?username=<?php echo $username; ?>">
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
                         <img src="data:image/jpeg;charset=utf8;base64,<?php echo base64_encode($dp); ?>" class="img-circle" alt="display picture" width="50" height="50" style="float:right">
                        </li>
                        <li>
                            <a href="logout.php">
                                <p>Log out</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

<?php

if(isset($_POST['submit'])) 
{
    $editfirstname = $_POST['firstname'];
    $editlastname = $_POST['lastname'];
    $editdob = $_POST['dob'];
    $editbio = $_POST['bio'];
    $editlocation = $_POST['location'];
    
    $qry = "update user set firstname='$editfirstname', lastname='$editlastname', dob='$editdob', bio='$editbio', location='$editlocation' WHERE username='$username'";
    $edit = mysqli_query($conn, $qry);
	
    if($edit)
    {
        ?><script> location.replace("myprofile.php?username=<?php echo $username ?>"); </script> <?php
        
    }
    else
    {
        echo mysqli_error($conn);
    }    	
}
?>

<hr>
<center>
<div class="container">
            <div class="row">
            <center> <h3>Edit Profile Information</h3> </center>
            <form role="form" action="edit.php" method="POST">
                <div class="form-group">
                <div class="col-sm-offset-4 col-sm-4">
                    <label>Edit First Name</label>
                    <input required style="color:black" value="<?php echo $firstname ?>" type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter your first name">             
                </div>
                
                <div class="col-sm-offset-4 col-sm-4">
                    <label>Edit Last Name</label>
                    <input required style="color:black" value="<?php echo $lastname ?>" type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter your last name">             
                </div>

                <div class="col-sm-offset-4 col-sm-4">
                    <label>Edit Bio</label>
                    <textarea style="color:black" type="text" class="form-control" id="bio" name="bio" placeholder="Type a short description about yourself"><?php echo $bio ?></textarea>           
                
                </div>

                <div class="col-sm-offset-4 col-sm-4">
                    <label>Edit Date of Birth</label>
                    <input style="color:black" value="<?php echo $dob ?>" type="date" class="form-control" id="dob" name="dob" placeholder="Enter your last name">             
                </div>

                <div class="col-sm-offset-4 col-sm-4">
                    <label>Edit Location</label>
                    <input style="color:black" value="<?php echo $location ?>" type="text" class="form-control" id="location" name="location" placeholder="Enter your last name">             
                <br>
                </div>
                
                
                </div>
                <div class="col-sm-offset-2 col-sm-8">
                    <button type="submit" onclick="checkuser(this.value)" name="submit" class="btn btn-info">Edit Profile</button>
            </form>
            <input type="button" class="btn btn-warning" onclick="window.location.href='javascript:history.go(-1)'" value="Cancel"/>
                </div>
                
                    
                <br><br><br><br>

            
                </div>
                

            </div>
        </div>
    </div>

</center>
</div>
</div>
</body>
</html>
