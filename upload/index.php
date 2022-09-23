<!DOCTYPE html>
<html>
<head>
  <title>Upload Php</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <?php if (isset($_GET['error'])): ?>
    <p><?php echo $_GET['error']; ?></p>
  
  <?php endif ?>
  <form action="upload.php" method="POST" enctype="multipart/form-data">
    <input type="file" name="my_img">
    <input type="submit" name="submit" value="Upload">
  </form>
  
</body>
</html>