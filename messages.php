<?php 
require_once('constant.php');
?>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Messages</h4>
                            <p class="category">All messages</p>
                        </div>
                        <div class="content">

                            <?php 
                                $sql = "SELECT * FROM `message` where `recipient` = '$username' ORDER BY `senttime` DESC";
                                $result = mysqli_query($conn, $sql);
                                while($data = mysqli_fetch_array($result)){
                            ?>
                            <div class="typo-line">
                                <p class="category"><?php echo $data['senttime'] ?></p>
                                <blockquote>
                                 <p>
                                 <?php echo $data['content'] ?>
                                 </p>
                                 <small>
                                 <?php echo $data['sender'] ?>
                                 </small>
                                </blockquote>
                            </div>
                            <?php 
                            } 
                            ?>

                            <div class="modal-footer">
                                <a href="new-message.php?username=<?php echo $username; ?>">
                                    <button class="btn btn-info">New Message</button>
                                  </div>


                        </div>
                    </div>
                </div>

            </div>

            

</body>

        <!--   Core JS Files   -->
    <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>

    <script>
        $().ready(function(){
            demo.initGoogleMaps();
        });
    </script>

</html>
