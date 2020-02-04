<?php
session_start();
$assessName = $_SESSION["assessName"];
//$assessName = "thisis Static";
//$_SESSION["assessStandard"] = $assessStandard;
$userName = $_SESSION["userName"];

// connect to the database for assessment name insertion
if ($_POST["assessName"]){
$assessName = $_POST["assessName"];

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
$sql = "UPDATE plcAssess SET assessName ='$assessName' WHERE assessAdmin='$userName'";

if ($conn->query($sql) === TRUE) {
//echo "Record updated successfully";
//echo "<br>";
//echo $plcStandard;
//echo $assessName;




//header('location: https://www.google.com');
header('location: record_plc.php');


} else {
echo "Error updating record: " . $conn->error;
}
}

//plc Standard Update
if ($_POST["assessStandard"]){
$assessStandard = $_POST["assessStandard"];

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
$sql = "UPDATE plcAssess SET assessStandard ='$assessStandard' WHERE assessName='$assessName'";

if ($conn->query($sql) === TRUE) {
//echo "Record updated successfully";
//echo "<br>";
//echo $plcStandard;
//echo $assessName;




//header('location: https://www.google.com');
header('location: record_plc.php');


} else {
echo "Error updating record: " . $conn->error;
}
}
////////////////////////////////////////////
//plc learning target update

//if ($_POST["assessLT"]){
//header('location: www.google.com');
//}



if ($_POST["assessLT"]){
$assessLT = $_POST["assessLT"];

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
$sql = "UPDATE plcAssess SET assessLT ='$assessLT' WHERE assessName='$assessName'";

if ($conn->query($sql) === TRUE) {
echo "Record updated successfully";
//echo "<br>";
//echo $plcStandard;
//echo $assessName;




header('location: record_plc.php');




} else {
echo "Error updating record: " . $conn->error;
}
}
/////////////////////////////////////////
//plc learning target update
if ($_POST["assessDay"]){
$assessDay = $_POST["assessDay"];

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
$sql = "UPDATE plcAssess SET assessDay ='$assessDay' WHERE assessName='$assessName'";

if ($conn->query($sql) === TRUE) {
//echo "Record updated successfully";
//echo "<br>";
//echo $plcStandard;
//echo $assessName;


header('location: record_plc.php');



} else {
echo "Error updating record: " . $conn->error;
}
}

?>
