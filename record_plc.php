<?php
session_start();
$userName = $_SESSION["userName"];
?>

<!DOCTYPE html>

<html>
<head>
<style>
.item1 { grid-area: header; }
.item2 { grid-area: left; }
.item3 { grid-area: main; }
/*.item4 { grid-area: right; }*/
.item5 { grid-area: footer; }

.grid-container {
  display: grid;
  grid-template-areas:
    'header header header header header header'
    'left left left main main main'
    'footer footer footer footer footer footer';
  grid-gap: 3px;
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
  <div class="item1"><?php echo "Admin - ".$userName;?>
    <br>Record Minutes

</div>


  <div class="item2">
    <h2>The Four Questions</h2>
    <form action="act_record.php" method="POST">
    <b>What</b><br>
      essential standard<br>
      <input type="text" name="notes"><br><br>
      learning target<br>
      <input type="text" name="notes"><br><br>
      test date<br>
      <input type="date" name="day"><br><br>
    <b>How</b><br>
      cfa upload<br>
      <input type="file" name="fileToUpload" id="fileToUpload"><br><br>
    <b>Yes</b><br>
      extension upload<br>
      <input type="file" name="fileToUpload" id="fileToUpload"><br><br>
    <b>No</b><br>
      remediation upload<br>
      <input type="file" name="fileToUpload" id="fileToUpload"><br><br>

      <input type="submit" value="Submit">
      </form>
  </div>


  <div class="item3">
    <h2>Meeting Notes</h2>
    <br>

    <form action="act_record.php" method="POST">Notes:
      <br><input type="text" name="notes">

      <br><?php
      $servername = "localhost";
      $dbusername = "debian-sys-maint";
      $password = "bvjwgkcdZl64H808";
      $dbname = "plc";

      // Create connection
      $db = new mysqli($servername, $dbusername, $password, $dbname);
      // Check connection
      if ($db->connect_error) {
      die("Connection failed: " . $db->connect_error);
      }

      //installing a list to choose team members
      ?>
      <br><label for="attendance">Attendance</label><br><select name="attendance[]" multiple size="10">
      <br>
      <?php
      $sql = "SELECT member1, member2, member3, member4, member5, member6, member7, member8, member9, member10
      FROM plcTeam WHERE admin ='$userName'";
      $result = $db->query($sql);
      if ($result->num_rows > 0)
                {

          // output data of each row
          while($row = $result->fetch_assoc()) {

      ?>

        <option value=<?php echo $row["member1"]?>><?php echo $row["member1"]?></option>
        <option value=<?php echo $row["member2"]?>><?php echo $row["member2"]?></option>
        <option value=<?php echo $row["member3"]?>><?php echo $row["member3"]?></option>
        <option value=<?php echo $row["member4"]?>><?php echo $row["member4"]?></option>
        <option value=<?php echo $row["member5"]?>><?php echo $row["member5"]?></option>
        <option value=<?php echo $row["member6"]?>><?php echo $row["member6"]?></option>
        <option value=<?php echo $row["member7"]?>><?php echo $row["member7"]?></option>
        <option value=<?php echo $row["member8"]?>><?php echo $row["member8"]?></option>
        <option value=<?php echo $row["member9"]?>><?php echo $row["member9"]?></option>
        <option value=<?php echo $row["member10"]?>><?php echo $row["member10"]?></option>


        <?php

          }

       }

      else {

          echo "0 results";
      }

      ?>
      </select>

      <br><br>Meeting Date:
      <br><input type="date" name="day">

      <br><br><input type="submit" value="Submit">
    </form>
  </div>


  <!--<div class="item4">Right</div>-->
  <div class="item5"></div>
</div>
</body>
</html>
