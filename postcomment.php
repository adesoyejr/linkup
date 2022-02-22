<?php
    require_once "constant.php";
    $postid = $_GET['postid']; 

    if(isset($_POST["submit"])){
        if(!empty($_POST['comment'])) { 
    
            $comment = $_POST['comment'];
    
            $sql = "INSERT into `post` (`sender`,`content`, `posttime`, `active`, `parentid`) VALUES ('$username','$comment', now(), true, '$postid')";
            $sendpost = mysqli_query($conn, $sql);
    
            if($sendpost){
                $notify = "INSERT into `notifications` (`postid`, `notby`, `notaction`, `nottime`) VALUES ('$postid', '$username', 'comment', now())";
                $sendnotify = mysqli_query($conn, $notify);
                ?>
                <script type="text/javascript">
                window.location.href = 'index.php';
                </script><?php
            }
            else{
                echo "post not sent";
            }
        }
    }

?>