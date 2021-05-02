<?php
  $servername = "mysql.eecs.ku.edu";
  $username = "borthmarco";
  $password = "Naif7eef";
  $dbname = "borthmarco";
  $mysqli = new mysqli($servername, $username, $password, $dbname);
  $username = $_POST["Username"];
  $JobDescription = $_POST["JobDescription"];
  $EmploymentDate = $_POST["EmploymentDate"];

  if ($username == "") {
    echo "Enter Writer Account info.";
  } else {
    /* check connection */
    if ($mysqli->connect_errno) {
      printf("Connect failed: %s\n", $mysqli->connect_error);
      exit();
    }

    $query = "INSERT INTO Writer (Username, JobDescription, EmploymentDate) VALUES ('$username', '$JobDescription', '$EmploymentDate')";

    if ($result = $mysqli->query($query)) {
      echo "Writer Account successfully Created";

      /* fetch associative array */
      while ($row = $result->fetch_assoc()) {
          printf ("%s (%s)\n", $row["user_id"]);
      }

      /* free result set */
      $result->free();
    } else {
      echo "Writer Account already Created";
    }
  }

  /* close connection */
  $mysqli->close();
?>
