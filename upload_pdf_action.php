<?php
session_start();
$fileToPrint = "100";
$teamName = $_SESSION["teamName"];
$assessName = $_SESSION["assessName"];

if ($_POST["posting"]){$fileType=$_POST["posting"];
  $targetfolder = "uploads/$fileType/";
  $_SESSION["filetype"] = $fileType;
}


 $fileDescription = $_POST["fileDescription"];
 //$targetfolder = "uploads/";

 $targetfolder = $targetfolder . basename( $_FILES['file']['name']) ;

 $ok=1;

$file_type=$_FILES['file']['type'];

if ($file_type=="application/pdf" || $file_type=="image/gif" || $file_type=="image/jpeg") {

 if(move_uploaded_file($_FILES['file']['tmp_name'], $targetfolder))

 {

 echo "The file ". basename( $_FILES['file']['name']). " is uploaded";
 $filename = basename( $_FILES['file']['name']);
 echo "<br>";
 echo $fileName;

 // connect to the database
 $db = mysqli_connect('localhost', 'debian-sys-maint', 'bvjwgkcdZl64H808', 'plc');

 //INSERT into the database
 $query = "INSERT INTO files (fileDescription, fileName, teamName, assessName, fileType)
       VALUES('$fileDescription', '$targetfolder', '$teamName', '$assessName', '$fileType')";

 //run query
 mysqli_query($db, $query);

 }

 else {
echo $filename;
 echo "Problem uploading file";

 }

}

else {

 echo "You may only upload PDFs, JPEGs or GIF files.<br>";

}

?>
