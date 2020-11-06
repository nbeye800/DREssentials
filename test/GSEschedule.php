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
<title> GSE Schedule </title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/custom.css">

</head>
<?php if($_SESSION['role'] == 'BD' || $_SESSION['role'] == 'ARD') {?>
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

<div class="GSEschedule-page">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="GSEschedule-heading text-white">
          <h1> GSE Schedule</h1>
          <p>This is the updated GSE Schedule</p>
          <!--if you are a GSE show this button (if role = BD or ARD)-->
          <?php?>
          <p>Click on the buttons inside the tabbed menu to view other schedules:</p>
        </div>

        <div class="GSEschedule-tabs my-5">
          <button class="btn btn-primary" onclick="location.href='DRschedule.php';"> DR Schedule</button>
          <button class="btn btn-primary" onclick="location.href='CAschedule.php';"> CA Schedule</button>
        </div>

        <div class="GSEschedule-content my-5">
          <iframe src="/DREssentials/test/assets/pdf/GSE_schedule.pdf" style="width:100%; height:500px;" frameborder="0"></iframe>
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
              <h2>RD on Duty Contact Info</h2>
              <ul>
                <li>Apartment, Duty Desk</li>
                <li>Duty Phone A : 000-000-2345</li>
                <li>Duty Phone B : 111-111-2345</li>
              </ul>
            </div>
          </div>
        </div>

        <div class="GSEschedule-table">
        <table class="table table-striped table-bordered table-responsive">
          <thead class="thead-dark">
            <tr>
            <th>Residence Hall</th>
            <th>Graduate Resident Director</th>
            <th>Email </strong></th>
            <th>Office Phone Number</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Beck Hall</td>
              <td>Benjamin Keating</td>
              <td><a href="mailto:benkeating@kutztown.edu" title="Ben Keating email">benkeating@kutztown.edu</a></td>
              <td>610-683-4983</td>
            </tr>
            <tr>
              <td>Berks Hall</td>
              <td>Jonathan Lynch</td>
              <td><a href="mailto:jonlynch@kutztown.edu" title="Jonathan Lynch's email">jonlynch@kutztown.edu</a></td>
              <td>610-683-4985</td>
            </tr>
            <tr>
              <td>Bonner Hall</td>
              <td>Autumn Brown</td>
              <td><a href="mailto:abrown@kutztown.edu" title="Autumn Brown email">abrown@kutztown.edu</a></td>
              <td>610-683-4987</td>
            </tr>
            <tr>
              <td>Deatrick Hall</td>
              <td>Chris Baldwin</td>
              <td><a href="mailto:chrbaldwin@kutztown.edu" title="Chris Baldwin">chrbaldwin@kutztown.edu</a></td>
              <td>610-683-4989</td>
            </tr>
            <tr>
              <td><p>Dixon Hall (North)</p></td>
              <td>Brooke Hollinger</td>
              <td><a href="mailto:broholling@kutztown.edu" title="Brooke Hollinger email">broholling@kutztown.edu</a></td>
              <td>484-646-4302</td>
            </tr>
            <tr>
              <td>Dixon Hall (South)</td>
              <td>Alec Leidy</td>
              <td><a href="mailto:aleleidy@kutztown.edu" title="Alec Leidy's email">aleleidy@kutztown.edu</a></td>
              <td>484-646-4304</td>
            </tr>
            <tr>
              <td>Golden Bear West</td>
              <td>Jasmine Burgos</td>
              <td><a href="mailto:jburgos@kutztown.edu" title="Jasmine Burgos's email">jburgos@kutztown.edu</a></td>
              <td>610-683-4997</td>
            </tr>
            <tr>
              <td>Golden Bear Village South</td>
              <td>
                <p>Megan Kishbaugh</p>
                <p>Amber Weber</p>
              </td>
              <td>
                <p><a href="mailto:megkishbau@kutztown.edu" title="Megan Kishbaugh email">megkishbau@kutztown.edu</a></p>
                <p><a href="mailto:Aweber@kutztown.edu" title="Amber Weber">aweber@kutztown.edu</a></p>
              </td>
              <td>
                <p>610-683-4972</p>
                <p>610-683-4964</p>
              </td>
            </tr>
            <tr>
              <td>Honors Apartments</td>
              <td>Amber Weber</td>
              <td><a href="mailto:Aweber@kutztown.edu" title="Amber Weber">aweber@kutztown.edu</a></td>
              <td>610-683-4964</td>
            </tr>
            <tr>
              <td>Johnson Hall</td>
              <td>------------------</td>
              <td>--------------------------</td>
              <td>OFFLINE '20-'21</td>
            </tr>
            <tr>
              <td>Lehigh Hall</td>
              <td>Kaili Soisson</td>
              <td><a href="mailto:ksoisson@kutztown.edu" title="Kaili Soisson email">ksoisson@kutztown.edu</a></td>
              <td>610-683-4993</td>
            </tr>
            <tr>
              <td>Rothermel Hall</td>
              <td>Jasmine Burgos</td>
              <td><a href="mailto:jburgos@kutztown.edu" title="Jasmine Burgos's email">jburgos@kutztown.edu</a></td>
              <td>610-683-4997</td>
            </tr>
            <tr>
              <td>Schuylkill Hall</td>
              <td>Tori Eichenlaub</td>
              <td><a href="mailto:veichenlaub@kutztown.edu" title="Tori Eichenlaub email">veichenlaub@kutztown.edu</a></td>
              <td>610-683-4999</td>
            </tr>
            <tr>
              <td>University Place</td>
              <td>Tyrell Bradshaw</td>
              <td><a href="mailto:tbradshaw@kutztown.edu" title="Tyrell Bradshaw email">tbradshaw@kutztown.edu</a></td>
              <td>610-683-4981</td>
            </tr>
            <tr>
              <td>Retention Program Coordinator</td>
              <td>Hannah Varn</td>
              <td><a href="mailto:hanvarn@kutztown.edu" title="Hannah Varn's email">hanvarn@kutztown.edu</a></td>
              <td>484-646-5899</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- source: https://gist.github.com/tzmartin/1cf85dc3d975f94cfddc04bc0dd399be -->
</body>
</html>
