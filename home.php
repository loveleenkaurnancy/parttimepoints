<?php
$page = "home";
include("header.php");
@$id=$_SESSION['id'];
if($id=="")
{
  echo "<script>window.open('index.php', '_self')</script>";
}

$query = mysqli_query($con, "SELECT * FROM register where id='$id'");
$r = mysqli_fetch_array($query);

if(isset($_POST['submit']))
{
  $flag = 0;
  
  $email = $_POST['email'];
  $points = $_POST['points'];

  if($points > $r['points'])
  {
    $msg2 = "You don't have enough point";
  }
  else
  {
    $flag = $flag + 1;
  }

$flag2 = 0;
    $q3 = mysqli_query($con, "SELECT * FROM register");
    while($r3 = mysqli_fetch_array($q3))
    {
      $e = $r3['email'];
      if($email == $e)
      {
        $flag2 = $flag2 + 1; 
      }
    }

    if($flag2 == 0)
    {
      $msg2 = "Inavlid Email";
    }

  if($flag == 1 && $flag2 == 1)
  {
    $q1 = mysqli_query($con, "UPDATE register set points = points + '$points' where email='$email'");
    $q2 = mysqli_query($con, "UPDATE register set points = points - '$points' where id='$id'");
    if($q1)
    {
      $msg1 = "Points Transfer Successfully!";
      // header("location: home.php");
      echo "<script>window.open('home.php', '_self')</script>";
    }
  }
}
?>


<!-- Start single page header -->
  <section id="single-page-header">
    <div class="overlay">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="single-page-header-left">
              <h2><?php echo "$name"; ?></h2>
              <!-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p> -->
            </div>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="single-page-header-right">
              <ol class="breadcrumb">
                <li class="active">Home</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End single page header -->

  <section id="contact">
     <div class="container">
       <div class="row">
         <div class="col-md-8 col-md-offset-2">
          <?php
            if(isset($msg1))
            {
          ?>
            <div class="form-group">
              <div class="col-md-12 col-sm-12 col-xs-12 ">
                <div class="alert alert-success alert-dismissible fade in" role="alert">
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
                <div class="alert alert-danger alert-dismissible fade in" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                  </button>
                  <strong></strong><?php echo $msg2 ?>
                </div>
              </div>
            </div>
          <?php
            }
          ?>

          <div class="col-md-12">
            <div class="row">
              <div class="col-md-6 col-sm-6">
                <div class="single-feature wow">
                  <h4 class="feat-title">Total Points</h4>
                  <?php
                    echo "<p>$r[points]</p>";
                  ?>
                </div>

                <div class="single-feature wow">
                  <h4 class="feat-title">Profit</h4>
                  <?php
                    echo "<p>$r[profit]%</p>";
                  ?>
                </div>
              </div>

              <div class="col-md-6 col-sm-6">
                <form method="POST">
                  <div class="form-group">
                    <input placeholder="Email" class="form-control" name="email" list="data">
                    <datalist id="data">
                      <?php
                        $email = $r['email'];
                        $query = mysqli_query($con, "SELECT * FROM register WHERE NOT (email = '$email') AND email LIKE '%".$searchTerm."%' ORDER BY email ASC");
                        while ($row = mysqli_fetch_array($query))
                        {
                          echo "<option value='".$row['email']."'>";
                        }
                      ?>
                    </datalist>
                  </div>
                  <div class="form-group">
                    <input type="text" placeholder="Points" class="form-control" name="points">
                  </div>
                  <div class="loginbox">
                    <button class="btn signin-btn" type="submit" name="submit">TRANSFER</button>
                  </div>
                </form>
              </div>
            </div>
          </div>

          </div>
      </div>
  </div>
</section>

<?php
include("footer.php");
?>