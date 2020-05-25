<?php 
  session_start();
  include "connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles/bootstrap.min.css">
    <link rel="stylesheet" href="styles/style.css">
  <title>Playgrounds</title>
</head>
<body>
  <?php include("templates/header.php") ?>
  <div class="cont">
  <div class="row">
    <?php
      $sql = "SELECT playground.id, playground.address, sport.name AS sport_name
              FROM playground
              INNER JOIN sport ON playground.sport_id = sport.id; ";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          echo '<div class="col-sm-6">
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">' . $row["sport_name"] . '</h5>
                      <p class="card-text">Address: ' . $row["address"] . '.</p>';
          if(!empty($_SESSION["username"])) {
            echo      '<a href="/appointments.php?id='. $row["id"] .'" class="btn btn-primary">Reserve appointment</a>';
          }
          echo      '</div>
                  </div>
                </div>';
          }
        }
    ?>
    </div>
  
</body>
</html>