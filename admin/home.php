<?php
$page = "home";
include("header.php");
?>


            <div class="main-content-inner">
                <!-- sales report area start -->
                <div class="sales-report-area mt-5 mb-5">
                    <div class="row">
                        <div class="col-md-4">
                          <a href="register.php">
                            <div class="single-report mb-xs-30">
                                <div class="s-report-inner pr--20 pt--30 mb-3">
                                    <div class="icon"><i class="fa fa-user"></i></div>
                                    <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title mb-0">Total Users</h4>
                                    </div>
                                    <div class="d-flex justify-content-between pb-2">
                                    	<?php
                                    	$query = mysqli_query($con,"select count(*) from register");
                                    	$data = mysqli_fetch_array($query);
                                    	echo "<h2>$data[0]</h2>";
                                    	?>
                                    </div>
                                </div>
                            </div>
                          </a>
                        </div>
                        <div class="col-md-4">
                        	
                        </div>
                        <div class="col-md-4">

                        </div>
                    </div>
                </div>
                <!-- sales report area end -->

                <!-- row area start-->
            </div>
        </div>
        <!-- main content area end -->

<?php
include("footer.php");
?>