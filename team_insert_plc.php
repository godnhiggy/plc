<?php
session_start();
$userName = $_SESSION["userName"];
$assessName = $_SESSION["assessName"];
if (!$_SESSION["teamName"]){
$_SESSION["teamName"] =$_POST["teamName"];
}
$assessTeam = $_SESSION["teamName"];

	if(isset($_POST['submit']))

	{

	  $teamMembersPost = $_POST['teamMembers'];
		//$teamName = $_SESSION['teamName'];


	  if(!isset($teamMembersPost))

	  {

	    echo("<p>You didn't select any countries!</p>\n");

	  }

	  else
//print_r($teamMembersPost);
	  {

	    $nteamMembersPost = count($teamMembersPost);


	    echo("<p>You selected $nteamMembersPost countries: ");

	   // for($i=0; $i < $nCountries; $i++)

	    //{

	      echo($teamMembersPost[$i] . " ");
        //put sql insert statement here
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
        $sql = "INSERT INTO plcTeam (teamName, admin, member1, member2, member3, member4, member5, member6, member7, member8, member9, member10)
				      VALUES('$assessTeam', '$userName', '$teamMembersPost[0]', '$teamMembersPost[1]', '$teamMembersPost[2]', '$teamMembersPost[3]', '$teamMembersPost[4]', '$teamMembersPost[5]', '$teamMembersPost[6]', '$teamMembersPost[7]', '$teamMembersPost[8]', '$teamMembersPost[9]')";

if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
			}

		else {
		  echo "Error updating record: " . $conn->error;
		}
			    //}

					//put sql insert statement here
					$servername = "localhost";
					$dbusername = "debian-sys-maint";
					$password = "bvjwgkcdZl64H808";
					$dbname = "plc";

					$assessStandard = "";
					$assessLT = "";
					$assessDay = "2017-06-01";
					$completed = "";

					// Create connection
					$conn = new mysqli($servername, $dbusername, $password, $dbname);
					// Check connection
					if ($conn->connect_error) {
						 die("Connection failed: " . $conn->connect_error);
					}
					$sql = "INSERT INTO plcAssess (assessAdmin, assessName, assessTeam, assessStandard, assessLT, assessDay, completed)
								VALUES('$userName', '$assessName', '$assessTeam', '$assessStandard', '$assessLT', '$assessDay', '$completed')";

					if ($conn->query($sql) === TRUE) {
					header('location: record_plc.php');
					} else {
					echo "Error updating record: " . $conn->error;
					header('location: https://www.yahoo.com');
					}


	  }

	}







	?>

  <br>

 <?php

//	$_SESSION["teamName"]= $teamName;
//	header('location: record_plc.php');
 ?>
