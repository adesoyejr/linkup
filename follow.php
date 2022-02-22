<?php
require_once('constant.php');
$thisuser = $_GET['username'];

$sql = "INSERT into `follow` (`follower`,`followed`, `followtime`) VALUES ('$username','$thisuser', now())";
        $sendpost = mysqli_query($conn, $sql);

        if($sendpost){
            $notify = "INSERT into `notifications` (`notby`, `notwho`, `notaction`, `nottime`) VALUES ('$username', '$thisuser', 'followed', now())";
                $sendnotify = mysqli_query($conn, $notify);
            ?>
            <script type="text/javascript">
            window.location.href = window.history.back();
            </script><?php
        }
        else{
            echo "not followed";
        }
?>