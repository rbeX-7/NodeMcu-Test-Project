<!DOCTYPE html>
<html><body>
<?php
/*
  Rui Santos
  Complete project details at https://RandomNerdTutorials.com/esp32-esp8266-mysql-database-php/
  
  Permission is hereby granted, free of charge, to any person obtaining a copy
  of this software and associated documentation files.
  
  The above copyright notice and this permission notice shall be included in all
  copies or substantial portions of the Software.
*/

$servername = "localhost";

// REPLACE with your Database name
$dbname = "db_laravelapp";
// REPLACE with Database user
$username = "root";
// REPLACE with Database user password
$password = "ascent";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT a,b,c FROM test ORDER BY a DESC";

echo '<table cellspacing="5" cellpadding="5">
      <tr> 
        <td>VALUE A</td> 
        <td>VALUE B</td> 
        <td>VALUE C</td>        
      </tr>';
 
if ($result = $conn->query($sql)) {
    while ($row = $result->fetch_assoc()) {
        $row_a = $row["a"];
        $row_b = $row["b"];
        $row_c = $row["c"];            
      
        echo '<tr> 
                <td>' . $row_a . '</td> 
                <td>' . $row_b . '</td> 
                <td>' . $row_c . '</td>                
              </tr>';
    }
    $result->free();
}

$conn->close();
?> 
</table>
</body>
</html>
