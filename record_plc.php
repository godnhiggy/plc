<?php
session_start();
$userName = $_SESSION["userName"];
$teamName = $_SESSION["teamName"];
$fileType = $_SESSION["fileType"];

$binary = "";
?>
<!DOCTYPE html>
<html>
<head>
<style>
.grid-container {
  grid-template-columns: 50% 50%;
  display: grid;
  grid-gap: 5px;
  background-color: #2196F3;
  padding: 10px;
  border-radius: 25px;
}
.grid-item {
  background-color: rgba(255, 255, 255, 0.8);
  text-align: center;
  padding: 20px;
  font-size: 30px;
  border-radius: 25px;
}
.item1 {
  grid-column: 1 / span 2;
  grid-row: 1;
}
.item2 {
  grid-column: 1;
  grid-row: 2;
}
.item3 {
  grid-column: 2;
  grid-row: 2 / span 4;
}
.item3a {
  grid-column: 2;
  grid-row: 6 / span 4;
}
.item4 {
  grid-column: 1;
  grid-row: 3;
}
.item5 {
  grid-column: 1;
  grid-row: 4;
}
.item6 {
  grid-column: 1;
  grid-row: 5;
}
.item7 {
  grid-column: 1;
  grid-row: 6;
}
.item8 {
  grid-column: 1;
  grid-row: 7;
}
.item9 {
  grid-column: 1;
  grid-row: 8;
}

.item10 {
  grid-column: 1 / span 2;
  grid-row: 11;
}

</style>
</head>
<body>
<div class="grid-container">
  <div  class="grid-item item1">
    <?php echo "Team - ".$teamName;?><br>
    <?php echo "Admin - ".$userName;?>
    <br>Record Minutes
  </div>

  <div class="grid-item item2">
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
                  //echo $assessName;
          //array_push($errors, "Username already exists");
        }
    //  }
        ?>

  We are working on CFA: <b><?php echo $assessName?></b><br><br>
</div>

<div class="grid-item item3">
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

  <div class="grid-item item3a">
    <b>Meeting Records</b><br>
      past meeting minutes<br>

      <br>
      <?php

      //$fileToPrint = "100";


      //$fileType = "Arduino Construction";

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
      $sql = "SELECT * FROM plcMeeting WHERE team='$teamName'";
      $result = $conn->query($sql);
      if ($result->num_rows > 0)
                {

          // output data of each row
          while($row = $result->fetch_assoc()) {
             // $totalwordcount = str_word_count($row["essay"]);
              $plcAssess = $row["assess"];
              $plcNotes = $row["notes"];
              echo "<br>";
              echo $plcAssess."-------".$plcNotes;
              echo "<br>";
              //echo "<a href=".$fileName.">".$fileName."</a> -file description-'".$fileDescription."'";

          }

     }

    else {

        echo "0 results";
    }




       ?>
      <br>
  </div>








  <?php
    if ($assessStandard) {
          $test="green";} else {$test="lightblue";}?>
  <div class="grid-item item4" style = "background-color:
                                          <?php echo $test; ?>
                                                                ">

  <b>1. What</b><br>





  <?php
    if ( $assessStandard) {
          echo "<u>They need to know: </u><br>".$assessStandard."</u>";


                          } else {
  ?>


      <form action="four_questions_action_plc.php" method="POST">

        essential standard<br>

        <input type="text" name="assessStandard"><br>
        <input type="submit" value="Submit"><br>

      </form>
      <?php
    }
    ?>


</div>


<?php
if ($assessLT) {

$test="green";} else {$test="lightblue";}?>

<div class="grid-item item5" style = "background-color:
<?php echo $test; ?>

">
<!--<div class="item5">-->
  <?php

  if ($assessLT) {
  echo "<u>... they need to hit: </u><br><br>".$assessLT;
  } else {
  ?>



    <form action="four_questions_action_plc.php" method="POST">

        learning target<br>
        <input type="text" name="assessLT"><br>
        <input type="submit" value="Submit"><br>
      </form>

      <?php
    }
    ?>


