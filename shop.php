<?php

include 'components/connect.php';

session_start();

if (isset($_SESSION['user_id'])) {
session_regenerate_id(true);

  $user_id = $_SESSION['user_id'];
} else {
  $user_id = '';
};

include 'components/wishlist_cart.php';

?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>تسوق الان</title>
  <link
      rel="shortcut icon"
      href="images/Ca- (1).webp"
      type="image/x-icon"
    />
  <!-- font awesome cdn link  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

  <!-- custom css file link  -->
  <link rel="stylesheet" href=".//css/style.css">

</head>

<body>

  <?php include 'components/user_header.php'; ?>

  <section class="products">

    <h1 class="heading">أحدث المنتجات</h1>

    <div class="box-container">

      <?php
      $select_products = $conn->prepare("SELECT * FROM `products`");
      $select_products->execute();
      if ($select_products->rowCount() > 0) {
        while ($fetch_product = $select_products->fetch(PDO::FETCH_ASSOC)) {
      ?>
          <form action="" method="post" class="box">
            <input type="hidden" name="pid" value="<?= $fetch_product['id']; ?>">
            <input type="hidden" name="name" value="<?= $fetch_product['name']; ?>">
            <input type="hidden" name="price" value="<?= $fetch_product['price']; ?>">
            <input type="hidden" name="image" value="<?= $fetch_product['image_01']; ?>">

            <input type="hidden" name="size1" value="<?= $fetch_product['size1']; ?>">
            <input type="hidden" name="size2" value="<?= $fetch_product['size2']; ?>">
            <input type="hidden" name="size3" value="<?= $fetch_product['size3']; ?>">
            <input type="hidden" name="size4" value="<?= $fetch_product['size4']; ?>">
            <input type="hidden" name="size5" value="<?= $fetch_product['size5']; ?>">
            <input type="hidden" name="size6" value="<?= $fetch_product['size6']; ?>">
            <input type="hidden" name="color1" value="<?= $fetch_product['color1']; ?>">
            <input type="hidden" name="color2" value="<?= $fetch_product['color2']; ?>">
            <input type="hidden" name="color3" value="<?= $fetch_product['color3']; ?>">
            <input type="hidden" name="color4" value="<?= $fetch_product['color4']; ?>">
            <input type="hidden" name="color5" value="<?= $fetch_product['color5']; ?>">
            <input type="hidden" name="color6" value="<?= $fetch_product['color6']; ?>">
            <input type="hidden" name="color7" value="<?= $fetch_product['color7']; ?>">
            <input type="hidden" name="color8" value="<?= $fetch_product['color8']; ?>">
            <input type="hidden" name="color9" value="<?= $fetch_product['color9']; ?>">
            <input type="hidden" name="color10" value="<?= $fetch_product['color10']; ?>">
            <input type="hidden" name="color11" value="<?= $fetch_product['color11']; ?>">
            <input type="hidden" name="color12" value="<?= $fetch_product['color12']; ?>">

            <!-- <button class="fas fa-heart" type="submit" name="add_to_wishlist"></button> -->
            <a href="quick_view.php?pid=<?= $fetch_product['id']; ?>" class="fas fa-eye"></a>
            <a  href="quick_view.php?pid=<?= $fetch_product['id']; ?>" >
            <img src="./uploaded_img/<?= $fetch_product['image_01']; ?>" alt="">

            </a>
            <div class="name"><?= $fetch_product['name']; ?></div>
      <div class="flex">
         <div class="price"><?= $fetch_product['price']; ?>       <span>دج</span></div>
         <!-- <input type="number" name="qty" class="qty" min="1" max="99" onkeypress="if(this.value.length == 2) return false;" value="1"> -->
      </div>
      <!-- <div class="details">
        <select name="size_selected" class="size" id="selection_size">
         <option   >مقاس</option>
         <option><?= $fetch_product['size1']; ?></option>
         <option><?= $fetch_product['size2']; ?></option>
         <option><?= $fetch_product['size3']; ?></option>
         <option><?= $fetch_product['size4']; ?></option>
         <option><?= $fetch_product['size5']; ?></option>
         <option><?= $fetch_product['size6']; ?></option>
       

        </select>
        <select name="colored" class="size" id="selection_color">
         <option  >اللون</option>
         <option ><?= $fetch_product['color1']; ?></option>
         <option><?= $fetch_product['color2']; ?></option>
         <option><?= $fetch_product['color3']; ?></option>
         <option><?= $fetch_product['color4']; ?></option>
         <option><?= $fetch_product['color5']; ?></option>
         <option><?= $fetch_product['color6']; ?></option>
         <option><?= $fetch_product['color7']; ?></option>
         <option><?= $fetch_product['color8']; ?></option>
         <option><?= $fetch_product['color9']; ?></option>
         <option><?= $fetch_product['color10']; ?></option>
         <option><?= $fetch_product['color11']; ?></option>
         <option><?= $fetch_product['color12']; ?></option>


       

        </select> 
      
      

   
   
   </div>
    -->
      <!-- <input type="submit" value="أضف إلى السلة" class="btn" name="add_to_cart"> -->
      <a href="quick_view.php?pid=<?= $fetch_product['id']; ?>"  class="btn"> تفاصيل عن المنتج</a>
          </form>
      <?php
        }
      } else {
        echo '<p class="empty">no products found!</p>';
      }
      ?>

    </div>

  </section>













  <?php include 'components/footer.php'; ?>

  <script src="js/script.js"></script>

</body>

</html>