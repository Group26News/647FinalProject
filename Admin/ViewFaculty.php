<?php
  $servername = "mysql.eecs.ku.edu";
  $username = "borthmarco";
  $password = "Naif7eef";
  $dbname = "borthmarco";
  $mysqli = new mysqli($servername, $username, $password, $dbname);

  /* check connection */
  if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
  }

  $query = "SELECT * FROM Writer";

  if ($result = $mysqli->query($query)) {
    echo "<table><tr><th> Wrier </th><th> Job Description </th><th> Date Joined </th></tr>";
    if($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["Username"] . "</td><td>" . $row["JobDescription"] . "</td><td>" . $row["EmploymentDate"] . "</td></tr>";
      }
    } else {
      echo "<tr><td> No results found! </td></tr>";
    }


    /* free result set */
    $result->free();
  } else {
    echo "<tr><td>Error!</td></tr>";
  }
  echo "<table>";

  /* close connection */
  $mysqli->close();
?>
