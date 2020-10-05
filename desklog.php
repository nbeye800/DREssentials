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
  <link href="style.css" rel="stylesheet">
</head>
<body class="desklog">
  <button onclick="location.href='landing_page.html';">Home</button> <!--temporary home button for presentation-->
  <h1>Desk Log</h1>

  <form id="id01" action="desklog.php" method="post">
    <div class = "createDeskLog">
      <label for="dDate">Date:</label>
      <input type="date" id="dDate" name="date"><br>

      <label for="dTimeIn">Time In:</label>
      <input type="time" id="dTimeIn" name="timeIn"><br>

      <label for="dTimeout">Time Out:</label>
      <input type="time" id="dTimeOut" name="timeOut"><br>

      <label for="dName">Name (First and Last):</label><br>
      <input type="text" id="dName" name="name"><br>

      <label for="dComments">Comments:</label><br>
      <input type="text" id="dComments" name="comments"><br>

      <label for="dPackages"># of Packages:</label><br>
      <input type="text" id="dPackages" name="num_packages"><br>

      <label for="dKE">Keys & Equipment:</label>
      <input type="number" id="dKE" name="k_e"><br>

      <label for="dRD_in">RD is In</label>
      <input type="checkbox" id="dRD_in" name="rd_in"><br>

      <label for="dRD_out">RD is Out</label>
      <input type="checkbox" id="dRD_out" name="rd_out"><br>

      <label for="dTotal">Total Hours:</label>
      <input type="number" id="dTotal" name="totalhours"><br>

      <input type="submit" value="Submit">

    </div>
  </form>
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
