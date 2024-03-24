<!DOCTYPE html>
<html>
<head>
<style>
table {
  width: 100%;
  border-collapse: collapse;
}

table, td, th {
  border: 1px solid #57bf45;
  padding: 5px;
}

th {text-align: center;
color:#b7e4af;
background-color: #260e2a;}

td{
    background-color: #260e2a;
    color:#f5e8f7;
}
</style>
</head>
<body>

<?php
$q = $_GET['q'];

$servername = "localhost:3350";
$username = "root";
$password = "root";
$dbname = "foss";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql="SELECT * FROM movies WHERE movieName = '".$q."';";
$result = $conn->query($sql);

echo "<table>
<tr>
<th>User Name</th>
<th>Movie</th>
<th>Rating</th>
<th>Review</th>
</tr>";
while($row = $result->fetch_assoc()) {
  echo "<tr>";
  echo "<td>" . $row['fullname'] . "</td>";
  echo "<td>" . $row['movieName'] . "</td>";
  echo "<td>" . $row['rating'] . "</td>";
  echo "<td>" . $row['review'] . "</td>";
  echo "</tr>";
}
echo "</table>";
$conn->close();
?>
</body>
</html>