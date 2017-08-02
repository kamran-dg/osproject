<?php
include_once ("include/phpscripts.php");
?>
<?php
include "header.php";
?>

<br><br>
<div class="container" id=content-registration>
<h1 class="sign-up-header">Sign Up</h1>
  <h2>Sign Up, if you have not already an account with online store.</h2>
  <form class="form" id="registration-form" name="registration-form" method="post" action="index.php" >
	<div class="form-group">
      <label class="lable-sr-only" for="name">Name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter Name"  name="name" required="required">
    </div>
    <div class="form-group">
      <label class="lable-sr-only" for="phoneno">PhoneNo:</label>
      <input type="text" class="form-control" id="phonenumber" placeholder="1231234567" maxlength="10"  name="phoneno" required="required">
    </div>

    <div class="form-group">
      <label class="lable-sr-only" for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email"  name="email" required="required">
      <?php if (isset($_SESSION['notification'])) : ?>
      	
			<strong class="email-exist-notification">
					<?php 
						echo $_SESSION['notification']; 
						unset($_SESSION['notification']);
					?>
			</strong>
		
		<?php endif ?>
    </div>
    <div class="form-group">
      <label class="lable-sr-only" for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd" required="required" width="300">
    </div>
    <div class="form-group">
         
          <button type="submit" class="btn btn-default" id="submit" name="signup">Submit</button>
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
		Already a member? <a href="login.php">Sign in</a>
	</p>
  </form>
</div>

</body>
</html>