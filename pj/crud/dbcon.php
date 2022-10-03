<?php

  $con = mysqli_connect("localhost","root","","pj");

  if(!$con){
    die('Conection Failed'.mysqli_connect_error());
  }
