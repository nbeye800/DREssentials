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
 <meta name="viewport" content="width=device-width, initial-scale=1.0">

 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
 <link rel="stylesheet" href="assets/css/custom.css">
</head>
<?php if($_SESSION['role'] == 'ARD') {?>
<h2> Upload Schedule </h2>
<input type="file"  id = "Upload" name= "Upload Schedule">
<?php } ?> <!--end of if statement-->
<body class="py-5">


<div class="logo-section">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-6 col-sm-6 col-md-4">
        <img src="assets/images/logo2.png" class="logo img-fluid" alt="logo">
      </div>
    </div>
  </div>
</div>


<div class="get-back-to-home mb-5">
  <div class="container">
    <div class="row">
      <div class="col-12">
      <button onclick="location.href='landing_page.html';" class="btn btn-secondary">Home</button> <!--temporary home button for presentation-->
      </div>
    </div>
  </div>
</div>

<div class="DRschedule-page">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="DRschedule-heading text-white">
          <h1>DR Schedule</h1>
          <p>This is the updated DR Schedule</p>
          <p>Click on the buttons inside the tabbed menu to view other schedules</p>
        </div>

        <div class="DRschedule-tabs my-5">
          <button class="btn btn-primary" onclick="location.href='CAschedule.php';"> CA Schedule</button>
          <button class="btn btn-primary" onclick="location.href='GSEschedule.php';"> GSE Schedule</button>
        </div>

        <div class="DRschedule-content my-5">
          <iframe src="/DREssentials/test/assets/pdf/DR_schedule.pdf" style="width:100%; height:500px;" frameborder="0"></iframe>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="GSEschedule-upload text-white my-5">
              <h2> Upload Schedule </h2>
              <input type="file"  id = "Upload" name= "Upload Schedule">
            </div>
          </div>
          
          <div class="col-md-6">
            <div class="GSEschedule-contact-info text-white my-5">
            <h2>DRs Contact Info</h2>
            <ul>
              <li>Henok: 111-111-2345</li>
              <li>Nichole: 000-000-2345</li>
            </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

 <!-- source: https://gist.github.com/tzmartin/1cf85dc3d975f94cfddc04bc0dd399be -->

</body>
</html>
