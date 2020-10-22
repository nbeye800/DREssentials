<?php
/* Created by Nichole Beyer, Modified by Henok Araya
 * Course CSC355 Fall 2020
 * Assignment: DR Essentials
 * Document Description: A form for Key Log entries
 * Name of file: Keylog.php
 */
include "functions.php";
session_start();
//if not logged in redirect to log in page. restrict access
if(!isset($_SESSION['email'], $_SESSION['password'])){
  header("location: index.php");
  exit();
}
if(isset($_SESSION['hall'])){$building = $_SESSION['hall'];}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Key Log</title>
  <meta charset="utf-8">
  <link href="style.css" rel="stylesheet">
</head>
<body class="keylog">
  <button onclick="location.href='landing_page.html';">Home</button> <!--temporary home button for presentation-->
  <h1>Key Log</h1>

  <form id="id01" action="keylog.php" method="post">
    <div class = "createkeyLog">
      <label for="kDate">Date:</label>
      <input type="date" id="dDate" name="date"><br>
	  
	  <label for="kName">Name (First and Last):</label><br>
      <input type="text" id="dName" name="name"><br>
	  
	  <label for="kkey">Key #:</label><br>
      <input type="text" id="dkey" name="key_num"><br>
	  
	  <label for="kId">Type of ID:</label><br>
      <input type="text" id="dId" name="type_of_id"><br>

      <label for="kTimeout">Time Out:</label>
      <input type="time" id="dTimeOut" name="timeOut"><br>
	  
	   <label for="kInt">DR Initials :</label><br>
      <input type="text" id="dInt" name="dr_initials"><br>
	   
	  <label for="kTimeIn">Time In:</label>
      <input type="time" id="dTimeIn" name="timeIn"><br>
	  
	  <label for="kInt">DR Initials :</label><br>
      <input type="text" id="dInt" name="dr_initials"><br>

      <input type="submit" value="Submit">

    </div>
  </form>
  <?php
    if(isset($_POST['date'],  $_POST['name'], $_POST['key_num'], $_POST['type_of_id'],  $_POST['timeOut'], $_POST['dr_initials'], $_POST['timeIn'], $_POST['dr_initials'],)) {
        $date = $_POST['date'];
		$name = $_POST['name'];
		$keynum = $_POST['key_num'];
		$typeofid = $_POST['type_of_id'];
        $timeout = $_POST['timeOut'];
		$dr_initials = $_POST['dr_initials'];
        $timein = $_POST['timeIn'];
		$dr_initials = $_POST['dr_initials'];
		

       @$a = insertKeyLog($date, $name, $key_num, $type_of_id, $timeOut, $dr_initials, $timeIn, $dr_initials);
    }
    @$b = printKeyLog($building);
  ?>
</body>
</html>