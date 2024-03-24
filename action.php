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


$sql = $conn->prepare("INSERT INTO movies (fullname, movieName, rating, review) VALUES (?,?,?,?);");
$sql->bind_param("ssis",$_POST["fname"], $_POST["movie"], $_POST["rating"], $_POST["review"]);
$status = $sql->execute();
if($status == true) {
  echo "<script>alert('Inserted successfully');</script>";
} else {
  echo "<script> alert('Insertion Failed'); </script>";
}

// $sql = "select * from movies";
// $result = $conn->query($sql);

// if ($result->num_rows > 0) {
//   while ($row = $result->fetch_assoc()) {
//     echo "Full Name: ". $row["fullname"] ."\tMovie Name: ". $row["movieName"]."<br>";
//   }
// }

// echo "<link href=\"style.css\" rel=\"stylesheet\" />";
// echo "<a href=\"index.html\" class=\"back-btn\"><button ><b>Back</b></button></a>";
?>