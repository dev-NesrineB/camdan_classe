<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
session_regenerate_id(true);

   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

if(isset($_POST['send'])){

   $msg = $_POST['msg'];
   $msg = filter_var($msg, FILTER_SANITIZE_STRING);

   $select_message = $conn->prepare("SELECT * FROM `messages` WHERE  message = ?");
   $select_message->execute([$msg]);

   if($select_message->rowCount() > 0){
      $message[] = 'already sent message!';
   }else{

      $insert_message = $conn->prepare("INSERT INTO `messages`(user_id,  message) VALUES(?,?)");
      $insert_message->execute([$user_id, $msg]);

      $message[] = 'تم ارسال الرسالة ✅';

   }

}


?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>تواصل معنا</title>
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

<section class="contact">

   <form action="" method="post">
      <h3>تواصل معنا</h3>
      <!-- <input type="text" name="name" placeholder="أدخل اسم" required maxlength="20" class="box"> -->
      <!-- <input type="email" name="email" placeholder="enter your email" required maxlength="50" class="box"> -->
      <!-- <input type="number" name="number" min="0" max="9999999999" placeholder="enter your number" required onkeypress="if(this.value.length == 10) return false;" class="box"> -->
      <textarea name="msg" class="box" placeholder="أدخل رسالتك" cols="30" rows="10"></textarea>
      <input type="submit" value="إرسال رسالة" name="send" class="btn">
   </form>

</section>


<?php include 'components/footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>

