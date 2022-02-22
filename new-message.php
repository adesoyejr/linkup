<?php 

require_once('constant.php');

?>

    <div class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <form method="post" action="new-message.php" class="form-group">

                        <div class="header">
                            <h4 class="title">New Message</h4>
                            <form method="post" action="requests.php" class="form-group">
                             <label> Select The Reciever Of The Message</label>
                                <select name="recipient" class="form-control">
                                <option value="">--SELECT A RECIEVER--</option>
                                <?php 
                                    $sql = "SELECT * FROM user";
                                    $query = mysqli_query($conn, $sql);
                                    while($data = mysqli_fetch_array($query)){
                                    ?>
                                
                                    <option value="<?php echo $data['username']?>"><?php echo $data['firstname']." ".$data['lastname']?></option>
                                    <?php } ?>
                                </select>
                                <br>
                        </div>
                        <div class="content">
                            <textarea class="form-control" rows="10" style="resize: none;" placeholder="Type your message here..." name="content"></textarea>

                            <br>
                            <button class="btn btn-info">Send message</button>
                        </div>
                    </form>
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
