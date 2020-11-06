<?php
/* Created by Nichole Beyer
 * Course CSC355 Fall 2020
 * Assignment: DR Essentials
 * Document Description: the desk log, a form to create an entry and a list of past entries
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
  <title>Desk Log</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/custom.css">

</head>

<body class="desklog py-5">


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
  
<div class="desklog-form">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
      
      <h2 class="text-white font-weight-bold mb-3">Desk Log</h2>
      <form id="id01" action="desklog.php" method="post">
        <div class = "row createDeskLog">
          <div class="col-sm-6 form-group">
            <label for="dDate">Date:</label>
            <input type="date" id="dDate" class="form-control" name="date">
          </div>

          <div class="col-sm-6 form-group">
            <label for="dTimeIn">Time In:</label>
            <input type="time" id="dTimeIn" class="form-control" name="timeIn">
          </div>

          <div class="col-sm-6 form-group">
            <label for="dTimeout">Time Out:</label>
            <input type="time" id="dTimeOut" class="form-control" name="timeOut">
          </div>

          <div class="col-sm-6 form-group">
            <label for="dName">Name (First and Last):</label>
            <input type="text" id="dName" class="form-control" name="name">
          </div>         

          <div class="col-sm-6 form-group">
            <label for="dComments">Comments:</label>
            <input type="text" id="dComments" class="form-control" name="comments">
          </div> 

          <div class="col-sm-6 form-group">
            <label for="dPackages"># of Packages:</label>
            <input type="text" id="dPackages" class="form-control" name="num_packages">
          </div>      

          <div class="col-sm-6 form-group">
            <label for="dKE">Keys & Equipment:</label>
            <input type="number" id="dKE" class="form-control" name="k_e">
          </div>

          <div class="col-md-6 form-group">
            <label for="">Select RD In/Out</label> <br>
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" id="dRD_in" class="custom-control-input" name="rd_in">
              <label for="dRD_in" class="custom-control-label">RD is In</label>
            </div>

            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" id="dRD_out" class="custom-control-input" name="rd_out">
              <label for="dRD_out" class="custom-control-label">RD is Out</label>
            </div>
          </div>
          
          <!-- <div class="col-sm-3 form-group">
            <label for="dRD_in">RD is In</label>
            <input type="checkbox" id="dRD_in" class="form-control" name="rd_in">
          </div> -->

          <!-- <div class="col-sm-3 form-group">
            <label for="dRD_out">RD is Out</label>
            <input type="checkbox" id="dRD_out" class="form-control" name="rd_out">
          </div> -->
          
          <div class="col-sm-6 form-group">
            <label for="dTotal">Total Hours:</label>
            <input type="number" id="dTotal" class="form-control" name="totalhours">
          </div>
          

          <div class="col-sm-12 form-group text-center my-5">
            <input type="submit" class="btn btn-danger btn-lg border rounded" value="Submit">
          </div>

        </div>
      </form>
      </div>
    </div>
  </div>
</div>

  <?php
    if(isset($_POST['date'], $_POST['timeIn'], $_POST['timeOut'], $_POST['name'], $_POST['num_packages'], $_POST['k_e'], $_POST['totalhours'], $_POST['comments'])) {
        $date = $_POST['date'];
        $timein = $_POST['timeIn'];
        $timeout = $_POST['timeOut'];
        $name = $_POST['name'];
        $numpackages = $_POST['num_packages'];
        $k_e = $_POST['k_e'];
        $totalhours = $_POST['totalhours'];
        $comments = $_POST['comments'];

        if(isset($_POST['rd_in'])){
          $rd = "In";
        }
        else if(isset($_POST['rd_out'])){
          $rd = "Out";
        }

       @$a = insertDeskLog($date, $timein, $timeout, $name, $numpackages, $k_e, $rd, $totalhours, $building, $comments);
    }
    @$b = printDeskLog($building);
  ?>
</body>
</html>
