<?php 
$file = $_FILES["pdffile"];
// saving uploaded files into folder
move_uploaded_file($file["tmp_name"], "uploads/".$file["name"]);

$myFile2 = "uploads/database.txt";
$myFileLink2 = fopen($myFile2, 'a') or die("Can't open file.");
fwrite($myFileLink2, $file["name"].'|');
fclose($myFileLink2);
// redirecting back to home
header('location:view_uploaded_schedules.php');



  // if(move_uploaded_file($_FILES["pdffile"]["tmp_name"], "uploads/".$_FILES["pdffile"]["name"]))
  // {
  // 	echo "<p class='text-success'>File Uploaded Successfully</p>";

  // 		echo "<a href='index.php'>Back To Home Page</a>";
  // }
  // else{
  // 	echo "File upload Failed! try Again Pease!!!"."<a href='index.php'>Back To Home Page</a>";
  // }

 ?>