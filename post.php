<?php 
session_start();
if(!isset($_SESSION['email'])){
    session_destroy();
    header('location:login.php');
}
require_once('constant.php');
require_once('connect.php');

// creates Department
if (isset($_POST['post'])) {
    $post = $_POST['post'];
    $datetime =date("d Y M");
    $email = $_SESSION['email'];
    $output = array();
    


    if (!empty($post)) {

        $ironman_survived = "INSERT into `post` (`user`, `post`, `datetime`)
                                        VALUES ('$email',$post','$datetime')";
        if($linkx->query($ironman_survived)){
            $output["status"] = 1; //if all is well
            echo json_decode($output);
            // $interrupt = '
            //     <p style="background:dodgerblue; padding: 10px; width:80%; color:white;">Department Created Successfully</p>
            // ';
        }else{
            $output["status"] = 0; //errors encountered
            echo json_decode($output);
            // $interrupt = '
            //     <p style="background:crimson; padding: 10px; width:80%; color:white;">Error in Department Creation</p>
            // ';
        }
    }
}?>