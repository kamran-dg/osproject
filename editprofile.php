<?php
include_once ("include/phpscripts.php");
?>
<?php
include "header.php";
?>


<?php

if(!empty($_SESSION['u_email']) ) {
$q = mysqli_query($db, "SELECT * FROM users WHERE u_email = '".$_SESSION['u_email']."'");
  while($row = mysqli_fetch_array($q)){
  $name = $row['u_name'];    
  $phoneno = $row['phoneno'];
  $email = $row['u_email'];
  $paswd = $row['u_password'];
}
  if(isset($_POST['btnupdate'])){
  $u_name = mysqli_real_escape_string($db, $_POST['name']);
  $phneno = mysqli_real_escape_string($db, $_POST['phoneno']);
  $password = mysqli_real_escape_string($db, $_POST['pwd']);
        
    $enc_password = md5($password);

$profile_update_querry = mysqli_query($db,"UPDATE users SET u_name = '$u_name', phoneno = $phneno , u_password ='$enc_password' WHERE u_email = '".$_SESSION['u_email']."'");
  $_SESSION['success'] = "Your Profile has been successfully updated. Please! see the view profile in menu and click on view profile to see your profile details. ";
}

}
else {
 header('Location:viewprofile.php');
}
?>

<br><br>
<div class="container" id=main-content>
<h2>Welcome to <strong> <?php echo $_SESSION['u_name'];  ?></strong></h2>

<div class="profile-menu pull-right" id="user-profile-menu">
        <ul class="list-1">
        <li> <form action="#" method="post" enctype="multipart/form-data" id="upload_profile_pic">
    <div class="form-group">
    <input type="file" name="file" value="Upload a New Profile">
          <button type="submit" class="btn btn-default" id="submit" name="upload_btn">Upload</button>
    </div>


</form>
</li>

          <li>
          <?php
      $q = mysqli_query($db, "SELECT * FROM users WHERE u_email = '".$_SESSION['u_email']."'");
    
      while($row = mysqli_fetch_assoc($q)){
        if($row['u_image'] == ""){
          echo "<img src='user/profiles/default-dp.png' alt='Default Profile Pic'>";
        } else {
          echo "<img src='user/profiles/".$row['u_image']."' alt='Profile Pic'>";
        }
        echo "<br>";
      }
?>
  
</li>
          <li><a href="editprofile.php">Edit Profile</a></li>
          <li><a href="viewprofile.php">View Profile</a></li>
          <li><form action="login.php" method="post"><a href="login.php"><input type="submit"  name="user-logout" value="Logout" class="user-logout"></a></form></li>
        </ul>
    </div>
    </div>

<div class="container" id=content-registration>
<h1 class="sign-up-header">Update Profile</h1>
 
  <form class="form" id="update-form" name="update-form" method="post" action="editprofile.php" >
	<div class="form-group">
      <label class="lable-sr-only" for="name">Name:</label>
      <input type="text" class="form-control" id="name"  name="name" value="<?php echo $name;?>" required="required">
    </div>
    <div class="form-group">
      <label class="lable-sr-only" for="phoneno">PhoneNo:</label>
      <input type="text" class="form-control" id="phonenumber" value="<?php echo $phoneno;?>" maxlength="10"  name="phoneno" required="required">
    </div>

    <div class="form-group">
      <label class="lable-sr-only" for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" name="pwd" value="<?php echo $paswd; ?>" required="required" width="300">
    </div>

    <div class="form-group">
      <button type="submit" class="btn btn-default" id="btnupdate" name="btnupdate">Update</button>
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
  </form>
</div>
