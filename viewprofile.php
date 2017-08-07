<?php
include_once ("include/phpscripts.php");
?>
<?php
include "header.php";
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
<h1 class="sign-up-header">View Profile</h1>
 
  
</div>

<?php


      $q = mysqli_query($db, "SELECT * FROM users WHERE u_email = '".$_SESSION['u_email']."'");
      echo "<table border='1' class='tbl-userprofile'>
<tr>
<th>Name</th>
<th>Phone No</th>
<th>Email</th>
</tr>";
    
      while($row = mysqli_fetch_assoc($q)){
      echo "<tr>";
echo "<td>" . $row['u_name'] . "</td>";
echo "<td>" . $row['phoneno'] . "</td>";
echo "<td>" . $row['u_email'] . "</td>";
echo "</tr>";
}
echo "</table>";

mysqli_close($db);
?>