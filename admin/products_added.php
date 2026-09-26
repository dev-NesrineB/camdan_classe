<?php

include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:admin_login.php');
}

if(isset($_GET['delete'])){

    $delete_id = $_GET['delete'];
    $delete_product_image = $conn->prepare("SELECT * FROM `products` WHERE id = ?");
    $delete_product_image->execute([$delete_id]);
    $fetch_delete_image = $delete_product_image->fetch(PDO::FETCH_ASSOC);
    unlink('../uploaded_img/'.$fetch_delete_image['image_01']);
    unlink('../uploaded_img/'.$fetch_delete_image['image_02']);
    unlink('../uploaded_img/'.$fetch_delete_image['image_03']);
    $delete_product = $conn->prepare("DELETE FROM `products` WHERE id = ?");
    $delete_product->execute([$delete_id]);
    $delete_cart = $conn->prepare("DELETE FROM `cart` WHERE pid = ?");
    $delete_cart->execute([$delete_id]);
    $delete_wishlist = $conn->prepare("DELETE FROM `wishlist` WHERE pid = ?");
    $delete_wishlist->execute([$delete_id]);
    header('location:products_added.php');
 }
 

?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>منتجات مضافة</title>
   <link
      rel="shortcut icon"
      href="../images/Ca- (1).webp"
      type="image/x-icon"
    />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>

<?php include '../components/admin_header.php'; ?>

<section class="show-products">

   <h1 class="heading">المنتجات مضافة</h1>

   <div class="box-container">

   <?php
      $select_products = $conn->prepare("SELECT * FROM `products`");
      $select_products->execute();
      if($select_products->rowCount() > 0){
         while($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)){ 
   ?>
   <div class="box">

      
      <img src="../uploaded_img/<?= $fetch_products['image_01']; ?>" >

      <div class="name"><?= $fetch_products['name']; ?></div>
      <div class="name"><?= $fetch_products['slug']; ?></div>

      <div class="price"><span><?= $fetch_products['price']; ?></span>da</div>
      <div class="details"><span><?= $fetch_products['details']; ?></span></div>

      <div class="details">
         <span><?= $fetch_products['size1']; ?></span>
       <span><?= $fetch_products['size2']; ?></span>
       <span><?= $fetch_products['size3']; ?></span>
       <span><?= $fetch_products['size4']; ?></span>
       <span><?= $fetch_products['size5']; ?></span>
       <span><?= $fetch_products['size6']; ?></span>

   
   
   </div>
   <div class="details">
         <span><?= $fetch_products['color1']; ?></span>
       <span><?= $fetch_products['color2']; ?></span>
       <span><?= $fetch_products['color3']; ?></span>
       <span><?= $fetch_products['color4']; ?></span>
       <span><?= $fetch_products['color5']; ?></span>
       <span><?= $fetch_products['color6']; ?></span>
       <span><?= $fetch_products['color7']; ?></span>
       <span><?= $fetch_products['color8']; ?></span>
       <span><?= $fetch_products['color9']; ?></span>
       <span><?= $fetch_products['color10']; ?></span>
       <span><?= $fetch_products['color11']; ?></span>
       <span><?= $fetch_products['color12']; ?></span>
   
   
   </div>

   
    
      <div class="flex-btn">
         <a href="update_product.php?update=<?= $fetch_products['id']; ?>" class="option-btn">تحديث</a>
         <a href="products_added.php?delete=<?= $fetch_products['id']; ?>" class="delete-btn" onclick="return confirm('delete this product?');">حذف</a>
      </div>
   </div>
   <?php
         }
      }else{
         echo '<p class="empty">لم يتم اضافة اي منتج!</p>';
      }
   ?>
   
   </div>

</section>














<script src="../js/admin_script.js"></script>
   
</body>
</html>