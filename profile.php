<?php
$page = "profile";
include("header.php");
@$id=$_SESSION['id'];
if($id=="")
{
  echo "<script>window.open('index.php', '_self')</script>";
}

// if($id == "")
// {
  
// }
// else
// {
//   echo "<script>window.open('profile.php', '_self')</script>";
// }
if(isset($_POST['submit']))
{
  @$email = $_SESSION['email'];
  $password = md5($_POST['password']);
  $newpassword = md5($_POST['newpassword']);
  $query = mysqli_query($con, "SELECT * FROM register where email = '$email' and password = '$password' ");
  if($query)
  {
    if(mysqli_num_rows($query) > 0)
    {
      $q2 = mysqli_query($con, "UPDATE register set password='$newpassword' where email='$email'");
      if($q2)
      {
        $msg1 = "Password Updated Successfuully";
      }
      else
      {
        echo mysqli_error($q2);
      }
    }
    else
    {
      $msg2 = "Invalid Old Password";
    }
  }
}


?>

<script type="text/javascript">
  function myFunction() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
function myFunction2() {
  var x = document.getElementById("password2");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>

<!-- Start single page header -->
  <section id="single-page-header">
    <div class="overlay">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="single-page-header-left">
              <h2><?php echo "$name" ?></h2>
              <!-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p> -->
            </div>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="single-page-header-right">
              <ol class="breadcrumb">
                <li><a href="home.php">Home</a></li>
                <li class="active">Profile</li>
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
         <div class="col-md-4 col-md-offset-4">

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

  			   <form method="POST">
              <div class="form-group">
                <input placeholder="Name" class="form-control" name="name" value="<?php echo $_SESSION['name'] ?>" readonly>
              </div>
	            <div class="form-group">
	              <input placeholder="Email" class="form-control" name="email" value="<?php echo $_SESSION['email'] ?>" readonly>
	            </div>
	            <div class="form-group">
	              <input type="password" placeholder="Old Password" class="form-control" name="password" id="password">
                <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password" onclick="myFunction()"></span>
	            </div>
              <div class="form-group">
                <input type="password" placeholder="New Password" class="form-control" name="newpassword" id="password2">
                <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password" onclick="myFunction2()"></span>
              </div>
	            <div class="loginbox">
	              <button type="submit" name="submit" class="btn signin-btn">SUBMIT</button>
	            </div>
          	</form>
          </div>
      </div>
  </div>
</section>

<?php
include("footer.php");
?>