<?php
  $mysqli = new mysqli("mysql.eecs.ku.edu", "borthmarco", "Naif7eef", "borthmarco");
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

    //$userList = "SELECT user_id FROM Users";

    /*
    if ($result = $mysqli->query($userList)) {

      //fetch associative array
      while ($row = $result->fetch_assoc()) {
          printf ("%s (%s)\n", $row["user_id"]);
      }

      //free result set
      $result->free();
    }
    */

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
