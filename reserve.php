<?php
  session_start();
  if(empty($_SESSION["id"])) {
      header("location: /login.php");
  }
  include "connection.php";
  $playgroundid = $_GET['id'];
  $userid = $_GET['user'];
  $time = $_GET['time'];

  $sql = "INSERT INTO `appointment`( `playground_id`, `user_id`, `date`, `start`) VALUES ($playgroundid, $userid, CURDATE(), $time)";
  if ($conn->query($sql) === TRUE) {
    header("location: appointments.php?id=$playgroundid");
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }