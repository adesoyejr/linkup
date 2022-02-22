<?php
require_once('constant.php');


?>

<hr>

<div class="container">
    <div class="row">
        <form role="form" action="search.php" method="GET">
            <div class="form-group">
                <div class="col-sm-offset-1 col-sm-6">
                    <input required style="color:black" type="text" class="form-control" id="searched" name="searched" placeholder="Search..."> 
                </div>            
                <div class="col-sm-offset-1 col-sm-2">
                    <button type="submit" onclick="checkuser(this.value)" name="submit" class="btn btn-info"><i class="pe-7s-search"></i> Search</button>
                </div>

        </form>                  
            </div> 

            
    </div>
                

</div>
</div>
</div>
