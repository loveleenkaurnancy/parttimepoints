<?php
$page = "register";
include("header.php");

if(isset($_POST['edit']))
{
    $id = $_POST['id'];
    $points = $_POST['points'];
    $profit = $_POST['profit'];
    $query = mysqli_query($con, "UPDATE `register` SET `points`='$points',`profit`='$profit' WHERE id='$id'");
    if($query)
    {
        $msg1 = "Edited Sucessfully!";
    }
    else
    {
        $msg2 = "Error";
    }
}

if(isset($_POST['delete']))
{
    $id = $_POST['id'];
    $query = mysqli_query($con, "DELETE from `register` WHERE id='$id'");
    if($query)
    {
        $msg1 = "Deleted Successfully!";
    }
    else
    {
        $msg2 = "Error";
    }
}
?>

            <div class="main-content-inner">
                <div class="row">
                    <!-- Dark table start -->
                    <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
        <?php
            if(isset($msg1))
            {
          ?>
            <div class="form-group">
              <div class="col-md-12 col-sm-12 col-xs-12 ">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                   <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                  </button>
                  <strong></strong><?php echo $msg1 ?>
                </div>
              </div>
            </div>
          <?php
            }
          ?>

          <?php
            if(isset($msg2))
            {
          ?>
            <div class="form-group">
              <div class="col-md-12 col-sm-12 col-xs-12 ">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                  </button>
                  <strong></strong><?php echo $msg2 ?>
                </div>
              </div>
            </div>
          <?php
            }
          ?>
                                <h4 class="header-title">Users</h4>
                                <div class="data-tables datatable-dark">
                                    <table id="dataTable3" class="text-left" width="100%">
                                        <thead class="text-capitalize">
                                            <tr>
                                                <th>Sr.</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Points</th>
                                                <th>Profit</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $query = mysqli_query($con, "SELECT * FROM register");
                                            $idd = 0;
                                            while($row = mysqli_fetch_array($query))
                                            {
                                                $idd++;
                                                echo "<tr><td>$idd</td>";
                                                echo "<td>$row[name]</td>";
                                                echo "<td>$row[email]</td>";
                                                echo "<td>$row[points]</td>";
                                                echo "<td>$row[profit]%</td>";
                                                echo '<td><button type="button" class="btn btn-rounded btn-primary mb-3" data-toggle="modal" data-target="#modal'.$row['id'].'">Edit</button>&nbsp;&nbsp;';
                                                echo '<button type="button" class="btn btn-rounded btn-danger mb-3" data-toggle="modal" data-target="#modaldelete'.$row['id'].'">Delete</button>';
                                                ?>

                                <!-- Modal -->
                                <div class="modal fade" id="modal<?php echo $row['id']; ?>">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit</h5>
                                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <form class="form-horizontal form-label-left" method="post">
                                                  <div class="form-group">
                                                     <div class="container">
                                                        <div class="row">
                                                            <div class="col-md-3" style="margin: auto;">
                                                                <label class="control-label" for="first-name">Points
                                                                </label>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <input type="text" id="points" name="points" required="required" value="<?php echo $row['points']; ?>" class="form-control" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                 </div>

                                                  <div class="form-group">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-md-3" style="margin: auto;">
                                                                <label class="control-label" for="first-name">Profit
                                                                </label>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <input type="text" id="profit" name="profit" required="required" value="<?php echo $row['profit']; ?>" class="form-control" />
                                                                <input type="hidden" name="id" required="required" value="<?php echo $row['id']; ?>" class="form-control col-md-7 col-xs-12" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                 </div>

                                                 <div style="text-align: right;">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>&nbsp;&nbsp;
                                                    <button type="submit" name="edit" class="btn btn-primary">Submit</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Modal -->

                                <!-- Modal Delete-->
                                <div class="modal fade" id="modaldelete<?php echo $row['id']; ?>">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Delete</h5>
                                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <form class="form-horizontal form-label-left" method="post">
                                                  <div class="form-group">
                                                     <div class="container">
                                                        <div class="row">
                                                            <div class="col-md-12" >
                                                                <label class="control-label" for="first-name">Do you really want to Delete?
                                                                </label>
                                                                <input type="hidden" name="id" required="required" value="<?php echo $row['id']; ?>" class="form-control col-md-7 col-xs-12" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                 </div>

                                                 <div style="text-align: right;">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>&nbsp;&nbsp;
                                                    <button type="submit" name="delete" class="btn btn-danger">Delete</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Modal Delete-->
                                                </td>       
                                            </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Dark table end -->
                </div>
            </div>
        </div>
        <!-- main content area end -->

<?php
include("footer.php");
?>