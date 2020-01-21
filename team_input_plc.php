<?php
session_start();
$userName = $_SESSION["userName"];
$teamName = $_SESSION["teamName"];
$_SESSION["assessName"] = "CFA 1";
?>

<!DOCTYPE html>

<html>
<head>

<style>

table {
  border-collapse: collapse;
  margin: auto;
}
table, th, td {
  border: 1px solid black;
}

label {
color: #000000;
font-weight: bold;
display: block;
width: 200px;
float: left;
}
/*label:after { content: ": " }*/

.button {
  background-color: #2196F3;
  border: none;
  border-radius: 10px;
  color: black;
  padding: 15px 32px;
  text-align: center;
  cursor: pointer;
}

.item1 { grid-area: header;
        text-align: center;
}
.item2 { grid-area: left;
        text-align: right;
}
.item3 { grid-area: main;
        text-align: left;
}
.item4 { grid-area: right;
        text-align: center;
}
.item5 { grid-area: footer;
        text-align: center;
}
.item6 { grid-area: bottom;
        text-align: center;

}

.grid-container {
  display: grid;
  grid-template-areas:
    'header header header header header header'
    'left left main main right right'
    'footer footer footer footer footer footer'
    'bottom bottom bottom bottom bottom bottom';
  grid-gap: 0px;
  background-color: #2196F3;
  padding: 10px;
}

.grid-container > div {
  background-color: rgba(255, 255, 255, 0.8);

  padding: 20px 0;
  font-size: 20px;
}
</style>

</head>

<body>


<div class="grid-container">
  <div class="item1">
    <?php
echo "Hey ". $userName. "! Let's Build Your 'Team' ";
echo "<br>";
echo "Your CFA will be Titled 'CFA 1'";
     ?>
  </div>
  <div class="item2"></div>

  <div class="item3">
<form action="team_insert_plc.php" method="POST">
  <label for="teamName">Team Name</label><input type="text" name="teamName"><br>
  <?php
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

  //installing a list to choose team members
  ?>
  <label for="teamMembers">Team Members<br><h5>(Choose All Members)</h5></label><select name="teamMembers[]" multiple size="75">
  <br>
  <?php
  $sql = "SELECT userName
  FROM users";
  $result = $conn->query($sql);
  if ($result->num_rows > 0)
            {

      // output data of each row
      while($row = $result->fetch_assoc()) {
         // $totalwordcount = str_word_count($row["essay"]);
          $userName = $row["userName"];
  ?>

    <option value=<?php echo $userName;?>><?php echo $userName;?></option>

  <?php

      }

   }

  else {

      echo "0 results";
  }

  ?>
  </select>  <br>



  </div>
  <div class="item4">Links <p>under</p><p>construction</p></div>
  <div class="item5">
    <label for="submit"></label><input class="button" type="submit" value="Submit" name="submit">
   </form>
  </div>

  <div class="item6">
    <?php
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

    //installing a list to choose team members
    ?>

  </div>
</div>

</body>
</html>
