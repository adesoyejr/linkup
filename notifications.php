<?php 
require_once('constant.php');
?>

<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="header">
                <h4 class="title">Notifications</h4>
                <p class="category">All notifications from across the system</p>

            </div>
            <div class="content">
            <div class="row">
                <?php
                $sql = "SELECT * from notifications INNER JOIN post ON notifications.postid=post.postid INNER JOIN user ON notifications.notby = user.username WHERE post.sender = '$username' ORDER BY nottime DESC LIMIT 20";
                $result = mysqli_query($conn, $sql);
                while($data = mysqli_fetch_array($result)){
                        $postid=$data['postid'];
                        $notify=$data['notaction'];
                        $notby = $data['notby'];
                        $nottime = $data['nottime'];
                        $firstnot = $data['firstname'];
                        $lastnot = $data['lastname'];                        
        
                    ?>
                
                    <div class="col-md-12">
                        <?php
                            if($notify == 'liked' && $notby != $username){?>
                            <a href ="postdetail.php?postid=<?php echo $postid;?>">
                            <h5>
                            <?php echo "$firstnot  $lastnot liked your post."?>
                            <div class="pull-right"><p> <?php echo $nottime; ?> </p></div> 
                            </h5></a>
                            <hr>
                            <?php }
                            elseif($notify == 'comment' && $notby != $username){?>
                                <a href ="postdetail.php?postid=<?php echo $postid;?>">
                                <h5>
                                <?php echo "$firstnot  $lastnot commented your post."?>
                                <div class="pull-right"><p> <?php echo $nottime; ?> </p></div> 
                                </h5></a>
                                <hr>
                                <?php }else{
                                    ?>
                                    <a href ="user.php?username=<?php echo $notby;?>">
                                    <h5>
                                    <?php echo "$firstnot  $lastnot followed you."?>
                                    <div class="pull-right"><p> <?php echo $nottime; ?> </p></div> 
                                    </h5></a>
                                    <hr>
                                    <?php
                                }
                                ?>
                    </div>
                    <?php } ?>
                    
                </div>
                <br>
                
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
