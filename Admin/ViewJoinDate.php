<?php
  $servername = "mysql.eecs.ku.edu";
  $username = "borthmarco";
  $password = "Naif7eef";
  $dbname = "borthmarco";
  $mysqli = new mysqli($servername, $username, $password, $dbname);
  $StartDate = $_POST["StartDate"];
  $EndDate = $_POST["EndDate"];

  /* check connection */
  if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
  }


  $query = "SELECT * FROM Reader GROUP BY Username HAVING JoinDate >= $StartDate"; #Between '2018-08-08' AND " . $FinalDate; #. $StartDate . " AND JoinDate <= " . $EndDate; #AND JoinDate <= " . $EndDate;

  if ($result = $mysqli->query($query)) {
    echo "<table><tr><th> Reader </th><th> User Description </th><th> User Description </th></tr>";
    if($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["Username"] . "</td><td>" . $row["UserDescription"] . "</td><td>" . $row["JoinDate"] . "</td></tr>";
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
