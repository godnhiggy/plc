<?php
session_start();
$adminName = $_SESSION["userName"];
//SELECT team name from //
$db = mysqli_connect('localhost', 'debian-sys-maint', 'bvjwgkcdZl64H808', 'plc');

$user_check_query = "SELECT teamName FROM plcTeam WHERE admin ='$adminName' Limit 1";
$result = mysqli_query($db, $user_check_query);
$fetch= mysqli_fetch_assoc($result);
$teamName = $fetch[teamName];
$_SESSION["teamName"] = $teamName;
//echo $result;
?>
<!DOCTYPE html>
<html>
<head>
<style>
.item1 { grid-area: header; }
.item2 { grid-area: left; }
.item3 { grid-area: main; }
.item4 { grid-area: right; }
.item5 { grid-area: footer; }

.grid-container {
  display: grid;
  grid-template-areas:
    'header header header header header header'
    'left left main main right right'
    'footer footer footer footer footer footer';
  grid-gap: 0px;
  background-color: #2196F3;
  padding: 10px;
}

.grid-container > div {
  background-color: rgba(255, 255, 255, 0.8);
  text-align: center;
  padding: 20px 0;
  font-size: 30px;
}
</style>
</head>
<body>


<div class="grid-container">
  <div class="item1">PLC Home Page<br>
<?php
echo "<br>";
echo "Team - ".$teamName."<br>";
echo "Admin - ".$adminName;
 ?>
  </div>
  <div class="item2"></div>
  <div class="item3">

      <br>
      <a href="record_plc.php">Record Minutes</a>
      
  </div>
  <div class="item4"></div>
  <div class="item5"></div>
</div>

</body>
</html>
