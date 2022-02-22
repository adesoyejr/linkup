<?php 
require_once('constant.php');

?>

  
<div class="row">
    <div class="col-lg-6">
    <div class="modal-content animated fadeIn slower">
        <div class="modal-body">
          <center><img class="img-circle img-responsive dp" src="data:image/jpeg;charset=utf8;base64,<?php echo base64_encode($dp); ?>"></center>
          <button type="button" class="btn btn-info" onclick="window.location.href = 'edit.php?username=<?php echo $username; ?>'">Edit Profile </button>
          <br>
          <div class="pull-right">
            <?php
                $selectposts="SELECT * FROM post WHERE sender = '$username'";
                if($activepost = mysqli_query($conn, $selectposts)){
                    $numposts = mysqli_num_rows($activepost);
                }
                $selectfollowers="SELECT * FROM follow WHERE followed = '$username'";
                if($activefollowers = mysqli_query($conn, $selectfollowers)){
                    $numfollowers = mysqli_num_rows($activefollowers);
                }
                $selectfollowed="SELECT * FROM follow WHERE follower = '$username'";
                if($activefollowed = mysqli_query($conn, $selectfollowed)){
                    $numfollowed = mysqli_num_rows($activefollowed);
                }
            ?>
          <a><posts><?php echo $numposts. strtoupper(' Posts  ') ?></posts></a>
          <posts>___</posts>
          <a href="followers.php?username=<?php echo $username; ?>"><posts><?php echo $numfollowers. strtoupper(' Followers  ') ?></posts></a>
          <posts>___</posts>
          <a href="following.php?username=<?php echo $username; ?>"><posts><?php echo $numfollowed. strtoupper(' Following') ?></posts></a>
          </div>
          <hr>
          <center> <h5><?php echo strtoupper($firstname. " ".$lastname); ?></h5> </center>
          <center>
            <div class="row">
                <div class="col-lg-4 profile-key animated flash"><i class="pe-7s-user"></i> Username</div>
                <div class="col-lg-8 profile-value animated flash"><?php echo $username ?></div>
            </div>
            <div class="row">
                <div class="col-lg-4 profile-key animated flash"><i class="pe-7s-id"></i> About Me</div>
                <div class="col-lg-8 profile-value animated flash"><?php if($bio == ""){ echo "Bio not set";}else echo $bio ?></div>
            </div>
            <div class="row">
                <div class="col-lg-4 profile-key animated flash"><i class="pe-7s-date"></i> Date of Birth</div>
                <div class="col-lg-8 profile-value animated flash"><?php echo $dob ?></div>
            </div>
            <div class="row">
                <div class="col-lg-4 profile-key animated flash"><i class="pe-7s-map-marker"></i> Location</div>
                <div class="col-lg-8 profile-value animated flash"><?php if($location == ""){ echo "Location not set";} else echo $location ?></div>
            </div>
            
            
          </center>
        </div>
    </div>                          
    </div>


    <div class="col-lg-6">
    <div class="modal-content animated fadeIn slower">

        <center><h5><b>Recent Posts</b></5></center>
        <div class="modal-body">
        <?php 
            $sql = "SELECT * FROM post WHERE sender = '$username' AND parentid is NULL ORDER BY posttime DESC LIMIT 2";
            
            $result = mysqli_query($conn, $sql);
            while($data = mysqli_fetch_array($result)){
                $postid = $data['postid'];
                ?>
            <div class="card">
                <a>
                    <img src="data:image/jpeg;charset=utf8;base64,<?php echo base64_encode($dp); ?>" class="img-circle" alt="display picture" width="50" height="50" style="float:left">
                </a>
                <a href="user.php?username=<?php echo $data['sender'];?>">
                <h5><?php echo strtoupper($firstname." ".$lastname) ?></h5></a>
                <posts><?php echo $data['posttime'] ?></posts>
                <br>
                <a href="postdetail.php?postid=<?php echo $postid?>">
                <h5><?php echo $data['content'] ?></h5><br>
                <div class="pull-right">
                
                <?php 
                
                $likees = "SELECT * FROM likes WHERE postid = $postid";
                if($reslike = mysqli_query($conn, $likees)){
                    $numberows = mysqli_num_rows($reslike);

                echo $numberows;
                }
                ?></a>
                <?php

                    $checklike = "SELECT * FROM likes WHERE postid = $postid AND liker='$username'";
                    if($rescheck = mysqli_query($conn, $checklike)){
                        $numrows = mysqli_num_rows($rescheck);
                    }
                    if($numrows){
                        ?>
                        <a href="unlike.php?postid=<?php echo $postid;?>"><i class="pe-7s-like2"></i>   
                        Unlike</a><?php
                    }else{
                        ?>
                        <a href="liked.php?postid=<?php echo $postid;?>"><i class="pe-7s-like2"></i>   
                        Like</a><?php
                    }

                ?>
                </div>
                <form action="postcomment.php" method="POST">
                <input type="text" id="comment" name="comment" class="form-control"  placeholder="Post a comment...">
                <button type="submit" name="submit"><i class="pe-7s-comment"></i> Comment</button>
                </form>
            </div>
        <?php }
            ?>
        <hr>

        <center><h5><b>Liked Posts</b></h5></center>
        <div class="modal-body">
        <?php 
            $sql = "SELECT * FROM likes INNER JOIN post ON post.postid=likes.postid INNER JOIN user ON user.username=post.sender WHERE likes.liker = '$username' ORDER BY liketime DESC LIMIT 2";
            
            $result = mysqli_query($conn, $sql);
            while($data = mysqli_fetch_array($result)){
                $postid = $data['postid'];
                ?>
            <div class="card">
                <a>
                    <img src="data:image/jpeg;charset=utf8;base64,<?php echo base64_encode($data['picture']); ?>" class="img-circle" alt="display picture" width="50" height="50" style="float:left">
                </a>
                <a href="user.php?username=<?php echo $data['sender'];?>">
                <h5><?php echo strtoupper($data['firstname']." ".$data['lastname']) ?></h5></a>
                <posts><?php echo $data['posttime'] ?></posts>
                <br>
                <a href="postdetail.php?postid=<?php echo $postid?>">
                <h5><?php echo $data['content'] ?></h5><br>
                <div class="pull-right">
                
                <?php 
                
                $likees = "SELECT * FROM likes WHERE postid = $postid";
                if($reslike = mysqli_query($conn, $likees)){
                    $numberows = mysqli_num_rows($reslike);

                echo $numberows;
                }
                ?></a>
                <?php

                    $checklike = "SELECT * FROM likes WHERE postid = $postid AND liker='$username'";
                    if($rescheck = mysqli_query($conn, $checklike)){
                        $numrows = mysqli_num_rows($rescheck);
                    }
                    if($numrows){
                        ?>
                        <a href="unlike.php?postid=<?php echo $postid;?>"><i class="pe-7s-like2"></i>   
                        Unlike</a><?php
                    }else{
                        ?>
                        <a href="liked.php?postid=<?php echo $postid;?>"><i class="pe-7s-like2"></i>   
                        Like</a><?php
                    }

                ?>
                </div>
                <form action="postcomment.php" method="POST">
                <input type="text" id="comment" name="comment" class="form-control"  placeholder="Post a comment...">
                <button type="submit" name="submit"><i class="pe-7s-comment"></i> Comment</button>
                </form>
            </div>
        <?php }
            ?>
        </div>
        
    </div>
    </div>
    </div>

    


</div>
</div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>

</html>
