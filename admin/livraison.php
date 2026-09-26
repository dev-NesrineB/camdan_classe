<?php

include '../components/connect.php';

session_start();
session_regenerate_id();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:admin_login.php');
}

if(isset($_POST['submit'])){

   $wilaya = $_POST['wilaya'];
   $wilaya = filter_var($wilaya, FILTER_SANITIZE_STRING);
   $domicile = $_POST['domicile'];
   $domicile = filter_var($domicile, FILTER_SANITIZE_STRING);
   $bureau = $_POST['bureau'];
   $bureau = filter_var($bureau, FILTER_SANITIZE_STRING);

   $select_wilaya = $conn->prepare("SELECT * FROM `livraison` WHERE wilaya = ?");
   $select_wilaya->execute([$wilaya]);

   if($select_wilaya->rowCount() > 0){
      $message[] = 'wilaya already exist!';

      }
      else{
         $insert_wilaya = $conn->prepare("INSERT INTO `livraison`(wilaya, domicile, bureau) VALUES(?,?,?)");
         $insert_wilaya->execute([$wilaya, $domicile, $bureau]);
         $message[] = 'تم تسجيل ولاية جديدة بنجاح!';
      }
   }

   if(isset($_GET['delete'])){

    $delete_id = $_GET['delete'];

    $delete_livraison = $conn->prepare("DELETE FROM `livraison` WHERE id = ?");
    $delete_livraison->execute([$delete_id]);

    header('location:livraison.php');
 }

?>
<!DOCTYPE html>
<html lang="ar">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>التوصيل</title>
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

<section class="livraison">

   <form action="" method="post">
      <h3>التوصيل</h3>
      <input type="text" name="wilaya" required placeholder="ادخل الولاية" maxlength="100"  class="box" >
      
      
      
      <input type="number" min="0" required max="9999999999"  placeholder="domicile" class="box"  onkeypress="if(this.value.length == 10) return false;" name="domicile">
      <input type="number" min="0" required max="9999999999"  placeholder="bureau" class="box"  onkeypress="if(this.value.length == 10) return false;" name="bureau">
      <input type="submit" value="حفظ" class="btn" name="submit">
   </form>

</section>


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
            <td>
         <a href="update_livraison.php?update=<?= $fetch_livraison['id']; ?>" class="option-btn">تحديث</a>

            </td>
            <td>
         <a href="livraison.php?delete=<?= $fetch_livraison['id']; ?>" class="delete-btn" onclick="return confirm('delete this wilaya?');">حفظ</a>

            </td>
        
      
            </tr>

        <?php }
         }
   ?>

</tbody>
 
      </table>
      <script src="../js/admin_script.js"></script>
   
</body>
</html>

