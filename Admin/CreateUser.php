<?php
  $servername = "mysql.eecs.ku.edu";
  $username = "borthmarco";
  $password = "Naif7eef";
  $dbname = "borthmarco";
  $mysqli = new mysqli($servername, $username, $password, $dbname);
  $username = $_POST["Username"];
  $UserDescription = $_POST["UserDescription"];
  $JoinDate = date("Y-m-d");

  if ($username == "") {
    echo "Enter User Account info.";
  } else {
    /* check connection */
    if ($mysqli->connect_errno) {
      printf("Connect failed: %s\n", $mysqli->connect_error);
      exit();
    }

    $query = "INSERT INTO User (Username, UserDescription, $JoinDate) VALUES ('$username', '$UserDescription', '$JoinDate')";

    if ($result = $mysqli->query($query)) {
      echo "User Account successfully Created";

      /* fetch associative array */
      while ($row = $result->fetch_assoc()) {
          printf ("%s (%s)\n", $row["user_id"]);
      }

      /* free result set */
      $result->free();
    } else {
      echo "User Account already Created";
    }
  }

  /* close connection */
  $mysqli->close();
?>
