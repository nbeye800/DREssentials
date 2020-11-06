<?php
//REMEMBER TO DOCUMENT
include "functions.php";
session_start();
if(isset($_SESSION['email'], $_SESSION['password'])){
  print($_SESSION['email']);
}
if(isset($_SESSION['name'], $_SESSION['role'])){
print($_SESSION['name']);
print($_SESSION['role']);
}
if(isset($_SESSION['hall'])){$building = $_SESSION['hall'];}
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <title>DR Essentials</title>
 <meta charset="utf-8">
 <link href="style.css" rel="stylesheet">
</head>
<body>
 <img class="logo_choice_page" src="logo2.png" alt="logo">

  <div id="prompt"><p> Choose a Binder</p></div>

  <div class="btn-group">
    <button onclick="location.href='desklog.php';">Desk Log</button>
    <button>Equipment Log</button>
    <button onclick="location.href='PassAlong.php';">Pass Along</button>
    <button onclick="location.href='Keylog.php';">Key Log</button>
    <button onclick="location.href='DRschedule.php';">Schedules & Contact Info</button>
    <button onclick="location.href='logout.php';">Log Out</button>
  </div>


</body>
</html>
