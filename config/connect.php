<?php
  // connect to database
  $conn = mysqli_connect('localhost', 'shaun', 'test1234', 'project');

  // check connection
  if(!$conn){
    echo 'Connection error: ' .mysqli_connect_error();
  }
 ?>
