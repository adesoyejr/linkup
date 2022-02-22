<?php
require_once('constant.php');
$postid = $_GET['postid'];
?>


<div class="content" style="background-color:white; opacity:1;">
            <div class="container-fluid">
                <div class="row">                                                 
                    <div class="col-lg-12">                    

                        
                            <?php 
                            $sql = "SELECT * FROM post INNER JOIN user on post.sender = user.username WHERE post.postid = '$postid'";
                            $result = mysqli_query($conn, $sql);
                            $data = mysqli_fetch_array($result);

                                    $content=$data['content'];
                    
                                ?>
                            <h4 class="title"><?php echo "Post by ". $data['firstname']. " " .$data['lastname'];?></h4>
                            <div class="card">
                            <a>
                             <img src="data:image/jpeg;charset=utf8;base64,<?php echo base64_encode($data['picture']); ?>" class="img-circle" alt="display picture" width="50" height="50" style="float:left">
                            </a>
                            <a <?php if($data['sender'] == $username){?> href="myprofile.php?username=<?php echo $username;}else{ ?> href="user.php?username=<?php echo $data['sender'];}?>">
                                <h5><?php echo strtoupper($data['firstname']." ".$data['lastname']) ?></h5></a>
                                
                                
                                <posts><?php echo $data['posttime'] ?></posts>
                                <br>
                                <a href="postdetail.php?postid=<?php echo $postid?>">
                                <h5><?php echo  $content  ?></h5><br>
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
                                <form action="postcomment.php?postid=<?php echo $postid;?>" method="POST">
                                <input type="text" id="comment" name="comment" class="form-control"  placeholder="Post a comment...">
                                
                                <button type="submit" name="submit"><i class="pe-7s-comment"></i> Comment</button>
                                </form>
                            </div>
                            <h4 class="title"><?php echo "Comments" ?></h4>

                            <?php 
                            $sql = "SELECT * FROM post INNER JOIN user on post.sender = user.username WHERE post.parentid = '$postid'";
                            $result = mysqli_query($conn, $sql);
                            while($data = mysqli_fetch_array($result)){

                                    $content=$data['content'];
                                    $commentid=$data['postid'];
                        
                    
                                ?>
                            
                            <div class="card">
                            <a>
                             <img src="data:image/jpeg;charset=utf8;base64,<?php echo base64_encode($data['picture']); ?>" class="img-circle" alt="display picture" width="50" height="50" style="float:left">
                            </a>
                            <a <?php if($data['sender'] == $username){?> href="myprofile.php?username=<?php echo $username;}else{ ?> href="user.php?username=<?php echo $data['sender'];}?>">
                                <h5><?php echo strtoupper($data['firstname']." ".$data['lastname']) ?></h5></a>
                                
                                <br>
                                <a>
                                <h5><?php echo  $content  ?></h5><br>
                                <div class="pull-right">
                                
                                <?php 

                                $likees = "SELECT * FROM likes WHERE postid = $commentid";
                                if($reslike = mysqli_query($conn, $likees)){
                                    $numberows = mysqli_num_rows($reslike);

                                echo $numberows;
                                }
                                ?></a>
                                <?php

                                    $checklike = "SELECT * FROM comlikes WHERE commentid = $commentid AND liker='$username'";
                                    if($rescheck = mysqli_query($conn, $checklike)){
                                        $numrows = mysqli_num_rows($rescheck);
                                    }
                                    if($numrows){
                                        ?>
                                        <a href="unlike.php?commentid=<?php echo $commentid;?>"><i class="pe-7s-like2"></i>   
                                        Unlike</a><?php
                                    }else{
                                        ?>
                                        <a href="liked.php?commentid=<?php echo $commentid;?>"><i class="pe-7s-like2"></i>   
                                        Like</a><?php
                                    }

                                ?>
                                </div>
                            </div><?php } ?>
    
                    </div>                   
                </div>
            </div>
        </div>
    </div>
</div>

<hr>


</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <!-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> -->

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>

	<script type="text/javascript">
    	$(document).ready(function(){

        	demo.initChartist();

        	$.notify({
            	icon: 'pe-7s-gift',
            	message: "Welcome <?php echo $firstname; ?>"

            },{
                type: 'info',
                timer: 10
            });

    	});

	</script>

</html>
