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
  $email = $_POST['email'];
  $password = md5($_POST['password']);

  $query = mysqli_query($con, "SELECT * FROM register where email='$email' and password='$password'");

  if($query)
  {
  	if(mysqli_num_rows($query)>0)
  	{
  		$row = mysqli_fetch_array($query);
  		// session_start();
  		$_SESSION['id'] = $row['id'];
      $_SESSION['name'] = $row['name'];
  		$_SESSION['email'] = $email;
  		echo "<script>window.open('home.php', '_self')</script>";
  	}
  	else
  	{
  		$msg2 = "Invalid Username/Password";
  	}
  }
  else
  {
    $msg2 = "Error";
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
              <h2>Login</h2>
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
	              <input placeholder="Email" class="form-control" name="email">
	            </div>
	            <div class="form-group">
	              <input type="password" placeholder="Password" class="form-control" name="password" id="password">
	              <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password" onclick="myFunction()"></span>
	            </div>
	            <div class="loginbox">
	              <button class="btn signin-btn" type="submit" name="submit">LOGIN</button>
	            </div>
	            <div class="signupbox">
	              <span><br>No Account! <a href="register.php">Register</a></span>
	            </div>
	           
          	</form>
          </div>
      </div>
  </div>
</section>

<?php
include("footer.php");
?>