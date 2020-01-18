<?php
session_start();
?>
<!DOCTYPE html>

<?php
$assessName = $_SESSION["assessName"];
$userName = $_SESSION["userName"];
$teamName = $_SESSION["teamName"];
$notes = $_POST["notes"];
$day = $_POST["day"];
$attendance = $_POST["attendance"];
echo $attendance;
$member1 = "hello";
echo $member1;
/*
// connect to the database
$db = mysqli_connect('localhost', 'debian-sys-maint', 'bvjwgkcdZl64H808', 'plc');

$query = "INSERT INTO plcMeeting (notes, attendance, day)
      VALUES('$notes', '$attendance', '$day')";
mysqli_query($db, $query);
*/

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
$sql = "INSERT INTO plcMeeting (admin, team, assess, notes, member1, member2, member3, member4, member5, member6, member7, member8, member9, member10, day)
      VALUES('$userName', '$teamName', '$assessName', '$notes', '$attendance[0]', '$attendance[1]', '$attendance[2]', '$attendance[3]', '$attendance[4]', '$attendance[5]', '$attendance[6]', '$attendance[7]', '$attendance[8]', '$attendance[9]', '$day')";


if ($conn->query($sql) === TRUE) {
echo "Record updated successfully";
} else {
echo "Error updating record: " . $conn->error;
}
header('location: home.php');
?>

</html>
