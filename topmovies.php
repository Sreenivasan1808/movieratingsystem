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

$sql="SELECT movieName, avg(rating) as avg_rating from movies group by movieName order by avg_rating desc;";
$result = $conn->query($sql);

echo "<table>
<tr>
<th>Movie Name</th>
<th>Rating</th>

</tr>";
while($row = $result->fetch_assoc()) {
  echo "<tr>";
  echo "<td>" . $row['movieName'] . "</td>";
  echo "<td>" . intval($row['avg_rating']) . "</td>";
  echo "</tr>";
}
echo "</table>";
$conn->close();
?>
</body>
</html>