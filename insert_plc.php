<?php
session_start();

$lname = $_POST["lname"];
$leadSource = $_POST["leadSource"];
$date = $_POST["dateCreated"];
$soldStatus = $_POST["soldStatus"];
$soldCount = $_POST["soldCount"];
$quotedCount = $_POST["quotedCount"];
$notes = $_POST["notes"];


$servername = "localhost";
$dbusername = "debian-sys-maint";
$password = "bvjwgkcdZl64H808";
$dbname = "plc";
// Create connection
$conn = new mysqli($servername, $dbusername, $password, $dbname);
// Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO customer (fname, lname, leadSource, date, soldStatus, soldCount, quotedCount, notes)
VALUES ('$fname', '$lname', '$leadSource', '$date', '$soldStatus', '$soldCount', '$quotedCount', '$notes')";

if ($conn->query($sql) === TRUE) {
    echo "<div align='center'>";
    echo "<br>";echo "<br>";echo "<br>";echo "<br>";
   echo "New record created successfully";
   echo "<br>";echo "<br>";
  // echo " <meta http-equiv = 'refresh' content = '2; url = /insurance/insurance_input.php'/> ";
header('location: insurance_input.php');
   echo "</div>";
} else {
   echo "Error: " . $sql . "<br>" . $conn->error;
}

//$conn->close();
?>
