<?php
$servername = "localhost";
$username = "root";
$password = '';
$dbname = "db1";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "DELETE from myGuests WHERE firstname='rahul'";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
  echo "fail".$conn->error;
}