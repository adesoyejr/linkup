<?php
require_once('constant.php');
$thisuser= $_GET['username'];
?>


<div class="row">
<div class="col-lg-6">
    <div class="modal-content animated fadeIn slower">

        <center><h5><b>FOLLOWERS</b></h5></center>
        <div class="modal-body">
        <?php 
            $sql = "SELECT * FROM follow INNER JOIN user ON follow.follower=user.username WHERE follow.followed= '$thisuser' ORDER BY followtime";
            
            $result = mysqli_query($conn, $sql);
            while($data = mysqli_fetch_array($result)){
                $labamba = $data['username'];
            
            ?>
            <div class="card">
            <a>
                <img src="data:image/jpeg;charset=utf8;base64,<?php echo base64_encode($data['picture']); ?>" class="img-circle" alt="display picture" width="50" height="50" style="float:left">
            </a>
                <a <?php if($data['username'] == $username){?> href="myprofile.php?username=<?php echo $username;?>"<?php }else{ ?> href="user.php?username=<?php echo $data['username'];}?>">
                <h5><?php echo strtoupper($data['firstname']." ".$data['lastname']) ?></h5></a>
                <div class="pull-right">
                <?php
                    if($labamba != $username){
                    $checkfollow = "SELECT * FROM follow WHERE followed ='$username' AND follower='$labamba'";
                    if($checkresult = mysqli_query($conn, $checkfollow)){
                        $checknum = mysqli_num_rows($checkresult);
                    }
                    if($checknum){
                        ?><a href="unfollow.php?username=<?php echo $labamba;?>">Unfollow</a><?php
                    }else{
                        ?><a href="follow.php?username=<?php echo $labamba;?>">Follow Back</a><?php
                    }
                }
                else{
                    echo ('') ;
                }

                ?>
                </div>
                <br>
            </div>
        <?php }
            ?>
    </div>
    </div>    
    </div>


    <div class="col-lg-5">
    <div class="modal-content animated fadeIn slower">

        <center><h5><b>TOP PEOPLE TO FOLLOW</b></h5></center>
        <div class="modal-body">
        <?php 

                

            $people = "SELECT * FROM follow INNER JOIN user ON follow.followed=user.username WHERE follow.follower<> '$thisuser' ORDER BY followtime";
            
            $peopleresult = mysqli_query($conn, $people);
            while($data = mysqli_fetch_array($peopleresult)){
                $labamba = $data['username'];
            
            ?>
            <div class="card">
            <a>
                <img src="data:image/jpeg;charset=utf8;base64,<?php echo base64_encode($data['picture']); ?>" class="img-circle" alt="display picture" width="50" height="50" style="float:left">
            </a>
                <a <?php if($data['username'] == $username){?> href="myprofile.php?username=<?php echo $username;?>"<?php }else{ ?> href="user.php?username=<?php echo $data['username'];}?>">
                <h5><?php echo strtoupper($data['firstname']." ".$data['lastname']) ?></h5></a>
                <div class="pull-right">
                <?php
                    if($labamba != $username){
                    $checkfollow = "SELECT * FROM follow WHERE follower ='$username' AND followed='$labamba'";
                    if($checkresult = mysqli_query($conn, $checkfollow)){
                        $checknum = mysqli_num_rows($checkresult);
                    }
                    if($checknum){
                        ?><a href="unfollow.php?username=<?php echo $labamba;?>">Unfollow</a><?php
                    }else{
                        ?><a href="follow.php?username=<?php echo $labamba;?>">Follow</a><?php
                    }
                }
                else{
                    echo ('') ;
                }

                ?>
                </div>
                <br>
            </div>
        <?php }
            ?>
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
