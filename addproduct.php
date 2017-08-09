<?php
include_once ("include/phpscripts.php");
?>
<?php
include "header.php";
?>
<br><br>
<div class="container" id=main-content>
  <h1 class="sign-up-header">Welcome to Product Publishing</h1>
   <h2>Welcome to <strong> <a href="userhome.php"><?php echo $_SESSION['u_name'];  ?></a></strong></h2>
<?php 
include 'userprofile-menu.php';
?>
</div>  
<div class="container" id=content-registration>
<h1 class="header-title">Publish Your Products</h1>
  <form class="form" id="registration-form" name="product-publishing-form" enctype=”multipart/form-data” method="post" action="" >
	<div class="form-group">
      <label class="lable-sr-only" for="product-title">Product Title:</label>
      <input type="text" class="form-control" id="product-title" placeholder="Enter Product Title"  name="product-title" required="required">
    </div>
    <div class="form-group">
      <label class="lable-sr-only" for="product-description">Product Description:</label><br>
      <textarea cols="72" rows="10" name="product-desc" required="required"></textarea>
    </div>

    <div class="form-group">
      <label class="lable-sr-only" for="product-price">Product Price:</label><br>
      <span class="currencyinput">$<input type="text" name="product-price" required="required"></span>
    </div>
    <div class="form-group">
      <label class="lable-sr-only" for="product-thumbnail">Product Thumbnail Image:</label>
      <input type="file" class="form-control"  name="product-thumbnail" required="required" >
    </div>

    <div class="form-group">
      <label class="lable-sr-only" for="product-silder">Product Slider Image:</label>
      <input type="file" class="form-control" name="product-slider_image" required="required" >
    </div>
    <div class="form-group">
         
          <button type="submit" class="btn btn-default" id="submit" name="signup">Submit</button>
    </div>
  </form>
</div>