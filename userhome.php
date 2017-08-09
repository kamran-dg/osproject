<?php
include_once ("include/phpscripts.php");
?>

<?php
include "header.php";
?>


<br><br>
<div class="container" id=main-content>
	<h1 class="sign-up-header">Welcome to Main Page</h1>
 	 <h2>Welcome to <strong> <a href="userhome.php"><?php echo $_SESSION['u_name'];  ?></a></strong></h2>
<?php 
include 'userprofile-menu.php';
?>
</div>	

<?php
include "bottomcontentbar.php";
include "footer.php";
?>

