<?php
   if(isset($message)){
      foreach($message as $message){
         echo '
         <div class="message">
            <span>'.$message.'</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
         </div>
         ';
      }
   }
?>

<header class="header">

   <section class="flex">
   <a href=".//index" class="logo">
          <img src="images/Ca- (1).webp" alt="" width="100px" height="100px">

      </a>
 

      <nav class="navbar">
  
         <a href=".//index">الصفحة الرئيسية</a>
         <a href="about">نبذة عنا</a>
         <a href="orders">  طلباتي  </a>
         <a href="shop">تسوق الان</a>
         <a href="contact">اتصال</a>
         <a href="livraison">تكاليف الشحن</a>

      </nav>

      <div class="icons">
         <?php
            $count_wishlist_items = $conn->prepare("SELECT * FROM `wishlist` WHERE user_id = ?");
            $count_wishlist_items->execute([$user_id]);
            $total_wishlist_counts = $count_wishlist_items->rowCount();

            $count_cart_items = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
            $count_cart_items->execute([$user_id]);
            $total_cart_counts = $count_cart_items->rowCount();
         ?>
         <a href="search_page"><i class="fas fa-search"></i></a>
         <a href="cart"><i class="fas fa-shopping-cart"></i><span>(<?= $total_cart_counts; ?>)</span></a>
         <div id="menu-btn" class="fas fa-bars"></div>

      </div>

      

   </section>

</header>