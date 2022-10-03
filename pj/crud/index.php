<?php
// session_start();
require 'dbcon.php';
?>

<?php include('includes/header.php'); ?>

<div class="container mt-4">

  <?php include('message.php'); ?>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4>Quan Ly Khach Hang
            <a href="student-creater.php" class="btn btn-primary float-end">Them moi khach hang</a>
          </h4>
          <div class="card-body">
            <table class="table tavle-bordered table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Pass</th>
                  <th>UserType</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $query = "select * from user_form";
                $query_run = mysqli_query($con, $query);
                if (mysqli_num_rows($query_run) > 0) {
                  foreach ($query_run as $student) {
                    //echo $student['name'];
                ?>
                    <tr>
                      <td><?= $student['id']; ?></td>
                      <td><?= $student['name']; ?></td>
                      <td><?= $student['email']; ?></td>
                      <td><?= $student['password']; ?></td>
                      <td><?= $student['user_type']; ?></td>
                      <td>
                        <a href="../crud/student-view.php?id=<?= $student['id'] ?>"" class=" btn btn-info btn-sm">View</a>
                        <a href="../crud/stduent-edit.php?id=<?= $student['id'] ?>" class="btn btn-success btn-sm">Edit</a>
                        <form action="../crud/code.php" method="POST" class="d-inline">
                          <button type="submit" name="delete_student" value="<?= $student['id']; ?>" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                      </td>
                    </tr>
                <?php
                  }
                } else {
                  echo "<h5> No Record Found <h5>";
                }
                ?>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include('includes/footer.php'); ?>