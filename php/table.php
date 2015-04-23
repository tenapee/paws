<?php
  require_once 'connect.php';

  $query = "SELECT * from available";
  $result = mysql_query($query);

  if (!$result) die ("DB access failed: " . mysql_error());

  $rows = mysql_num_rows($result);
  echo '<table>';
  echo '<tr><th>ID</th><th>AnimalID</th><th>Status</th><th>Name</th><th>Species</th><th>Breed</th><th>Sex</th><th>Size</th><th>Description</th><th>Picture</th></tr>';
  for ($j=0; $j<10; $j++) {
     $row = mysql_fetch_row($result);

     echo '<tr>';
     echo '<td>' . $row[0] . '</td><td>' . $row[1] . '</td><td>' . $row[2] . '</td><td>' . $row[3] . '</td><td>' . $row[4] . '<td>' . $row[5] . '</td><td>' . $row[6] . '</td><td>' . $row[7] . '</td><td>' . $row[8] . '</td><td><img src="' . $row[9] . '" height="120px" width="120px"></td>';
     echo '</tr>';
  }
  echo '</table>';




mysql_close($db_server);
?>