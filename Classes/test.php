<?php
$con=mysqli_connect("localhost","root","","medee");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

// Perform queries
$sql1="CREATE TABLE testPersons LIKE Persons"
mysqli_query($con,$sql1);
$sql2="INSERT INTO testPersons SELECT * FROM Persons ORDER BY LastName LIMIT 10"
mysqli_query($con,$sql2);

// Print info about most recently executed query
echo mysqli_info($con);

mysqli_close($con);
?>
