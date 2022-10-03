<?php
@include 'config.php';
session_start();
if (isset($_POST['submit'])) {

   $name = mysqli_real_escape_string($conn, $_POST['name']); //name cua name text 35
   $pass = ($_POST['password']);

   $select = " select * from user_form where name='$name' && password='$pass' ";

   $result = mysqli_query($conn, $select);

   if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_array($result);

      if ($row['user_type'] == '1') {
         $_SESSION['admin_name'] = $row['name'];
         header('location: admin_page.php');
      } elseif ($row['user_type'] == '0') {
         $_SESSION['user_name'] = $row['name'];
         header('location: user_page.php');
      }
   } else {
      $error[] = 'Inconrrect use id or password!';
   }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login</title>

   <link rel="stylesheet" href="css/style.css">
   <script src="https://kit.fontawesome.com/99d6e20f38.js" crossorigin="anonymous"></script>
</head>

<body>
   <div class="form-container">
      <form action="" method="post">
         <h3>Login</h3>
         <?php
         if (isset($error)) {
            foreach ($error as $error) {
               echo '<span class="error-msg">' . $error . '</span>';
            };
         };
         ?>
         <div class="lol">
            <i class="fa-solid fa-user" style="padding: 15px 15px; margin: 8px 0;background-color: #eee;"></i>
            <input type="text" name="name" required placeholder="Enter your user id">
         </div>
         <div>
            <input type="password" name="password" required placeholder="Enter your password">
         </div>
         <input type="submit" value="login now" class="form-btn" name="submit">
         <p>Don't have an account? <a href="register_form.php">Register now</a></p>
      </form>
   </div>
</body>

</html>