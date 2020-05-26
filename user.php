<?php
  include "connection.php";
  if($_GET["action"] == "update"){
    $type = $_GET["type"];
    $id = (int)$_GET["id"];
    $sql = "UPDATE user SET type='$type' WHERE id=$id";
  } elseif ($_GET["action"] == "delete"){
    $id = (int)$_GET["id"];
    $sql = "DELETE FROM user WHERE id=$id";
  }
  $result = $conn->query($sql);
    if ($result === TRUE) {
      header("location: /profile.php");
    } else {
      echo "Error updating record: " . $result->error;
    }
  
