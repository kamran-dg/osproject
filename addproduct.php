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


<?php 


if(isset($_POST['product_upload']))
{
  var_dump($image1);
  var_dump($image2);
  $product_title = mysqli_real_escape_string($db, $_POST['product-title']);

  $product_descrption = mysqli_real_escape_string($db, $_POST['product-desc']);

  $product_price = mysqli_real_escape_string($db, $_POST['product-price']);

  $product_category = mysqli_real_escape_string($db, $_POST['product-category']);

$image1=$_FILES['file']['name'];
$image2=$_FILES['file']['name'];



//image temp names

$temp_name1 = $_FILES['file']['tmp_name'];
$temp_name2 = $_FILES['file']['tmp_name'];

// uploading images to its folder

move_uploaded_file($temp_name1, "content/productimages/$image1");
move_uploaded_file($temp_name2, "content/productimages/$image2");

echo "$image1";
echo "$image2";

  // $insert_product_query =  "INSERT INTO tbl_products (product_title,product_description,product_image_thumbnail,product_slider_image,product_category,product_price) VALUES ('$product_title', '$product_descrption','$image1','$image2','$product_category',$product_price)";

  // $result = mysqli_query($db,$insert_product_query);

}

?>
</div>  
<div class="container" id=content-registration>
<h1 class="header-title">Publish Your Products</h1>
  <form class="form" id="registration-form" name="product-publishing-form" method="post" action="addproduct.php" enctype=”multipart/form-data” >
  <div class="form-group">
      <label class="lable-sr-only" for="product-title">Product Title:</label>
      <input type="text" class="form-control" id="product-title" placeholder="Enter Product Title"  name="product-title" >
    </div>
    <div class="form-group">
      <label class="lable-sr-only" for="product-description">Product Description:</label><br>
      <textarea cols="72" rows="10" name="product-desc" ></textarea>
    </div>

    <div class="form-group">
      <label class="lable-sr-only" for="product-price">Product Price:</label><br>
      <span class="currencyinput">$<input type="text" name="product-price" placeholder="Enter Price" ></span>
    </div>
    <div class="form-group">
      <label class="lable-sr-only" for="product-thumbnail">Product Thumbnail Image:</label>
      <input type="file" class="form-control"  name="file"  >
    </div>

    <div class="form-group">
      <label class="lable-sr-only" for="product-silder">Product Slider Image:</label>
      <input type="file" name="file" class="form-control"/>
    </div>

    <div class="form-group">
      <label class="lable-sr-only" for="product-category">Product Category:</label>
    <select name="product-category">
    <option disabled="disabled" selected="selected">Select a Category</option>
      <option value="Accessories">Accessories</option>
      <option value="Wallets">Wallets</option>
      <option value="Footwear">Footwear</option>
      <option value="Aprons">Aprons</option>
      <option value="Bags">Bags</option>
      <option value="Device Sleeves">Device Sleeves</option>
      <option value="Belts">Belts</option>
    </select>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-default" id="submit" name="product_upload">Upload</button>
    </div>
  </form>
</div>