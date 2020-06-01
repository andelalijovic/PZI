<?php 
  session_start();
  if(empty($_SESSION["id"])) {
      header("location: /login.php");
  }
  include "connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles/bootstrap.min.css">
    <link rel="stylesheet" href="styles/style.css">
  <title>Appointments</title>
</head>
<body>
  <?php include("templates/header.php") ?>
  <div class="cont">
  <?php 
    $id = $_GET['id'];
    $userid = $_SESSION["id"];
    $reserved = array();
    $sql = "SELECT *
            FROM appointment 
            WHERE DATE(date) = CURDATE() AND playground_id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        array_push($reserved, $row["start"]);
      }
    }
    echo "<h3>Appointments for ". date('Y/m/d') . "</h3>";
    for ($i = 0; $i < 24; $i++) {
      if(in_array($i, $reserved)){
        echo "<div class='time-field reserved'>";
        echo "$i:00
            </div>";
      } else {
        echo "<div class='time-field not-reserved'>";
        echo "$i:00
            <a href='reserve.php?id=$id&user=$userid&time=$i' class='btn btn-sm btn-primary float-right'>Reserve</a>
            </div>";
      }
    } 
  ?>
  </div>
</body>
</html>
