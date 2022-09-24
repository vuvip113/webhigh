<?php
  session_start();
  require 'dbcon.php';

  if(isset($_POST['delete_student'])){
    $student_id = mysqli_real_escape_string($con, $_POST['delete_student']);

    $query= "delete from students where id='$student_id'";
    $query_run = mysqli_query($con,$query);

    if($query_run){
      $_SESSION['message']="Student Deleted Seccessfully";
      header("Location: index.php");
      exit(0);
    }else{
      $_SESSION['message']="Student NOT DELETED";
      header("Location: index.php");
      exit(0);
    }

  }

  if(isset($_POST['update_student'])){
    $student_id = mysqli_real_escape_string($con, $_POST['student_id']);

    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $course = mysqli_real_escape_string($con, $_POST['course']);

    $query = "update students set name='$name', email='$email',phone='$phone',course='$course' where id='$student_id'";
    $query_run = mysqli_query($con,$query);

    if($query_run){
      $_SESSION['message']="Student Update Seccessfully";
      header("Location: index.php");
      exit(0);
    }else{
      $_SESSION['message']="Student NOT updated";
      header("Location: index.php");
      exit(0);
    }
  }

  if(isset($_POST['save_student'])){
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $course = mysqli_real_escape_string($con, $_POST['course']);

    $query = "insert into students (name,email,phone,course) values 
      ('$name','$email','$phone','$course')";

    $query_run = mysqli_query($con,$query);
    if($query_run){
      $_SESSION['message']="Student Created Seccessfully";
      header("Location: student-creater.php");
      exit(0);
    }else{
      $_SESSION['message']="Student NOT Created";
      header("Location: stduent-creater.php");
      exit(0);
    }

  }


?>