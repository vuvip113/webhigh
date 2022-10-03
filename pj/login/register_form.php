<?php
@include 'config.php';
if (isset($_POST['submit'])) {

   $name = mysqli_real_escape_string($conn, $_POST['name']); //name cua name text 35
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = ($_POST['password']);
   $cpass = ($_POST['cpassword']);

   $select = " select * from user_form where email='$email' && password='$pass' ";

   $result = mysqli_query($conn, $select);

   if (mysqli_num_rows($result) > 0) {

      $error[] = 'User already exist!';
   } else {
      if ($pass != $cpass) {
         $error[] = 'Password not matched!';
      } else {
         $insert = "insert into user_form(name, email, password) values('$name','$email','$pass')";
         mysqli_query($conn, $insert);
         header('location: login_form.php');
      }
   }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Register</title>

   <link rel="stylesheet" href="css/style.css">

</head>

<body>
   <div class="form-container">
      <form action="" method="post">
         <h3>Register</h3>
         <?php
         if (isset($error)) {
            foreach ($error as $error) {
               echo '<span class="error-msg">' . $error . '</span>';
            };
         };
         ?>
         <input type="text" name="name" required placeholder="Enter your user id">
         <input type="email" name="email" required placeholder="Enter your email">
         <input type="password" name="password" required placeholder="Enter your password">
         <input type="password" name="cpassword" required placeholder="Confirm your password">
         <input type="submit" value="register now" class="form-btn" name="submit">
         <p>already have an account? <a href="login_form.php">Login</a></p>
      </form>
   </div>
</body>

</html>