<?php
session_start();
require 'dbcon.php';

if (isset($_POST['delete_student'])) {
  $student_id = mysqli_real_escape_string($con, $_POST['delete_student']);

  $query = "delete from user_form where id='$student_id'";
  $query_run = mysqli_query($con, $query);

  if ($query_run) {
    $_SESSION['message'] = "Deleted Seccessfully";
    header("Location: ../login/admin_page.php");
    exit(0);
  } else {
    $_SESSION['message'] = "NOT DELETED";
    header("Location: ../login/admin_page.php");
    exit(0);
  }
}

if (isset($_POST['update_student'])) {
  $student_id = mysqli_real_escape_string($con, $_POST['student_id']);

  $name = mysqli_real_escape_string($con, $_POST['name']);
  $email = mysqli_real_escape_string($con, $_POST['email']);
  $password = mysqli_real_escape_string($con, $_POST['password']);
  $user_type = mysqli_real_escape_string($con, $_POST['user_type']);

  $query = "update user_form set name='$name', email='$email',password='$password',user_type='$user_type' where id='$student_id'";
  $query_run = mysqli_query($con, $query);

  if ($query_run) {
    $_SESSION['message'] = "Student Update Seccessfully";
    header("Location: ../login/admin_page.php");
    exit(0);
  } else {
    $_SESSION['message'] = "Student NOT updated";
    header("Location: index.php");
    exit(0);
  }
}

if (isset($_POST['save_student'])) {
  $student_id = mysqli_real_escape_string($con, $_POST['student_id']);


  $name = mysqli_real_escape_string($con, $_POST['name']);
  $email = mysqli_real_escape_string($con, $_POST['email']);
  $phone = mysqli_real_escape_string($con, $_POST['phone']);
  $course = mysqli_real_escape_string($con, $_POST['course']);

  $query = "insert into students (name,email,phone,course) values 
      ('$name','$email','$phone','$course')";

  $query_run = mysqli_query($con, $query);
  if ($query_run) {
    $last_id = mysqli_insert_id($con);
    $_SESSION['message'] = "Student Created Seccessfully. Last ID add: $last_id";
    header("Location: student-creater.php");
    exit(0);
  } else {
    $_SESSION['message'] = "Student NOT Created";
    header("Location: stduent-creater.php");
    exit(0);
  }
}
