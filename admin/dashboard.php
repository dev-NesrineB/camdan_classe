<?php

include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:admin_login.php');
   die;
}

?>

<!DOCTYPE html>
<html lang="ar">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>لوحةالتحكم</title>
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

<section class="dashboard">

   <h1 class="heading">لوحة التحكم</h1>

   <div class="box-container">

      <div class="box">
         <h3>مرحبا !</h3>
         <p><?= $fetch_profile['name']; ?></p>
         <a href="update_profile.php" class="btn"> تحديث الملف الشخصي</a>
      </div>

      <div class="box">
         <?php
            $total_pendings = 0;
            $select_pendings = $conn->prepare("SELECT * FROM `orders` WHERE payment_status = ?");
            $select_pendings->execute(['قيد_الانتظار']);
            if($select_pendings->rowCount() > 0){
               while($fetch_pendings = $select_pendings->fetch(PDO::FETCH_ASSOC)){
                  $total_pendings += $fetch_pendings['total_price'];
               }
            }
         ?>
         <h3><?= $total_pendings; ?><span>da</span></h3>
         <p>إجمالي الطلبات المعلقة</p>
         <!-- <a href="placed_orders.php" class="btn"> طلبات الزبائن المعلقة</a> -->
      </div>

      <div class="box">
         <?php
            $total_completes = 0;
            $select_completes = $conn->prepare("SELECT * FROM `orders` WHERE payment_status = ?");
            $select_completes->execute(['مكتمل']);
            if($select_completes->rowCount() > 0){
               while($fetch_completes = $select_completes->fetch(PDO::FETCH_ASSOC)){
                  $total_completes += $fetch_completes['total_price'];
               }
            }
         ?>
         <h3><?= $total_completes; ?><span>da</span></h3>
         <p>إجمالي الطلبات المكتملة </p>
         <!-- <a href="placed_orders.php" class="btn">عرض الطلبات المكتملة</a> -->
      </div>

      <div class="box">
         <?php
            $select_orders = $conn->prepare("SELECT * FROM `orders`");
            $select_orders->execute();
            $number_of_orders = $select_orders->rowCount()
         ?>
         <h3><?= $number_of_orders; ?></h3>
         <p>طلبية مقدمة</p>
         <a href="placed_orders.php" class="btn">عرض الطلبات المقدمة</a>
      </div>

      <div class="box">
         <?php
            $select_products = $conn->prepare("SELECT * FROM `products`");
            $select_products->execute();
            $number_of_products = $select_products->rowCount()
         ?>
         <h3><?= $number_of_products; ?></h3>
         <p>منتجات مضافة</p>
         <a href="products.php" class="btn">اضف منتجا جديدا</a>
      </div>
      <div class="box">
         <?php
            $select_products = $conn->prepare("SELECT * FROM `products`");
            $select_products->execute();
            $number_of_products = $select_products->rowCount()
         ?>
         <h3><?= $number_of_products; ?></h3>
         <p>منتجات مضافة </p>
         <a href="products_added.php" class="btn">عرض المنتجات المضافة</a>
      </div>
      
     

  

      <div class="box">
         <?php
            $select_admins = $conn->prepare("SELECT * FROM `admins`");
            $select_admins->execute();
            $number_of_admins = $select_admins->rowCount()
         ?>
         <h3><?= $number_of_admins; ?></h3>
         <p>مستخدمي الإدارة</p>
         <a href="../hash/admin_accounts.php" class="btn">اطلع على المدراء</a>
      </div>

      <div class="box">
         <?php
            $select_messages = $conn->prepare("SELECT * FROM `messages`");
            $select_messages->execute();
            $number_of_messages = $select_messages->rowCount()
         ?>
         <h3><?= $number_of_messages; ?></h3>
         <p>رسائل جديدة</p>
         <a href="messages.php" class="btn">اطلع على الرسائل</a>
      </div>

      <div class="box">

         <p>livraison</p>
         <a href="livraison.php" class="btn">اثمان التوصيل</a>
      </div>

   </div>

</section>












<script src="../js/admin_script.js"></script>
   
</body>
</html>