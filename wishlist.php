<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
session_regenerate_id(true);

   $user_id = $_SESSION['user_id'];
}
else{
   $user_id = '';
   
};

include 'components/wishlist_cart.php';

if(isset($_POST['delete'])){
   $wishlist_id = $_POST['wishlist_id'];
   $delete_wishlist_item = $conn->prepare("DELETE FROM `wishlist` WHERE id = ?");
   $delete_wishlist_item->execute([$wishlist_id]);
}

if(isset($_GET['delete_all'])){
   $delete_wishlist_item = $conn->prepare("DELETE FROM `wishlist` WHERE user_id = ?");
   $delete_wishlist_item->execute([$user_id]);
   header('location:wishlist.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>wishlist</title>
   <link
      rel="shortcut icon"
      href="images/Ca- (1).webp"
      type="image/x-icon"
    />
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<section class="products">

   <h3 class="heading">قائمة رغباتي</h3>

   <div class="box-container">

   <?php
      $grand_total = 0;
      $select_wishlist = $conn->prepare("SELECT * FROM `wishlist` WHERE user_id = ?");
      $select_wishlist->execute([$user_id]);
      if($select_wishlist->rowCount() > 0){
         while($fetch_wishlist = $select_wishlist->fetch(PDO::FETCH_ASSOC)){
            $grand_total += $fetch_wishlist['price'];  
   ?>
   <form action="" method="post" class="box">
      <input type="hidden" name="pid" value="<?= $fetch_wishlist['pid']; ?>">
      <input type="hidden" name="wishlist_id" value="<?= $fetch_wishlist['id']; ?>">
      <input type="hidden" name="name" value="<?= $fetch_wishlist['name']; ?>">
      <input type="hidden" name="price" value="<?= $fetch_wishlist['price']; ?>">
      <input type="hidden" name="image" value="<?= $fetch_wishlist['image']; ?>">
      <input type="hidden" name="size1" value="<?= $fetch_product['size1']; ?>">
      <input type="hidden" name="size2" value="<?= $fetch_product['size2']; ?>">
      <input type="hidden" name="size3" value="<?= $fetch_product['size3']; ?>">
      <input type="hidden" name="size4" value="<?= $fetch_product['size4']; ?>">
      <input type="hidden" name="size5" value="<?= $fetch_product['size5']; ?>">
      <input type="hidden" name="size6" value="<?= $fetch_product['size6']; ?>">
      <a href="quick_view.php?pid=<?= $fetch_wishlist['pid']; ?>" class="fas fa-eye"></a>
      <img src="uploaded_img/<?= $fetch_wishlist['image']; ?>" alt="">
      <div class="name"><?= $fetch_wishlist['name']; ?></div>
      <div class="flex">
         <div class="price"><?= $fetch_wishlist['price']; ?>da</div>
         <input type="number" name="qty" class="qty" min="1" max="99" onkeypress="if(this.value.length == 2) return false;" value="1">
      </div>
      <input type="submit" value="أضف إلى السلة" class="btn" name="add_to_cart">
      <input type="submit" value="حذف المنتج" onclick="return confirm('delete this from wishlist?');" class="delete-btn" name="delete">
   </form>
   <?php
      }
   }else{
      echo '<p class="empty">قائمة رغباتك فارغة </p>';
   }
   ?>
    <div class="wishlist-total">
      <p> <span><?= $grand_total; ?> da</span> : المجموع الكلي</p>
      <a href="shop.php" class="option-btn">مواصلة التسوق</a>
      <a href="wishlist.php?delete_all" class="delete-btn <?= ($grand_total > 1)?'':'disabled'; ?>" onclick="return confirm('delete all from wishlist?');">حذف جميع العناصر</a>
   </div>

   </div>

  
</section>













<?php include 'components/footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>