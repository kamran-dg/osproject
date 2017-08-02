<?php
include_once ("include/phpscripts.php");
?>
<?php
include "header.php";
?>

<br><br>
<div class="container" id=content-registration>
<h1 class="sign-up-header">Login</h1>
  <h2>Sign Up, if you have not already an account with online store. Click on the create an account button.</h2>
  <form class="form" id="registration-form" name="registration-form" method="post" action="index.php" >
	<div class="form-group">
      <label class="lable-sr-only" for="name">Email:</label>
      <input type="text" class="form-control" id="lg-email" placeholder="Enter Name"  name="lg-email" required="required">
    </div>
    

    
    <div class="form-group">
      <label class="lable-sr-only" for="pwd">Password:</label>
      <input type="password" class="form-control" id="lg-pwd" placeholder="Enter password" name="lg-pwd" required="required">
    </div>
    <div class="form-group">
         
          <button type="submit" class="btn btn-default" id="submit" name="login-button">Login</button>
    </div>
		
    <p class="sign-in">
		If you are not already a member? <a href="index.php">Create an Account</a>
	</p>
  </form>
</div>

</body>
</html>