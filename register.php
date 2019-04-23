<?php
include("header.php");
@$id=$_SESSION['id'];
if($id == "")
{
  
}
else
{
  echo "<script>window.open('home.php', '_self')</script>";
}

if(isset($_POST['submit']))
{
  $name = $_POST['name'];
  $email = $_POST['email'];
  $profession = $_POST['profession'];
  $password = md5($_POST['password']);

  $q = mysqli_query($con, "SELECT * FROM register where email ='$email'");
  if(mysqli_num_rows($q) > 0)
  {
    $msg2 = "Email Already Registered";
  }
  else
  {
    $query = mysqli_query($con, "INSERT INTO `register`(`name`, `email`, `profession`, `password`) VALUES ('$name', '$email', '$profession', '$password')");
    

    if($query)
    {
      $msg1 = "Registered Successfully";
    }
    else
    {
      $msg2 = "Error";
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
</script>

<!-- Start single page header -->
  <section id="single-page-header">
    <div class="overlay">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="single-page-header-left" style="text-align: center;">
              <h2>Register</h2>
              <!-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p> -->
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
                <input placeholder="Name" class="form-control" name="name" required="required">
              </div>
              <div class="form-group">
                <input type="email" placeholder="Email" class="form-control" name="email"  required="required">
              </div>
              <div class="form-group">
                <input placeholder="Profession" class="form-control" name="profession" required="required">
              </div>
              <div class="form-group">
                <input type="password" placeholder="Password" class="form-control" name="password" id="password" required="required">
                <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password" onclick="myFunction()"></span>
              </div>
              <div class="loginbox">
                <button type="submit" name="submit" class="btn signin-btn">REGISTER</button>
              </div>
              <div class="signupbox">
                <span><br>Already got account? <a href="index.php">Sign In.</a></span>
              </div>
              
            </form>
          </div>
      </div>
  </div>
</section>

<?php
include("footer.php");
?>