</div>
<?php
if ($assessDay) {

$test="green";} else {$test="lightblue";}?>

<div class="grid-item item6" style = "background-color:
<?php echo $test; ?>

">
  <?php
//  if ($assessDay) {
//echo "<u>Target Date: </u><br>".$assessDay;
//echo "<br><br>";}
//  if (!$assessDay) {
    echo "<u>Target Date: </u><br>".$assessDay;
//  }else{
   ?>


      <form action="four_questions_action_plc.php" method="POST">

      <!--  test date<br>
        <input type="date" name="day"><br>-->
        change test date ifneeded<br>
        <input type="date" name="assessDay"><br>
        <input type="submit" value="Submit"><br>
      </form>

  <?php

//  }
  ?>

</div>
<div class="grid-item item7">
  <b>2. How</b><br>
    cfa upload<br>
    <form action="upload_pdf_action.php" method="post" enctype="multipart/form-data">

    <input type="file" name="file" size="50" />

    <input type="submit" value="Upload" />
    <br>
    file description below
    <br>
    <input type="text" name="fileDescription" required><br>
    <input type="hidden" name="posting" value="cfa">
    </form><br><br>
    <br>
    <?php

    //$fileToPrint = "100";


    //$fileType = "Arduino Construction";

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
    $sql = "SELECT * FROM files WHERE teamName='$teamName' and assessName ='$assessName' AND fileType='cfa'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0)
              {

        // output data of each row
        while($row = $result->fetch_assoc()) {
           // $totalwordcount = str_word_count($row["essay"]);
            $fileName = $row["fileName"];
            $fileDescription = $row["fileDescription"];
            echo "<br>";
            echo "<a href=".$fileName.">".$fileName."</a> -file description-'".$fileDescription."'";

        }

   }

  else {

      echo "0 results";
  }




     ?>
    <br>
</div>
<div class="grid-item item8">
  <b>3. Extension</b><br>
    extension file upload<br>
    <form action="upload_pdf_action.php" method="post" enctype="multipart/form-data">

    <input type="file" name="file" size="50" />

    <input type="submit" value="Upload" />
    <br>
    file description below
    <br>
    <input type="text" name="fileDescription" required><br>
    <input type="hidden" name="posting" value="extension">
    </form><br><br>
    <br>
    <?php

    //$fileToPrint = "100";


    //$fileType = "Arduino Construction";

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
    $sql = "SELECT * FROM files WHERE teamName='$teamName' and assessName ='$assessName' AND fileType='extension'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0)
              {

        // output data of each row
        while($row = $result->fetch_assoc()) {
           // $totalwordcount = str_word_count($row["essay"]);
            $fileName = $row["fileName"];
            $fileDescription = $row["fileDescription"];
            echo "<br>";
            echo "<a href=".$fileName.">".$fileName."</a> -file description-'".$fileDescription."'";

        }

   }

  else {

      echo "0 results";
  }




     ?>
    <br>
</div>
<div class="grid-item item9">
  <b>3. Remediation</b><br>
    remnediation file upload<br>
    <form action="upload_pdf_action.php" method="post" enctype="multipart/form-data">

    <input type="file" name="file" size="50" />

    <input type="submit" value="Upload" />
    <br>
    file description below
    <br>
    <input type="text" name="fileDescription" required><br>
    <input type="hidden" name="posting" value="remediation">
    </form><br><br>
    <br>
    <?php

    //$fileToPrint = "100";


    //$fileType = "Arduino Construction";

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
    $sql = "SELECT * FROM files WHERE teamName='$teamName' and assessName ='$assessName' AND fileType='remediation'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0)
              {

        // output data of each row
        while($row = $result->fetch_assoc()) {
           // $totalwordcount = str_word_count($row["essay"]);
            $fileName = $row["fileName"];
            $fileDescription = $row["fileDescription"];
            echo "<br>";
            echo "<a href=".$fileName.">".$fileName."</a> -file description-'".$fileDescription."'";

        }

   }

  else {

      echo "0 results";
  }




     ?>
    <br>
</div>



</div>
</body>
</html>
