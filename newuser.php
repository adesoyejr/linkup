<?php
require_once('connect.php');
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

<center>
<div class="container" style="background-color:blueviolet;">
    <div class="row">
        <div class="card">
            <div class="header">
                <img src="linkup.png" class="img-circle img-responsive dp" alt="logo" width="200" height="200" style="float:center">
                <h3 class="title">Login</h3>
                <h4>Enter Details to login</h4>
            </div>
        </div>
    </div>
</div>
</center>

<?php    
             
if(isset($_POST["submit"])){  
    
    if(!empty($_POST['username'])) {  
        $username=$_POST['username'];    
    
        $query=mysqli_query($conn,"SELECT * FROM user WHERE username='".$username."'");  
        $numrows=mysqli_num_rows($query);  
        if($numrows > 0)  
        {  
            echo "
            <div class='container'>
            <div class='col-lg-12'>
                <div class='animated shake' style='background-color:darkred; padding: 10px 0'>
                <center><h5 style='color:white'>Username already taken, chose another</h5></center>
                </div>
            </div>
            </div>
            ";
        }else{
            echo "
            <div class='container'>
            <div class='col-lg-12'>
                <div style='background-color:green; padding: 10px 0'>
                <center><h5 style='color:white'>Username available, complete registration</h5></center>
                </div>
            </div>
            </div>";
            session_start();  
            $_SESSION['username'] = $username;
            header("refresh:2, url=setdetails.php");
        }
    }
}
?>

<hr>
<center>
<div class="container">
            <div class="row">
            <form role="form" action="newuser.php" method="POST">
                <div class="form-group">
                <div class="col-sm-offset-4 col-sm-4">
                    <label>Username</label>
                    <input required style="color:black" type="text" class="form-control" id="username" name="username" placeholder="Select a username">             
                
                    
                <br>
                <br>
                </div>
                <div class="col-sm-offset-2 col-sm-8">
                    <button type="submit" onclick="checkuser(this.value)" name="submit" class="btn btn-success">Check if username is available</button>
            </form>
                </div>
            
                </div>
                

            </div>
        </div>
    </div>

</center>

<script>
  function myFunction() {
    var show = document.getElementById("password");
    if (show.type === "password") {
      show.type = "text";
    } else {
      show.type = "password";
    }
  } 
</script> 
</body>
</html>


</body>
</html>