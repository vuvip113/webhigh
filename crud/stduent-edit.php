<?php
session_start();
require 'dbcon.php';
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Edit</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>
  <div class="container mt-5">

    <?php include('message.php');
    ?>

    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4>Student Edit
              <a href="index.php" class="btn btn-danger float-end">Back</a>
            </h4>
          </div>
          <div class="card-body">
            <?php
            if (isset($_GET['id'])) {
              $student_id = mysqli_real_escape_string($con, $_GET['id']);
              $query = "select * from students where id='$student_id'";
              $query_run = mysqli_query($con, $query);
              if (mysqli_num_rows($query_run) > 0) {
                $student = mysqli_fetch_array($query_run);
            ?>
                <form action="code.php" method="POST">
                  <input type="hidden" name="student_id" value="<?= $student['id']; ?>"> 

                  <div class="mb-3">
                    <label>Stdent Name</label>
                    <input type="text" name="name" value="<?= $student['name'] ?>" class="form-control">
                  </div>
                  <div class="mb-3">
                    <label>Stdent Email</label>
                    <input type="email" name="email" value="<?= $student['email'] ?>" class="form-control">
                  </div>
                  <div class="mb-3">
                    <label>Stdent Phone</label>
                    <input type="text" name="phone" value="<?= $student['phone'] ?>" class="form-control">
                  </div>
                  <div class="mb-3">
                    <label>Stdent Course</label>
                    <input type="text" name="course" value="<?= $student['course'] ?>" class="form-control">
                  </div>
                  <div class="mb-3">
                    <button type="submit" name="update_student" class="btn btn-primary">Update Student</button>
                  </div>

                </form>

            <?php
              } else {
                echo "<;h4>No found Id</h4>";
              }
            }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>