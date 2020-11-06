<?php
/* Created by Moise Dore
 * Edited by: Nichole Beyer
 * Course: CSC354 Spring 2020
 * Assignment: DR Essentials
 * Document description: Pass Along, create a pass along entry and view all the pass along messages
*/
include "functions.php";
session_start();
//if not logged in redirect to log in page. restrict access
if(!isset($_SESSION['email'], $_SESSION['password'])){
  header("location: index.php");
  exit();
}
if(isset($_SESSION['email'], $_SESSION['password'])){
  $role = $_SESSION['role'];
  print($role);
  $record = getUserRecord($_SESSION['email'], $_SESSION['password']);
  print($record['name']);
}

if(isset($_SESSION['hall'])){$building = $_SESSION['hall'];}
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <title> DR Schedule </title>
 <meta charset="utf-8">
 <link href="style.css" rel="stylesheet">
</head>
<body>
	<button onclick="location.href='logout.php';">Log Out</button>
<h1> DR Schedule</h1>

<p>This is the updated DR Schedule</p>

</head>
<?php if($_SESSION['role'] == 'ARD') {?>
<h2> Upload Schedule </h2>
<input type="file"  id = "Upload" name= "Upload Schedule">
<?php } ?> <!--end of if statement-->
<body>

<p>Click on the buttons inside the tabbed menu to view other schedules:</p>

<div class="tab">
  <button class="tablinks" onclick="location.href='CAschedule.php';"> CA Schedule</button>
  <button class="tablinks" onclick="location.href='GSEschedule.php';"> GSE Schedule</button>
</div>



 <iframe src="/DREssentials/DR_schedule.pdf" style="width:600px; height:500px;" frameborder="0"></iframe>
 <div class="GSE_info">
  <div style="text-align:left">
    <h2>Contact Info</h2>
    <h2>DRs Contact Info</h2>
    <p>Nichole: 000-000-2345 </p> 
	<p>Henok: 111-111-2345 </p>
  </div> 
 <div class="GSE_info">
  <div style="text-align:left">
  <h2> Upload Schedule </h2>
  <input type="file"  id = "Upload" name= "Upload Schedule">
</div>
 <!-- source: https://gist.github.com/tzmartin/1cf85dc3d975f94cfddc04bc0dd399be -->
 </body>
 </html>
