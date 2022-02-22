<?php
require_once('connect.php');
session_start();
$username=$_SESSION['username'];
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
              <a href="login.php">
                <img src="linkup.png" class="img-circle img-responsive dp" alt="logo" width="200" height="200" style="float:center">
              </a>
                <h3 class="title">Create Account</h3>
                <h4>Enter Account Details</h4>
            </div>
        </div>
    </div>
</div>
</center>

<?php    
  if(isset($_POST["submit"])){

    $FirstName = $_POST['firstname'];
    $LastName = $_POST['lastname'];
    $Password = $_POST['password'];
    $Question = $_POST['question'];
    $Answer = $_POST['answer'];
    $filename = basename($_FILES['photo']['name']);
    $fileType = pathinfo($filename, PATHINFO_EXTENSION);
  

    if (!empty($FirstName) && !empty($LastName) && !empty($Password) && !empty($Question) && !empty($Answer) && !empty($_FILES["photo"]["name"])) {
  
      $image = $_FILES['photo']['tmp_name']; 
              $imgContent = addslashes(file_get_contents($image));
  
      $sql = "INSERT INTO `user` (`username`, `firstname`, `lastname`, `password`, `question`, `answer`, `picture`) VALUES ('$username','$FirstName', '$LastName', '$Password', '$Question', '$Answer', '$imgContent')";
      
      $rs = mysqli_query($conn, $sql);
  
      if($rs)
        {   header( "refresh:3;url=index.php" );
          echo "
            <div class='col-lg-12'>
              <div style='background-color:green; padding: 10px 0'>
                <center><h5 style='color:white'>User Created Successfully</h5></center>
              </div>
            </div>
            ";
          exit();
          
        } 
      else
        {   header( "refresh:3;url=index.php" );
        echo "
          <div class='col-lg-12'>
            <div style='background-color:darkred; padding: 10px 0'>
              <center><h5 style='color:white'>User not created</h5></center>
            </div>
          </div>
          ";
        exit();
        
        } 
    }
  }
?>

<hr>
<center>
<div class="container">
    <div class="row">
        <form role="form" action="setdetails.php" method="POST">
            <div class="form-group">
                <div class="col-sm-offset-4 col-sm-4">
                    <label>Username selected: <b> <?php echo strtoupper($username);?></b></label><a href="newuser.php">   Edit</a>
                    <br><br>
            
                    <label>Password</label> 
                    <input required style="color:black" type="password" class="form-control" id="password" name="password" placeholder="Enter password">
                    <input type="checkbox" onclick="myFunction()">Show Password 
                    <br><br>

                    <label>First Name</label> 
                    <input required style="color:black" type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter your first name">
                    <br>

                    <label>Last Name</label> 
                    <input required style="color:black" type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter your last name">
                    <br>

                    <label for="security">Security Question</label> 
                    <select class="form-control" id="security" name="question">
                    <option value="">Select...</option>
                    <option value="What is your first pet\'s name">What is your first pet's name</option>
                    <option value="What hospital were you born">What hospital were you born</option>
                    <option value="What is the name of your favourite uncle">What is the name of your favourite uncle</option>
                    <option value="What is the first phone number you remember">What is the first phone number you remember</option>
                    <option value="What is your mother\'s maiden name">What is your mother's maiden name</option>
                    <option value="What year did you graduate high school">What year did you graduate high school</option>
                    <option value="Who was your role model growing up">Who was your role model growing up</option>
                    <option value="What is your favorite sport">What is your favorite sport</option>
                    </select>
                    <br>

                    <label>Answer</label> 
                    <input required style="color:black" type="text" class="form-control" id="answer" name="answer" placeholder="Enter the answer to the security question">
                    <br>

                    <label>Upload Profile Picture</label>
                    <input class="file-path validate" style="color:black" required type="file" name="photo" id="photo" value="photo">
                
                
                <br>
                <br>
                </div>
                <div class="col-sm-offset-2 col-sm-8">
                  <button type="submit" name="submit" class="btn btn-success">Create Account</button>
        </form>
                
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

  $(document).ready(function(){
      $('#image').click(function(){
          var image_name = $('#image').val();
          if(image_name == ''){
              alert('Please select an image');
              return false;
          }
          else{
              var extension = $('#image').val().split('.').pop().toLowerCase();
              if (jQuery.inArray(extension, ['png','jpg','jpeg']) == -1){
                  alert('Invalid file type');
                  $('#image').val('');
                  return false;
              }
          }
      });
  });
</script>
</body>
</html>