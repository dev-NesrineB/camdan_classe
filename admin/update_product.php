<?php

include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
   header('location:admin_login.php');
}

if (isset($_POST['update'])) {

   $pid = $_POST['pid'];
   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $slug = $_POST['slug'];
   $slug = filter_var($slug, FILTER_SANITIZE_STRING);
   $price = $_POST['price'];
   $price = filter_var($price, FILTER_SANITIZE_STRING);
   $details = $_POST['details'];
   $details = filter_var($details, FILTER_SANITIZE_STRING);
   $size1 = $_POST['size1'];
   $size1 = filter_var($size1, FILTER_SANITIZE_STRING);
   $size2 = $_POST['size2'];
   $size2 = filter_var($size2, FILTER_SANITIZE_STRING);
   $size3 = $_POST['size3'];
   $size3 = filter_var($size3, FILTER_SANITIZE_STRING);
   $size4 = $_POST['size4'];
   $size4 = filter_var($size4, FILTER_SANITIZE_STRING);
   $size5 = $_POST['size5'];
   $size5 = filter_var($size5, FILTER_SANITIZE_STRING);
   $size6 = $_POST['size6'];
   $size6 = filter_var($size6, FILTER_SANITIZE_STRING);


   $color1 = $_POST['color1'];
   $color1 = filter_var($color1, FILTER_SANITIZE_STRING);

   $color2 = $_POST['color2'];
   $color2 = filter_var($color2, FILTER_SANITIZE_STRING);

   $color3 = $_POST['color3'];
   $color3 = filter_var($color3, FILTER_SANITIZE_STRING);

   $color4 = $_POST['color4'];
   $color4 = filter_var($color4, FILTER_SANITIZE_STRING);

   $color5 = $_POST['color5'];
   $color5 = filter_var($color5, FILTER_SANITIZE_STRING);

   $color6 = $_POST['color6'];
   $color6 = filter_var($color6, FILTER_SANITIZE_STRING);

   $color7 = $_POST['color7'];
   $color7 = filter_var($color7, FILTER_SANITIZE_STRING);

   $color8 = $_POST['color8'];
   $color8 = filter_var($color8, FILTER_SANITIZE_STRING);

   $color9 = $_POST['color9'];
   $color9 = filter_var($color9, FILTER_SANITIZE_STRING);

   $color10 = $_POST['color10'];
   $color10 = filter_var($color10, FILTER_SANITIZE_STRING);

   $color11 = $_POST['color11'];
   $color11 = filter_var($color11, FILTER_SANITIZE_STRING);

   $color12 = $_POST['color12'];
   $color12 = filter_var($color12, FILTER_SANITIZE_STRING);


   $update_product = $conn->prepare("UPDATE `products` SET name = ?,slug= ?, price = ?, details = ?, size1=? , size2 =?,size3 = ? ,size4 =?,size5 =? ,size6 =? ,
   color1= ?,color2= ?, color3= ?, color4= ?,color5= ?,color6= ?,color7= ?,color8= ?,color9= ?,color10= ?,color11= ?,color12= ? WHERE id = ?");
   $update_product->execute([ $name, $slug, $price, $details, $size1, $size2, $size3, $size4, $size5, $size6, $color1, $color2, $color3,
      $color4, $color5, $color6, $color7, $color8, $color9, $color10, $color11, $color12, $pid]);

   $message[] = 'تم تحديث المنتج بنجاح';

   $old_image_01 = $_POST['old_image_01'];
   $image_01 = $_FILES['image_01']['name'];
   $image_01 = filter_var($image_01, FILTER_SANITIZE_STRING);
   $image_size_01 = $_FILES['image_01']['size'];
   $image_tmp_name_01 = $_FILES['image_01']['tmp_name'];
   $exe_n_t_ion_1 = pathinfo($image_01 , PATHINFO_EXTENSION);
   $rand_omn = rand(0,100000000);
   $rename_1='Upload'. date('Ymd').$rand_omn;
   $new_name01= $rename_1. '.' .$exe_n_t_ion_1;
   $image_folder_01 = '../uploaded_img/' .$new_name01;


   if (!empty($image_01)) {
      if ($image_size_01 > 2000000) {
         $message[] = 'image size is too large!';

      } else {
         $update_image_01 = $conn->prepare("UPDATE `products` SET image_01 = ? WHERE id = ?");
         $update_image_01->execute([$new_name01, $pid]);
         move_uploaded_file($image_tmp_name_01, $image_folder_01);

         if($old_image_01 != '') {
         $image_with_path = '../uploaded_img/'. $old_image_01;

         if(file_exists($image_with_path)){
            unlink('../uploaded_img/' . $old_image_01);
          
         }

                }
                $message[] = 'image 01 updated successfully!'; 
         
       
      }
   }

   $old_image_02 = $_POST['old_image_02'];
   $image_02 = $_FILES['image_02']['name'];
   $image_02 = filter_var($image_02, FILTER_SANITIZE_STRING);
   $image_size_02 = $_FILES['image_02']['size'];
   $image_tmp_name_02 = $_FILES['image_02']['tmp_name'];
   $exe_n_t_ion_2 = pathinfo($image_02 , PATHINFO_EXTENSION);
   $rand_omn = rand(0,100000000);
   $rename_2='Upload'. date('Ymd').$rand_omn;
   $new_name02= $rename_2. '.' .$exe_n_t_ion_2;
   $image_folder_02 = '../uploaded_img/' .$new_name02;

   if (!empty($image_02)) {
      if ($image_size_02 > 2000000) {
         $message[] = 'image size is too large!';
      } else { 
         $update_image_02 = $conn->prepare("UPDATE `products` SET image_02 = ? WHERE id = ?");
         $update_image_02->execute([$new_name02, $pid]);
         move_uploaded_file($image_tmp_name_02, $image_folder_02);

         if($old_image_02 != '') {
            $image_with_path = '../uploaded_img/'. $old_image_02;
   
            if(file_exists($image_with_path)){
               unlink('../uploaded_img/' . $old_image_02);
            }
   
                   }
         $message[] = 'image 02 updated successfully!';

    
      }
   }

   $old_image_03 = $_POST['old_image_03'];
   $image_03 = $_FILES['image_03']['name'];
   $image_03 = filter_var($image_03, FILTER_SANITIZE_STRING);
   $image_size_03 = $_FILES['image_03']['size'];
   $image_tmp_name_03 = $_FILES['image_03']['tmp_name'];
   $exe_n_t_ion_3 = pathinfo($image_03 , PATHINFO_EXTENSION);
   $rand_omn = rand(0,100000000);
   $rename_3='Upload'. date('Ymd').$rand_omn;
   $new_name03= $rename_3. '.' .$exe_n_t_ion_3;
   $image_folder_03 = '../uploaded_img/' .$new_name03;

   if (!empty($image_03)) {
      if ($image_size_03 > 2000000) {
         $message[] = 'image size is too large!';
      } else {
         $update_image_03 = $conn->prepare("UPDATE `products` SET image_03 = ? WHERE id = ?");
         $update_image_03->execute([$new_name03, $pid]);
         move_uploaded_file($image_tmp_name_03, $image_folder_03);

         if($old_image_03 != '') {
            $image_with_path = '../uploaded_img/'. $old_image_03;
               $message[] = 'image 03 updated successfully!';

   
            if(file_exists($image_with_path)){
          
               unlink('../uploaded_img/' . $old_image_03);
            }
   
                   } 
               $message[] = 'image 03 updated successfully!';

      }
   }
}

?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>تحديث المنتج</title>
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

   <section class="update-product">

      <h1 class="heading">تحديث المنتج</h1>

      <?php
      $update_id = $_GET['update'];
      $select_products = $conn->prepare("SELECT * FROM `products` WHERE id = ?");
      $select_products->execute([$update_id]);
      if ($select_products->rowCount() > 0) {
         while ($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)) {
      ?>
            <form action="" method="post" enctype="multipart/form-data">
               <input type="hidden" name="pid" value="<?= $fetch_products['id']; ?>">
               <input type="hidden" name="old_image_01"  value="<?= $fetch_products['image_01']; ?>" >
               <input type="hidden" name="old_image_02"  value="<?= $fetch_products['image_02']; ?>">
               <input type="hidden" name="old_image_03"  value="<?= $fetch_products['image_03']; ?>">
               <div class="image-container">
                  <div class="main-image">
                     <img src="../uploaded_img/<?= $fetch_products['image_01']; ?>" alt="">
                  </div>
                  <div class="sub-image">
                     <img src="../uploaded_img/<?= $fetch_products['image_01']; ?>" alt="">
                     <img src="../uploaded_img/<?= $fetch_products['image_02']; ?>" alt="">
                     <img src="../uploaded_img/<?= $fetch_products['image_03']; ?>" alt="">
                  </div>
               </div>
               <span>تحديث الاسم</span>
               <input type="text" name="name" required class="box" maxlength="100" placeholder="أدخل اسم المنتج" value="<?= $fetch_products['name']; ?>">
               <span>تحديث الفئة</span>
               <select name="slug"  >
                  <option value="<?= $fetch_products['slug']; ?>">اختر الفئة</option>
                  <option>t-shirts</option>
                  <option>chemises</option>
                  <option>pantalons</option>
                  <option>pulls</option>
                  <option>vestes</option>
                  <option>jeans</option>
                  <option>casquette</option>
                  <option>chaussures</option>
                  <option>bascket</option>
                  <option>shorts</option>
                  <option>souvetement</option>
                  <option>ceintures</option>
                  <option>tenues</option>

               </select>
               <span>تحديث سعر المنتج</span>
               <input type="number" name="price" required class="box" min="0" max="9999999999" placeholder="ادخل سعر المنتج" onkeypress="if(this.value.length == 10) return false;" value="<?= $fetch_products['price']; ?>">
               <span>تحديث التفاصيل الخاصة بالمنتج</span>
               <textarea name="details" class="box"  cols="2000" rows="2000"><?= $fetch_products['details']; ?></textarea>
               <span>تحديث الصورة الأولى للمنتج</span>
               <input type="file" name="image_01" accept="image/jpg, image/jpeg, image/png, image/webp" class="box">
               <span>تحديث الصورة الثانية للمنتج</span>
               <input type="file" name="image_02" accept="image/jpg, image/jpeg, image/png, image/webp" class="box">
               <span>تحديث الصورة الثالثة للمنتج</span>
               <input type="file" name="image_03" accept="image/jpg, image/jpeg, image/png, image/webp" class="box">

               <span>المقاسات </span>
               <input type="text" class="size" placeholder="المقاس" name="size1" value="<?= $fetch_products['size1']; ?>">

               <input type="text" class="size" placeholder="المقاس" name="size2" value="<?= $fetch_products['size2']; ?>">

               <input type="text" class="size" placeholder="المقاس" name="size3" value="<?= $fetch_products['size3']; ?>">

               <input type="text" class="size" placeholder="المقاس" name="size4" value="<?= $fetch_products['size4']; ?>">

               <input type="text" class="size" placeholder="المقاس" name="size5" value="<?= $fetch_products['size5']; ?>">

               <input type="text" class="size" placeholder="المقاس" name="size6" value="<?= $fetch_products['size6']; ?>">

               
               <span>الالوان</span>

               <input type="text" class="color"  placeholder="اللون"  name="color1" value="<?= $fetch_products['color1']; ?>">
               <input type="text" class="color"  placeholder="اللون"  name="color2" value="<?= $fetch_products['color2']; ?>">
               <input type="text" class="color"  placeholder="اللون"  name="color3" value="<?= $fetch_products['color3']; ?>">
               <input type="text" class="color"  placeholder="اللون"  name="color4" value="<?= $fetch_products['color4']; ?>">
               <input type="text" class="color"  placeholder="اللون"  name="color5" value="<?= $fetch_products['color5']; ?>">
               <input type="text" class="color"  placeholder="اللون"  name="color6" value="<?= $fetch_products['color6']; ?>">
               <input type="text" class="color"  placeholder="اللون"  name="color7" value="<?= $fetch_products['color7']; ?>">
               <input type="text" class="color"  placeholder="اللون"  name="color8" value="<?= $fetch_products['color8']; ?>">
               <input type="text" class="color"  placeholder="اللون"  name="color9" value="<?= $fetch_products['color9']; ?>">
               <input type="text" class="color"  placeholder="اللون"  name="color10" value="<?= $fetch_products['color10']; ?>">
               <input type="text" class="color"  placeholder="اللون"  name="color11" value="<?= $fetch_products['color11']; ?>">
               <input type="text" class="color"  placeholder="اللون"  name="color12" value="<?= $fetch_products['color12']; ?>">

               <div class="flex-btn">
                  <input type="submit" name="update" class="btn" value="تحديث">
                  <a href="products_added.php" class="option-btn">عد الى صفحة المنتجات المضافة</a>
               </div>
            </form>

      <?php
         }
      } else {
         echo '<p class="empty"> ! لم يتم العثور على المنتج</p>';
      }
      ?>

   </section>












   <script src="../js/admin_script.js"></script>

</body>

</html>