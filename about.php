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
   <title>من نحن ?</title>
   <link
      rel="shortcut icon"
      href="images/Ca- (1).webp"
      type="image/x-icon"
    />
   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href=".//css/style.css">

</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<section class="about">
<h2> موقع المتجر </h2>

   <div class="row">

      <div class="image">

         <!-- <img src="images/about-img.svg" alt=""> -->
         <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d799.538766563256!2d2.8479670143668825!3d36.71883691039557!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x128fa34d13107fa7%3A0x61617eed2f84da4d!2sCamdan%20Class!5e0!3m2!1sfr!2sdz!4v1696358974202!5m2!1sfr!2sdz" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>

      <div class="content">
     
      <p>
          زوروا متجرنا "كامدان كلاس" المتواجد في زرالدة ! 
         <br>
          نعيش وننفَّس الأناقة والتميز في عالم الملابس والأحذية الرجالية. نحن نفتخر بتقديم تجربة تسوق فريدة، حيث يجتمع التصميم العصري مع الجودة والراحة.
         <br>
         تصميمات مميزة: اكتشف ملابسنا وأحذيتنا ذات التصميمات الفريدة التي تبرز أناقتك بشكل لا يُضاهى.
         <br>
         راحة لا مثيل لها: نحرص على توفير لك ليس فقط الأناقة بل والراحة التي تجعلك تشعر بالثقة في كل خطوة.
         <br>
         مجموعة واسعة: مهما كانت أذواقك واحتياجاتك، ستجد لدينا تشكيلة واسعة تلبي كل توقعاتك.
         </p>
         <a href=" https://wa.me/055802555" ><i class="fa-brands fa-whatsapp fa-shake"></i></a>
         <a href="https://www.facebook.com"><i class="fa-brands fa-facebook fa-beat-fade"></i></a>
         <a href="#"><i class="fa-brands fa-instagram fa-fade"></i></a>
      </div>

   </div>

</section>



<?php include 'components/footer.php'; ?>



<script src="js/script.js"></script>

</body>
</html>
