<?php

include '../components/connect.php';


session_start();


$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
   header('location:admin_login.php');
};

if (isset($_POST['add_product'])) {

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $slug = $_POST['slug'];
   $slug = filter_var($slug, FILTER_SANITIZE_STRING);
   $price = $_POST['price'];
   $price = filter_var($price, FILTER_SANITIZE_STRING);
   $details = $_POST['details'];
   $details = filter_var($details, FILTER_SANITIZE_STRING);

   $image_01 = $_FILES['image_01']['name'];
   $image_01 = filter_var($image_01, FILTER_SANITIZE_STRING);
   $image_size_01 = $_FILES['image_01']['size'];
   $image_tmp_name_01 = $_FILES['image_01']['tmp_name'];
$exe_n_t_ion_1 = pathinfo($image_01 , PATHINFO_EXTENSION);
$rand_omn = rand(0,100000);
$rename_1='Upload'. date('Ymd').$rand_omn;
$new_name01= $rename_1. '.' .$exe_n_t_ion_1;
$image_folder_01 = '../uploaded_img/' .$new_name01;




   $image_02 = $_FILES['image_02']['name'];
   $image_02 = filter_var($image_02, FILTER_SANITIZE_STRING);
   $image_size_02 = $_FILES['image_02']['size'];
   $image_tmp_name_02 = $_FILES['image_02']['tmp_name'];
   $exe_n_t_ion_2 = pathinfo($image_02 , PATHINFO_EXTENSION);
$rand_omn = rand(0,100000);
$rename_2='Upload'. date('Ymd').$rand_omn;
$new_name02= $rename_2. '.' .$exe_n_t_ion_2;
$image_folder_02 = '../uploaded_img/' .$new_name02;



   $image_03 = $_FILES['image_03']['name'];
   $image_03 = filter_var($image_03, FILTER_SANITIZE_STRING);
   $image_size_03 = $_FILES['image_03']['size'];
   $image_tmp_name_03 = $_FILES['image_03']['tmp_name'];
   $exe_n_t_ion_3 = pathinfo($image_03 , PATHINFO_EXTENSION);
   $rand_omn = rand(0,100000);
   $rename_3='Upload'. date('Ymd').$rand_omn;
   $new_name03= $rename_3. '.' .$exe_n_t_ion_3;
   $image_folder_03 = '../uploaded_img/' .$new_name03;


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




   $select_products = $conn->prepare("SELECT * FROM `products` WHERE name = ?");
   $select_products->execute([$name]);

   if ($select_products->rowCount() > 0) {
      $message[] = '! اسم المنتج موجود بالفعل ❌';
   } else {


      $insert_products = $conn->prepare("INSERT INTO `products`(slug, name ,  details, price, image_01, image_02, image_03 , size1 ,size2,size3 ,size4 ,size5 ,size6, color1,color2, color3, color4,color5,color6,color7,color8,color9,color10,color11,color12) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");


      $insert_products->execute([
         $slug, $name, $details, $price, $new_name01, $new_name02, $new_name03, $size1, $size2, $size3, $size4, $size5, $size6, $color1, $color2, $color3,
         $color4, $color5, $color6, $color7, $color8, $color9, $color10, $color11, $color12
      ]);

      if ($insert_products) {
         if ($image_size_01 > 2000000 or $image_size_02 > 2000000 or $image_size_03 > 2000000) {
            $message[] = 'image size is too large!❌';
         } else {
            move_uploaded_file($image_tmp_name_01, $image_folder_01);
            move_uploaded_file($image_tmp_name_02, $image_folder_02);
            move_uploaded_file($image_tmp_name_03, $image_folder_03);
            $message[] = 'لقد تم اضافة المنتج بنجاح!✅';
         }
      }
   }
};
if (isset($_GET['delete'])) {

   $delete_id = $_GET['delete'];
   $delete_product_image = $conn->prepare("SELECT * FROM `products` WHERE id = ?");
   $delete_product_image->execute([$delete_id]);
   $fetch_delete_image = $delete_product_image->fetch(PDO::FETCH_ASSOC);
   unlink('../uploaded_img/' . $fetch_delete_image['image_01']);
   unlink('../uploaded_img/' . $fetch_delete_image['image_02']);
   unlink('../uploaded_img/' . $fetch_delete_image['image_03']);
   $delete_product = $conn->prepare("DELETE FROM `products` WHERE id = ?");
   $delete_product->execute([$delete_id]);
   $delete_cart = $conn->prepare("DELETE FROM `cart` WHERE pid = ?");
   $delete_cart->execute([$delete_id]);
   $delete_wishlist = $conn->prepare("DELETE FROM `wishlist` WHERE pid = ?");
   $delete_wishlist->execute([$delete_id]);
   header('location:products.php');
}




