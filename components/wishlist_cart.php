<?php


if(isset($_POST['add_to_cart'])){

   if($user_id == ''){
 

      $pid = $_POST['pid'];
      $pid = filter_var($pid, FILTER_SANITIZE_STRING);
      $name = $_POST['name'];
      $name = filter_var($name, FILTER_SANITIZE_STRING);
      $price = $_POST['price'];
      $price = filter_var($price, FILTER_SANITIZE_STRING);
      $image = $_POST['image'];
      $image = filter_var($image, FILTER_SANITIZE_STRING);
      $size_selected = $_POST['size_selected'];
      $size_selected = filter_var($size_selected, FILTER_SANITIZE_STRING);
      $colored = $_POST['colored'];
      $colored = filter_var($colored, FILTER_SANITIZE_STRING);

      $qty = $_POST['qty'];
      $qty = filter_var($qty, FILTER_SANITIZE_STRING);

      $check_cart_numbers = $conn->prepare("SELECT * FROM `cart` WHERE name = ? AND user_id = ?");
      $check_cart_numbers->execute([$name, $user_id]);

      if($check_cart_numbers->rowCount() > 0){
         $message[] = '! تمت اضافته بالفعل الى السلة';
      }
      else{

         // $check_wishlist_numbers = $conn->prepare("SELECT * FROM `wishlist` WHERE name = ? AND user_id = ?");
         // $check_wishlist_numbers->execute([$name, $user_id]);

         // if($check_wishlist_numbers->rowCount() > 0){
         //    $delete_wishlist = $conn->prepare("DELETE FROM `wishlist` WHERE name = ? AND user_id = ?");
         //    $delete_wishlist->execute([$name, $user_id]);
         // }

         $insert_cart = $conn->prepare("INSERT INTO `cart`(user_id, pid, name, price, quantity, image, size_selected, colored) VALUES(?,?,?,?,?,?,?,?)");
         $insert_cart->execute([$user_id, $pid, $name, $price, $qty, $image, $size_selected ,$colored]);
         $message[] = '! تمت إضافته إلى السلة';
         
      }

   }

}

?>