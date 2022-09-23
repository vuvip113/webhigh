<?php
include "conn.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View IMG
  </title>
  <style>
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      flex-wrap: wrap;
      min-width: 100vh;
    }
    .alb{
      width: 200px;
      height: 200px;
      padding: 5px;
    }
    .alb img{
      height: 100%;
      width: 100%;
    }
    a{
      text-decoration: none;
      color: black;
    }
  </style>
</head>

<body>
  <a href="index.php">&#8592;</a>
  <?php
  $sql = "Select * from img order by id desc";
  $res = mysqli_query($conn, $sql);

  if (mysqli_num_rows($res) > 0) {
    while ($img = mysqli_fetch_assoc($res)) { ?>
      <div class="alb">
        <img src="uploads/<?= $img['img_url'] ?>" </div>
    <?php  }
  } ?>
</body>

</html>