<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
session_regenerate_id(true);

   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>طلباتي</title>
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

<section class="orders">

   <h1 class="heading">الطلبات المقدمة</h1>

   <div class="box-container">

   <?php
      if($user_id == ''){

         $select_orders = $conn->prepare("SELECT * FROM `orders` WHERE user_id = ?");
         $select_orders->execute([$user_id]);
         if($select_orders->rowCount() > 0){
            while($fetch_orders = $select_orders->fetch(PDO::FETCH_ASSOC)){
   ?>
   <div class="box">
      <p>تم تقديم الطلب  يوم : <span><?= $fetch_orders['placed_on']; ?></span></p>
      <p>الاسم : <span><?= $fetch_orders['name']; ?></span></p>

      <p>رقم الهاتف : <span><?= $fetch_orders['number']; ?></span></p>
      <p>العنوان : <span><?= $fetch_orders['address']; ?></span></p>
      <p>طريقة الدفع: <span><?= $fetch_orders['method']; ?></span></p>
      <p>طلبياتك :
         <br> <span><?= $fetch_orders['total_products']; ?></span></p>
      <p> <span><?= $fetch_orders['total_price']; ?>   دج</span>  : السعر الإجمالي </p>
      <p> حالة الدفع : <span style="color:<?php if($fetch_orders['payment_status'] == 'en_attente'){ echo 'red'; }else{ echo 'green'; }; ?>"><?= $fetch_orders['payment_status']; ?></span> </p>
   </div>
   <?php
      }
      }else{
         echo '<p class="empty">لم يتم تقديم أي طلبات بعد</p>';
      }
      }
   ?>

   </div>

</section>













<?php include 'components/footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>