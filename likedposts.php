<?php
require_once('constant.php');
?>

<div class="row">
    <div class="col-lg-12">
        <div class="modal-content animated fadeIn slower">
        <center><h5><b>Liked Posts</b></h5></center>
        <div class="modal-body">
        <?php 
            $sql = "SELECT * FROM likes INNER JOIN post ON post.postid=likes.postid INNER JOIN user ON user.username=post.sender WHERE likes.liker = '$username' ORDER BY liketime DESC LIMIT 10";
            
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