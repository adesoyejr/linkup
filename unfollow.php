<?php
require_once('constant.php');
$thisuser = $_GET['username'];

$sql = "DELETE FROM `follow` WHERE followed = '$thisuser' AND follower = '$username'";
        $sendpost = mysqli_query($conn, $sql);

        if($sendpost){?>
            <script type="text/javascript">
            window.location.href = window.history.back();
            </script><?php
        }
        else{
            echo "not unfollowed";
        }
?>