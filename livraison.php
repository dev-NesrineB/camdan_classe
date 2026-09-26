<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
session_regenerate_id(true);

   $user_id = $_SESSION['user_id'];
}else{
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
   <title>ثمن التوصيل</title>
   <link
      rel="shortcut icon"
      href="images/Ca- (1).webp"
      type="image/x-icon"
    />
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href=".//css/style.css">
   <link rel="stylesheet" href=".//css/all.min.css">


</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<section class="livraison">
<table >
        <thead>
        <tr>
  <th>wilaya</th>
  <th>domicile</th>
  <th>bureau</th>


</tr>
        </thead>
        <tbody>

        <?php
      $select_livraison = $conn->prepare("SELECT * FROM `livraison`");
      $select_livraison->execute();
      if($select_livraison->rowCount() > 0){
         while($fetch_livraison = $select_livraison->fetch(PDO::FETCH_ASSOC)){ 
    ?>

            <tr>
            <td data-label="wilaya"><?= $fetch_livraison['wilaya']; ?></td>
            <td data-label="domicile"><?= $fetch_livraison['domicile']; ?> da</td>
            <td data-label="bureau"><?= $fetch_livraison['bureau']; ?>  da</td>

      
            </tr>

        <?php }
         }
   ?>

</tbody>
 
      </table>

</section>












<?php include 'components/footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>