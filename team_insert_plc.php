<?php
session_start();
$userName = $_SESSION["userName"];


	if(isset($_POST['submit']))

	{

	  $aCountries = $_POST['teamMembers'];
		$teamName = $_POST['teamName'];


	  if(!isset($aCountries))

	  {

	    echo("<p>You didn't select any countries!</p>\n");

	  }

	  else
//print_r($aCountries);
	  {

	    $nCountries = count($aCountries);


	    echo("<p>You selected $nCountries countries: ");

	   // for($i=0; $i < $nCountries; $i++)

	    //{

	      echo($aCountries[$i] . " ");
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
				      VALUES('$teamName', '$userName', '$aCountries[0]', '$aCountries[1]', '$aCountries[2]', '$aCountries[3]', '$aCountries[4]', '$aCountries[5]', '$aCountries[6]', '$aCountries[7]', '$aCountries[8]', '$aCountries[9]')";

if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}
	    //}

	    echo("</p>");

	  }

	}

	?>
  <br>
  <?php
 $a = array("red", "green", "blue");
 print_r($a);

 echo "<br>";

 $b = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");
 print_r($b);
 ?>
 <!--printing static select form array-->
 <?php


 if(isset($_POST['submit']))

 {

   $aCountries = $_POST['leadSource'];



   if(!isset($aCountries))

   {

     echo("<p>You didn't select any countries!</p>\n");

   }

   else

   {
     $array = array ($_POST['leadSource']);
     echo "<br>";
     print_r($aCountries);
     echo "<br>";
     print_r($array);
     $nCountries = count($aCountries);


     echo("<p>You selected $nCountries countries: ");

     for($i=0; $i < $nCountries; $i++)

     {

       echo($aCountries[$i] . ", ");

     }

     echo("</p>");

  }

 }
echo $teamName;
header('location: home.php');
 ?>
