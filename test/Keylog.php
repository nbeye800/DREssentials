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
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/custom.css">
</head>
<body class="keylog py-5">


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

<div class="keylog-form">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
      
      <h2 class="text-white font-weight-bold mb-3">Key Log</h2>

      <form id="id01" action="Keylog.php" method="post">
        <div class = "row createkeyLog">
          <div class="col-sm-6 form-group">
            <label for="kDate">Date:</label>
            <input type="date" id="dDate" class="form-control" name="date">
          </div>

          <div class="col-sm-6 form-group">
            <label for="kName">Name (First and Last):</label>
            <input type="text" id="dName" class="form-control" name="name">
          </div>

          <div class="col-sm-6 form-group">
            <label for="kkey">Key #:</label>
            <input type="text" id="dkey" class="form-control" name="key_code">
          </div>

          <div class="col-sm-6 form-group">
            <label for="kId">Type of ID:</label>
            <input type="text" id="dId" class="form-control" name="id_num">
          </div>

          <div class="col-sm-6 form-group">
            <label for="kTimeout">Time Out:</label>
            <input type="time" id="dTimeOut" class="form-control" name="time_out">
          </div>

          <div class="col-sm-6 form-group">
            <label for="kInt">DR Initials :</label>
            <input type="text" id="dInt" class="form-control" name="DR_in">
          </div>

            <div class="col-sm-6 form-group">
              <label for="kTimeIn">Time In:</label>
              <input type="time" id="dTimeIn" class="form-control" name="time_in">
            </div>

            <div class="col-sm-6 form-group">
              <label for="kInt">DR Initials :</label>
              <input type="text" id="dInt" class="form-control" name="DR_out">
            </div>

            <div class="col-sm-12 form-group text-center my-5">
              <input type="submit" class="btn btn-danger btn-lg border rounded" value="Submit">
            </div>
        </div>
      </form>
    </div>
  </div>
</div>

  <?php
    if(isset($_POST['date'],  $_POST['name'], $_POST['key_code'], $_POST['id_num'],  $_POST['time_out'], $_POST['DR_out'], $_POST['time_in'], $_POST['DR_in'])) {
    $date = $_POST['date'];
		$name = $_POST['name'];
		$key_code = $_POST['key_code'];
		$id_num = $_POST['id_num'];
    $time_out = $_POST['time_out'];
		$DR_out = $_POST['DR_out'];
    $time_in = $_POST['time_in'];
		$DR_in = $_POST['DR_in'];


    @$a = insertKeyLog($date, $name, $id_num, $key_code, $time_out, $time_in, $DR_in, $DR_out, $building);
    }
   @$b = printKeyLog($building);
  ?>
</body>
</html>
