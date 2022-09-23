<?php
if (isset($_POST['submit']) && isset($_FILES['my_img'])) {
  include "conn.php";


  echo "<pre>";
  print_r($_FILES['my_img']);
  echo "</pre>";

  $img_name = $_FILES['my_img']['name'];
  $img_size = $_FILES['my_img']['size'];
  $tmp_name = $_FILES['my_img']['tmp_name'];
  $error = $_FILES['my_img']['error'];

  if ($error == 0) {
    if ($img_size > 105000) {
      $em = "file qua lon";
      header("Location: index.php?error=$em");
    } else {
      $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
      //echo($img_ex);//loai anh
      $img_ex_lc = strtolower($img_ex);

      $allowed_exs = array("jpg", "jpeg", "png", "gif");

      if (in_array($img_ex_lc, $allowed_exs)) {
        $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
        $img_upload_path = 'uploads/'.$new_img_name;
        move_uploaded_file($tmp_name,$img_upload_path);

        //sql
        $sql = "INSERT INTO img(img_url) VALUES('$new_img_name')";
        mysqli_query($conn, $sql);
        header("Location: view.php");
      } else {
        $em = "Day khong phai loai anh";
        header("Location: index.php?error=$em");
      }
    }
  } else {
    $em = "loi roi";
    header("Location: index.php?error=$em");
  }
} else {
  header("Location: index.php");
}
