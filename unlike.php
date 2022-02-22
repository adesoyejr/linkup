<?php
    require_once "constant.php";
    $postid = $_GET['postid'];
     
            $sql = "DELETE FROM `likes` WHERE liker='$username' AND postid=$postid";
            $sendpost = mysqli_query($conn, $sql);
    
            if($sendpost){?>
                <script type="text/javascript">
                window.location.href =  window.history.back();
                </script><?php
            }
            else{
                echo "not liked";
            }

?>