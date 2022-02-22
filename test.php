<html>

<head>
    <title>
        LinkUp
    </title>
</head>
<body>
<?php
require_once('connect.php');
//echo "test";

if(isset($_POST["submit"])){
    if(!empty($_POST['content']) && !empty($_POST['test'])) { 

        $content = $_POST['content'];
        $sender = $_POST['test'];

        var_dump($sender);
        echo "test";
        
        exit();

            $sql = "INSERT into `post` (`sender`,`content`, `active`, `posttime`) VALUES ('test','testpost2', true, now())";
            $sendpost = mysqli_query($conn, $sql);

            if($sendpost){
                header('location:user.php');
            }
            else{
                echo "post not sent";
            }
    }
}
?>
</body>
</html>