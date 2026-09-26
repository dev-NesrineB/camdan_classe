<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
session_regenerate_id(true);
   $user_id = $_SESSION['user_id'];
}
// !!!!!dert commentaire hnaa
else{
   $user_id = '';
   // header('location:user_login.php');
};

if(isset($_POST['order'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $number = $_POST['number'];
   $number = filter_var($number, FILTER_SANITIZE_STRING);
   
   $method = $_POST['method'];
   $method = filter_var($method, FILTER_SANITIZE_STRING);
   
   $address =  $_POST['street'] .', '. $_POST['city'] .', '. $_POST['state'] ;
   
   $address = filter_var($address, FILTER_SANITIZE_STRING);
   $total_products = $_POST['total_products'];
   $total_price = $_POST['total_price'];

   $check_cart = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
   $check_cart->execute([$user_id]);

   if($check_cart->rowCount() > 0){

      $insert_order = $conn->prepare("INSERT INTO `orders`(user_id, name, number,  method, address, total_products, total_price) VALUES(?,?,?,?,?,?,?)");
      $insert_order->execute([$user_id, $name, $number, $method, $address, $total_products, $total_price]);

      $delete_cart = $conn->prepare("DELETE FROM `cart` WHERE user_id = ?");
      $delete_cart->execute([$user_id]);
      
      if(! empty($name) && ! empty($number) && ! empty($address) )
       {

      $message[] = ' ! تمت إجراء الطلب بنجاح';
      }
      else{
         echo 'you must enter your informations!';
        
      }
   }
   else{
      $message[] = 'سلة التسوق الخاصة بك فارغة';
   }

}


?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>تاكيد الطلبيات</title>
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

<section class="checkout-orders">

   <form action="" method="POST">

   <h3>طلبياتك</h3>

      <div class="display-orders">
      <?php
         $grand_total = 0;
         $cart_items[] = '';
         $select_cart = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
         $select_cart->execute([$user_id]);
         if($select_cart->rowCount() > 0){
            while($fetch_cart = $select_cart->fetch(PDO::FETCH_ASSOC)){
               $cart_items[] = $fetch_cart['name'].' ('.$fetch_cart['price'].' x '. $fetch_cart['quantity'].' ,taille : '. $fetch_cart['size_selected'].' , couleur : '. $fetch_cart['colored'].')'.
               '    
                -  ';
               $total_products = implode($cart_items);
               $grand_total += ($fetch_cart['price'] * $fetch_cart['quantity']);
      ?>
         <p> <?= $fetch_cart['name']; ?> <span>(<?= $fetch_cart['price'].'   DA x '. $fetch_cart['quantity']; ?>)</span> , taille : <span><?= $fetch_cart['size_selected']; ?></span>   , couleur : <span><?= $fetch_cart['colored']; ?></span> </p>
      <?php
            }
         }else{
            echo '<p class="empty" >! سلة التسوق الخاصة بك فارغة  </p>';
         }
      ?>
         <input type="hidden" name="total_products" value="<?= $total_products; ?>">
         <input type="hidden" name="total_price" value="<?= $grand_total; ?>" value="">
         <div class="grand-total">المجموع الإجمالي : <span><?= $grand_total; ?>  DA</span></div>
      </div>

      <h3>قم بتقديم طلبياتك من فضلك</h3>

      <div class="flex">
         <div class="inputBox">
            <span>اسمك</span>
            <input type="text" name="name" placeholder="ادخل اسمك هنا من فضلك" class="box" maxlength="20" >
         </div>
         <div class="inputBox">
            <span>رقم الهاتف</span>
            <input type="tel" name="number" placeholder="ادخل رقم الهاتف" class="box" min="0" max="9999999999" onkeypress="if(this.value.length == 10) return false;" required>
         </div>

         <div class="inputBox">
            <span>طريقة الدفع</span>
            <select name="method" class="box" required>
               <option value="دفع عند الاستلام">الدفع عند الاستلام</option>
    
            </select>
         </div>
         <!-- <div class="inputBox">
            <span>address line 01 :</span>
            <input type="text" name="flat" placeholder="e.g. flat number" class="box" maxlength="50" required>
         </div> -->
         <div class="inputBox">
            <span>العنوان </span>
            <input type="text" name="street" placeholder="ادخل العنوان من فضلك " class="box" maxlength="100" >
         </div>
         <div class="inputBox">
            <span>البلدية</span>
            <input type="text" name="city" placeholder="مثال : زرالدة" class="box" maxlength="50" required>
         </div>
         <div class="inputBox">
            <span>الولاية</span>
            <input type="text" name="state" placeholder="الجزائر" class="box" maxlength="50" required>
         </div>

        
      </div>

      <input type="submit" name="order" class="btn <?= ($grand_total > 1)?'':'disabled'; ?>" value="انقر هنا لتأكيد الطلب">

   </form>

</section>













<?php include 'components/footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>