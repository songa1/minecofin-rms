<?php

include 'config.php';

session_start();

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

      if($row['user_type'] == 'admin'){

         $_SESSION['admin_name'] = $row['name'];
         header('location:home.php');

      }elseif($row['user_type'] == 'Financial'){

         $_SESSION['user_name'] = $row['name'];
         header('location:financial.php');

      }
     elseif($row['user_type'] == 'HR'){

         $_SESSION['user_name'] = $row['name'];
         header('location:hr.php');

      }
     
      
   }else{
      $error[] = 'incorrect email or password!';
      header('location:login_form.php');
   }

};
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login - MINECOFIN RMS</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/custom.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post">
      <h3 style="color:#f17a71;">Login now</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="email" name="email" required placeholder="Enter your email">
      <input type="password" name="password" required placeholder="Enter your password">
      <input type="submit" name="submit" value="Login" class="btn btn-success ">
      <p>You don't have an account? <a href="#" style="color:#f17a71;">Ask System Admin</a></p>
   </form>

</div>

</body>
</html>