?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>اضافة منتج</title>
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

   <section class="add-products">

      <h1 class="heading">اضف منتجا جديدا</h1>

      <form action="" method="post" enctype="multipart/form-data">
         <div class="flex">


            <div class="inputBox">
            <span>اسم المنتج</span>

               <input type="text" class="box" required maxlength="100" placeholder="أدخل اسم المنتج" name="name">
            </div>
            <div class="inputBox">
            <span> الفئة</span>
               
               <!-- <input type="text" class="box" required maxlength="100" placeholder="enter product categorie" name="slug"> -->
               <select name="slug" class="slug" required>
                  <option>اختر الفئة</option>
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
            </div>
            <div class="inputBox">
            <span> سعر المنتج</span>

               <input type="number" min="0" class="box" required max="9999999999" placeholder="ادخل سعر المنتج" onkeypress="if(this.value.length == 10) return false;" name="price">
            </div>
            <div class="inputBox">
             
               <span>الصورة الأولى للمنتج</span>

               <input type="file" name="image_01" accept="image/jpg, image/jpeg, image/png, image/webp" class="box" required>
            </div>
            <div class="inputBox">
            <span> الصورة الثانية للمنتج</span>

               <input type="file" name="image_02" accept="image/jpg, image/jpeg, image/png, image/webp" class="box" required>
            </div>
            <div class="inputBox">
            <span> الصورة الثالثة للمنتج</span>

               <input type="file" name="image_03" accept="image/jpg, image/jpeg, image/png, image/webp" class="box" required>
            </div>




            <div class="inputBox">
            <span>المقاسات </span>
               <input type="text" class="size" placeholder="مقاس" name="size1">

               <input type="text" class="size" placeholder="مقاس" name="size2">

               <input type="text" class="size" placeholder="مقاس" name="size3">

               <input type="text" class="size" placeholder="مقاس" name="size4">

               <input type="text" class="size" placeholder="مقاس" name="size5">

               <input type="text" class="size" placeholder="مقاس" name="size6">
            </div>

            <div class="inputBox">
            <span>الالوان</span>

               <input type="text" class="color"  placeholder="اللون"  name="color1">
               <input type="text" class="color"  placeholder="اللون"  name="color2">
               <input type="text" class="color"  placeholder="اللون"  name="color3">
               <input type="text" class="color"  placeholder="اللون"  name="color4">
               <input type="text" class="color"  placeholder="اللون"  name="color5">
               <input type="text" class="color"  placeholder="اللون"  name="color6">
               <input type="text" class="color"  placeholder="اللون"  name="color7">
               <input type="text" class="color"  placeholder="اللون"  name="color8">
               <input type="text" class="color"  placeholder="اللون"  name="color9">
               <input type="text" class="color"  placeholder="اللون"  name="color10">
               <input type="text" class="color"  placeholder="اللون"  name="color11">
               <input type="text" class="color"  placeholder="اللون"  name="color12">

            </div>



            <div class="inputBox">
               <span>تفاصيل عن المنتج </span>
               <textarea name="details" placeholder="ادخل تفاصيل عن المنتج" class="box" maxlength="800" cols="30" rows="10"></textarea>
            </div>

         </div>



         <input type="submit" value="اضافة" class="btn" name="add_product">
      </form>

   </section>







   <script src="../js/admin_script.js"></script>

</body>

</html>