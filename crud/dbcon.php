<?php

  $con = mysqli_connect("localhost","root","","crud");

  if(!$con){
    die('Conection Failed'.mysqli_connect_error());
  }

?>