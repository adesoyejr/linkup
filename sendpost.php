<?php
require_once('constant.php');

if(isset($_POST["submit"])){
    if(!empty($_POST['content'])) { 

        $content = $_POST['content'];

        $sql = "INSERT into `post` (`sender`,`content`, `active`, `posttime`) VALUES ('$username','$content', true, now())";
        $sendpost = mysqli_query($conn, $sql);

        if($sendpost){?>
        
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