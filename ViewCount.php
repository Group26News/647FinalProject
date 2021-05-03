<?php
  $servername = "mysql.eecs.ku.edu";
  $username = "borthmarco";
  $password = "Naif7eef";
  $dbname = "borthmarco";
  $mysqli = new mysqli($servername, $username, $password, $dbname);
  $ViewNumber = $_POST["ViewNumber"];

  /* check connection */
  if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
  }


  $query = "SELECT Title, ViewCount  FROM Article INNER JOIN Statistics ON ArticleID = PackageID GROUP BY Title HAVING ViewCount > " . $ViewNumber;

  if ($result = $mysqli->query($query)) {
    echo "<table><tr><th> Title </th><th> Number of Views </th></tr>";
    if($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["Title"] . "</td><td>" . $row["ViewCount"] . "</td></tr>";
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
