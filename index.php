<?php

session_start();

	// variable declaration
	$u_name = "";
	$email    = "";
	$errors = array(); 
	$_SESSION['success'] = "";

include_once ("include/db-con.php");


//check if the form has been submitted
if(isset($_POST['signup'])){

	//cleanup the variables
	//prevent mysql injection
	$u_name = mysqli_real_escape_string($db, $_POST['name']);
	$phoneno = mysqli_real_escape_string($db, $_POST['phoneno']);
	$password = mysqli_real_escape_string($db, $_POST['pwd']);
	$email = mysqli_real_escape_string($db, $_POST['email']);
				
		$enc_password = md5($password);	
if (count($errors) == 0) {
		
	$getdata = mysqli_query($db,"SELECT * FROM users WHERE u_email = '$email'");
    $row    = mysqli_fetch_assoc($getdata);

if ($row['u_email'] == $email) {

    $_SESSION['success'] = "Your email  already registered. Please try with different email";

}


else {
    


			$u_key = rand();
		
		$query = "INSERT INTO users(u_name,phoneno,u_email,u_password,u_key,u_active) VALUES('$u_name',$phoneno,'$email','$enc_password','$u_key',0)";
		mysqli_query($db, $query);

		$message =
		"
		Confirm Your Email\r\nClick the link below to activate your account\r\nhttp://www.osproject.com/users/emailconfirm.php?username=$username&code=$u_key
		"; 


		mail($email,"OSPROJECT Account Confirm Email",$message);
		$_SESSION['success'] = "Registration Has completed. Please! confirm your email to activate";

		}
}

	}
?>

<?php
include "header.php";
?>

<br><br>
<div class="container">
  <h2>Sign Up, if you have not already an account with online store.</h2>
  <form class="form-inline" name="registration-form" method="post" action="index.php" >
	<div class="form-group">
      <label class="sr-only" for="name">Name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter Name"  name="name" required="required">
    </div>
    <div class="form-group">
      <label class="sr-only" for="phoneno">PhoneNo:</label>
      <input type="text" class="form-control" id="phonenumber" placeholder="1231234567" maxlength="10"  name="phoneno" required="required">
    </div>

    <div class="form-group">
      <label class="sr-only" for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email"  name="email" required="required">
      <?php if (isset($_SESSION['success'])) : ?>
      	
			<strong>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
			</strong>
		
		<?php endif ?>
    </div>
    <div class="form-group">
      <label class="sr-only" for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd" required="required">
    </div>
    <div class="form-group">
          <input type="submit" class="form-control" id="submit" value="Sign-up" name="signup">
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