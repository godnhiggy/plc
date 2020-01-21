<!DOCTYPE html>

<?php
session_start();
?>



<html>
<body>
  this is good
  <form action="upload_pdf_action.php" method="post" enctype="multipart/form-data">

  <input type="file" name="file" size="50" />
  <input type="text" name="fileDescription"><br>
  <br>
  <input type="submit" value="Upload" />
  <?php
  $fileToPrint = "100";
  $teamName ="FirstTeam";
  $assessName = "CFA 1";
  $fileType = "Arduino Construction";

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
  $sql = "SELECT * FROM files WHERE teamName='$teamName' and assessName ='$assessName' AND fileType='$fileType'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0)
            {

      // output data of each row
      while($row = $result->fetch_assoc()) {
         // $totalwordcount = str_word_count($row["essay"]);
          $fileName = $row["fileName"];
          $fileDescription = $row["fileDescription"];
          echo "<br>";
          echo "<a href=".$fileName.">".$fileName."</a>--Description - ".$fileDescription;

      }

 }

else {

    echo "0 results";
}



  ?>
  </form>
</body>
</html>
