<?php
include_once ("include/phpscripts.php");
?>
<?php
include "header.php";
?>

<br><br>
<div class="container" id=content-registration>
<h1 class="sign-up-header">Login</h1>
  <h2>Sign Up, if you have not already an account with online store. Click on create an account button for signup.</h2>
  <form class="form" id="registration-form" name="login-form" method="post" action="userhome.php" >

  	<?php if (isset($_SESSION['notification'])) : ?>
			<div class="account-confirm" >
				<p>
					<strong>
						<?php 
							echo $_SESSION['notification']; 
							unset($_SESSION['notification']);
						?>
					</strong>
				</p>
			</div>
	<?php endif ?>
	<div class="form-group">
      <label class="lable-sr-only" for="name">Email:</label>
      <input type="email" class="form-control" id="lg-email" placeholder="Enter Your Email"  name="lg-email" required="required">
    </div>
    

    
    <div class="form-group">
      <label class="lable-sr-only" for="pwd">Password:</label>
      <input type="password" class="form-control" id="lg-pwd" placeholder="Enter password" name="lg-pwd" required="required">
    </div>
    <div class="form-group">
         
          <button type="submit" class="btn btn-default" id="submit" name="login-button">Login</button>
    </div>
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="account-confirm" >
				<p>
					<strong>
						<?php 
							echo $_SESSION['success']; 
							unset($_SESSION['success']);
						?>
					</strong>
				</p>
			</div>
	<?php endif ?>
    <p class="sign-in">
		If you are not already a member? <a href="index.php">Create an Account</a>
	</p>
  </form>
</div>

