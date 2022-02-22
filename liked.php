<?php
    require_once "constant.php";
    $postid = $_GET['postid'];
    $commentid = $_GET['commentid'];
     
            $sql = "INSERT into `likes` (`postid`, `liker`,`liketime`) VALUES ('$postid', '$username', now())";
            $sendpost = mysqli_query($conn, $sql);
    
            if($sendpost){
                $notify = "INSERT into `notifications` (`postid`, `notby`, `notaction`, `nottime`) VALUES ('$postid', '$username', 'liked', now())";
                $sendnotify = mysqli_query($conn, $notify);
                ?>
                <script type="text/javascript">
                window.location.href =  window.history.back();
                </script><?php
            }
            else{
                echo "not liked";
            }

?>