<?php
/* -- Registration Form  -- */
session_start();

	// variable declaration
	$u_name = "";
	$email    = "";
	$errors = array(); 
	$_SESSION['success'] = "";
	$_SESSION['notification'] = "";

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

    $_SESSION['notification'] = "Your email  already registered. Please try with different email";

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

// Login User form

	if (isset($_POST['login-button'])) {
		$email = mysqli_real_escape_string($db, $_POST['lg-email']);
		$password = mysqli_real_escape_string($db, $_POST['lg-pwd']);

		

		if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT * FROM users WHERE u_email='$email' AND u_password='$password'";
			$results = mysqli_query($db, $query);
			$row = mysqli_fetch_assoc($results);

			if (mysqli_num_rows($results) == 1) {
				$_SESSION['u_email'] = $email;
				$_SESSION['u_name'] = $row['u_name'];
				$_SESSION['u_email'] = $row['u_email'];
				header("Location: userhome.php");
			
			}else {
				$_SESSION['notification'] = "* You entered a wrong username/password";
			}
		}
	}

//--- Upload Image


	if(isset($_POST['upload_btn'])){
		move_uploaded_file($_FILES['file']['tmp_name'],"user/profiles/".$_FILES['file']['name']);
		
		$profile_update_querry = mysqli_query($db,"UPDATE users SET u_image = '".$_FILES['file']['name']."' WHERE u_email = '".$_SESSION['u_email']."'");

	}
if(isset($_POST['user-logout'])) {
	session_unset();
	session_destroy();
	header("Location: login.php");
}

?>





