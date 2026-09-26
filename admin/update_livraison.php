<?php

include '../components/connect.php';

session_start();
session_regenerate_id();

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
   header('location:admin_login.php');
}

if (isset($_POST['update'])) {
    $pid = $_POST['pid'];
    $wilaya = $_POST['wilaya'];
    $wilaya = filter_var($wilaya, FILTER_SANITIZE_STRING);
    $domicile = $_POST['domicile'];
    $domicile = filter_var($domicile, FILTER_SANITIZE_STRING);
    $bureau = $_POST['bureau'];
    $bureau = filter_var($bureau, FILTER_SANITIZE_STRING);
    $update_livraison = $conn->prepare("UPDATE `livraison` SET wilaya = ?,domicile= ?, bureau = ?  WHERE id = ?");
    $update_livraison->execute([ $wilaya, $domicile, $bureau, $pid]);
 
    $message[] = 'تم تحديث المنتج بنجاح';
}
?>
<!DOCTYPE html>
<html lang="ar">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>تحديث التوصيلات</title>
   <link
      rel="shortcut icon"
      href="../images/Ca- (1).webp"
      type="image/x-icon"
    />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link rel="stylesheet" href="../css/all.min.css">

   <link rel="stylesheet" href="../css/admin_style.css">


</head>
<body>

<?php include '../components/admin_header.php'; ?>

<section class="form-container">
<?php
      $update_id = $_GET['update'];
      $select_livraison = $conn->prepare("SELECT * FROM `livraison` WHERE id = ?");
      $select_livraison->execute([$update_id]);
      if ($select_livraison->rowCount() > 0) {
         while ($fetch_livraison = $select_livraison->fetch(PDO::FETCH_ASSOC)) {
      ?>
   <form action="" method="post" enctype="multipart/form-data">
      <h3>livraison</h3>
      <input type="hidden" name="pid" value="<?= $fetch_livraison['id']; ?>">

      <input type="text" name="wilaya" required placeholder="ادخل الاسم" maxlength="100"  class="box" value="<?= $fetch_livraison['wilaya']; ?>">
      
      
      
      <input type="number" min="0" required max="9999999999"  placeholder="domicile" class="box"  onkeypress="if(this.value.length == 10) return false;" name="domicile" value="<?= $fetch_livraison['domicile']; ?>">
      <input type="number" min="0" required max="9999999999"  placeholder="bureau" class="box"  onkeypress="if(this.value.length == 10) return false;" name="bureau" value="<?= $fetch_livraison['bureau']; ?>">
      <input type="submit" name="update" class="btn" value="تحديث">

   </form>
   <?php
         }
      } else {
         echo '<p class="empty"> ! لم يتم العثور على تكاليف الشحن</p>';
      }
      ?>

</section>
<script src="../js/admin_script.js"></script>
   
   </body>
   </html>
   
   