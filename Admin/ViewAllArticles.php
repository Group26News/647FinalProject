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

  $query = "SELECT * FROM Article, Statistics WHERE ArticleID = PackageID";

  echo "<table>";
  if ($result = $mysqli->query($query)) {
    echo "<tr><th> ArticleID </th><th> Title </th><th> Author </th><th> Media Type </th><th> Date Published </th><th> View Count </th><th> Text </th></tr>";
    if($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["ArticleID"] . "</td><td>" . $row["Title"] . "</td><td>" . $row["Author"] . "</td>";
        echo "<td>" . $row["MediaType"] . "</td><td>" . $row["DatePublished"] . "</td><td>" . $row["ViewCount"] . "</td>";
        echo "<td>" . $row["Text"] . "</td>";
        echo "</tr>";
      }
    } else {
      echo "<tr><td> No results found! </td></tr>";
    }

    /* free result set */
    $result->free();
  } else {
    echo "<tr><td>Error!</td></tr>";
  }
  echo "</table>";

  /* close connection */
  $mysqli->close();
?>
