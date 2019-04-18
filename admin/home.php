<?php
include("header.php");
?>


<!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <div class="header-area" style="padding-top: 0px; padding-bottom: 0px;">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                    <!-- profile info & task notification -->
                    <div class="col-md-6 col-sm-4 clearfix">
                    	 <div class="user-profile pull-right">
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['adminname']; ?> <i class="fa fa-angle-down"></i></h4>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="logout.php">Log Out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- header area end -->

            <div class="main-content-inner">
                <!-- sales report area start -->
                <div class="sales-report-area mt-5 mb-5">
                    <div class="row">
                        <div class="col-md-4">
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