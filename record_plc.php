<?php
session_start();
$userName = $_SESSION["userName"];
$teamName = $_SESSION["teamName"];
$binary = "";
?>

<!DOCTYPE html>

<html>
<head>
<style>


.grid-container {
  display: grid;
  grid-template-columns: auto auto;
  grid-gap: 3px 5px;
  background-color: #2196F3;
  padding: 7px;
}

.grid-container > div {
  background-color: rgba(255, 255, 255, 0.8);
  text-align: center;
  padding: 20px 0;
  font-size: 20px;
}
.grid-container > div1 {
  background-color: green;
  text-align: center;
  padding: 20px 0;
  font-size: 20px;
}
.item1 {
  grid-area: 1/1/2/3
}
.item3 {
  grid-area: 2/2/9/3
}
.item10 {
  grid-area: 9/1/10/3
}
</style>
</head>
<body>
<div class="grid-container">
<div  class="item1">
  <?php echo "Team - ".$teamName;?><br>
  <?php echo "Admin - ".$userName;?>
  <br>Record Minutes

</div>
<div class="item2">
  <h2>The Four Questions</h2>

  <?php

      //SELECT statement with WHERE
      $db = mysqli_connect('localhost', 'debian-sys-maint', 'bvjwgkcdZl64H808', 'plc');

      $user_check_query = "SELECT * FROM plcAssess WHERE assessAdmin ='$userName' AND completed =''";
      $result = mysqli_query($db, $user_check_query);
      $user = mysqli_fetch_assoc($result);

    //  if ($user) { set variables for the rest of the page here to grey out sections}

        if ($user['assessAdmin'] === $userName) {
          $assessName = $user['assessName'];
          $assessTeam = $user['assessTeam'];
          $assessStandard = $user['assessStandard'];
          $assessLT = $user['assessLT'];
          $assessDay = $user['assessDay'];
          $completed = $user['completed'];
          $_SESSION["assessName"] = $assessName;


          //echo $assessName;
          //array_push($errors, "Username already exists");
        }
    //  }
        ?>

  We are working on CFA: <b><?php echo $assessName?></b><br><br>
</div>
<div class="item4">

  <b>1. What</b><br>


  <?php
  if ( $assessStandard) {
    echo "<u>They need to know: </u><br>".$assessStandard."</u>";
  } else {
  ?>

      <form action="act_record.php" method="POST">

        essential standard<br>
        <input type="text" name="plcStandard"><br>
        <input type="submit" value="Submit"><br>
      </form>
      <?php
    }
    ?>


</div>
<div class="item5">
  <?php
  if ( $assessLT) {
    echo "<u>They need to hit: </u><br>".$assessLT;
  } else {
  ?>


    <form>

        learning target<br>
        <input type="text" name="notes"><br>
        <input type="submit" value="Submit"><br>
      </form>

      <?php
    }
    ?>


</div>
<div class="item6">
  <?php
  if ($assessDay) {
    echo "<u>Target Date: </u><br>".$assessDay;
  }else{
   ?>

      <form>

        test date<br>
        <input type="date" name="day"><br>
        <input type="submit" value="Submit"><br>
      </form>

  <?php
  }
  ?>



</div>
<div class="item7">
  <b>2. How</b><br>
    cfa upload<br>
    <form action="upload_pdf_action.php" method="post" enctype="multipart/form-data">

    <input type="file" name="file" size="50" />

    <input type="submit" value="Upload" />

    </form><br><br>
    <br>
    <a href="uploads/thirddoc.pdf">PDF File</a>
    <br>
</div>
<div class="item8">
  <b>3. Yes</b><br>
    extension upload<br>
    <form action="upload_pdf_action.php" method="post" enctype="multipart/form-data">

    <input type="file" name="file" size="50" />

    <input type="submit" value="Upload" />

    </form><br><br>
</div>
<div class="item9">
  <b>4. No</b><br>
    remediation upload<br>
    <form action="upload_pdf_action.php" method="post" enctype="multipart/form-data">

    <input type="file" name="file" size="50" />

    <input type="submit" value="Upload" />

    </form><br><br>


</div>
<div class="item10">
10
</div>

<div class="item3">
  <h2>Meeting Notes</h2>
  <br>

  <form action="act_record.php" method="POST">Notes:
    <br><textarea name="notes" cols="60" rows="10" required="required">Type your answer here</textarea>

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
</div>

</body>
</html>
