<? php

include_once ("/include/db-con.php");


//check if the form has been submitted
if(isset($_POST['signup'])){

	//cleanup the variables
	//prevent mysql injection
	$u_name = $_POST['name'];
	$phoneno = $_POST['phoneno'];
	$password = $_POST['pwd'];
	$email = $_POST['email'];
				
		$enc_password = md5($password);	

		

			$u_key = rand();
		
		$insert_result = mysql_query("INSERT INTO users(u_name,phoneno,u_email,u_password,u_key,u_active) VALUES('$u_name',$phoneno,'$email','$enc_password','$u_key',0)");

		$message =
		"
		Confirm Your Email 
		Click the link below to activate your account
		http://www.osproject.com/users/emailconfirm.php?username=$username&code=$u_key
		"; 

		mail($email,"OSPROJECT Account Confirm Email",$message,"From: donotreply@oslocal.com");
		echo "Registration Has completed. Please! confirm your email to activate";

		}
	
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Online Store | Registration</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>

<div class="container">
  <h2>Sign Up, if you have not already an account with online store.</h2>
  <form class="form-inline" name="registration-form" method="post" action="index.php" >
	<div class="form-group">
      <label class="sr-only" for="name">Name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter Name"  name="name">
    </div>
    <div class="form-group">
      <label class="sr-only" for="phoneno">PhoneNo:</label>
      <input type="text" class="form-control" id="phonenumber" placeholder="+92-123-1234567"  name="phoneno">
    </div>

    <div class="form-group">
      <label class="sr-only" for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email"  name="email">
    </div>
    <div class="form-group">
      <label class="sr-only" for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
    </div>
    <div class="form-group">
          <input type="submit" class="form-control" id="submit" value="Sign-up" name="signup">
    </div>
  </form>
</div>

</body>
</html>
