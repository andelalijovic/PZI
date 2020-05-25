<?php 
  session_start();
  if(empty($_SESSION["id"])) {
    header("location: /login.php");
  }
  include "connection.php";
  $userid = $_SESSION["id"];
  $type = $_SESSION["type"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles/bootstrap.min.css">
    <link rel="stylesheet" href="styles/style.css">
  <title>Profile</title>
</head>
<body>
  <?php include("templates/header.php") ?>
  <div class="cont">
  <?php 
  if($type == 'guest') {
    echo "<h3>My appointments today</h3>";
    $sql = "SELECT date, start, sport.name AS sport_name, playground.address AS playground_address
            FROM appointment
            INNER JOIN playground ON appointment.playground_id = playground.id
            INNER JOIN sport ON playground.sport_id = sport.id
            WHERE DATE(date) = CURDATE()
            AND user_id = $userid";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        echo "Date: " . $row["date"] . ", Time: " . $row["start"] . ":00, Sport: " . $row["sport_name"] . ", Address: " . $row["playground_address"] . "<br>";
      }
    }
  } elseif ($type == 'admin') {
    echo "<h3>Users</h3>";
    echo "<table>
            <tr>
              <td>ID</td>
              <td>Username</td>
            </tr>";
    $sql = "SELECT id, username FROM user;";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        
        // echo "id: " . $row["id"] . ", username: " . $row["username"] . "<br>";
        echo "<tr>
                <td>". $row["id"] . "</td>
                <td>". $row["username"] . "</td>
              </tr>";
        
      }
    }
    echo "</table>";
  }

  ?>

  </div>
  
</body>
</html>