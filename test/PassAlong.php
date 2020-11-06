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
if(isset($_SESSION['hall'])){$building = $_SESSION['hall'];}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <title>Add a Pass Along</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
   <link rel="stylesheet" href="assets/css/custom.css">
  </head>
<body class="passalong py-5"> <!--Nichole added class to be used for styling-->


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

<div class="passAlong-form">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
      <h2 class="text-white font-weight-bold mb-3">Add A Pass Along</h2>

        <form id="id02" method=post action="PassAlong.php"> <!--Nichole added the id for styling purposes and fixed the action page to PassAlong.php -->
          <!--Nichole edited the above form to add labels instead of strong. each input field can have assigned labels.-->
          <!--Note: the names of each input type matches the columns in the PassAlong table in database2.db to make for easy handling-->
          <div class = "row createPassAlong"> <!--Nichole added class for styling purposes-->
            <div class="col-sm-6 form-group">
              <label for="pDate">Date:</label>
              <input type="date" id="pDate" class="form-control" name="date">
            </div>

            <div class="col-sm-6 form-group">
              <label for="pTime">Time:</label>
              <input type="time" id="pTime" class="form-control" name="time">
            </div>

            <div class="col-sm-6 form-group">
              <!--Labels came from the physical pass along paper from binder (Nichole)-->
              <label for="pName">DR Submitting:</label>
              <input type="text" id="pName" class="form-control" name="author">
            </div>

            <div class="col-sm-6 form-group">
              <label for="pSubject">Subject:</label>
              <input type="text" id="pSubject" class="form-control" name="title">
            </div>

            <div class="col-sm-6 form-group">
              <label for="pMessage">Message:</label>
              <input type="text" id="pMessage" class="form-control" name="message"> <!--Your styling of making it a box you can do in the stylesheet with the rest of the styling! thats why its not there in this version-->
            </div>
            
            <div class="col-sm-12 form-group text-center my-5">
              <input type="submit" class="btn btn-danger btn-lg border rounded" value="Add Pass Along">
            </div>
          </div><!-- end of div that encapsulates the form fields -->
      </form>
    </div>
  </div>
</div>

<!--Begining of issets to check the form fields before inserting into the database-->
<?php
    if(isset($_POST['date'], $_POST['time'], $_POST['author'], $_POST['title'], $_POST['message'])){
      $date = $_POST['date'];
      $time = $_POST['time'];
      $author = $_POST['author'];
      $title = $_POST['title'];
      $message = $_POST['message'];

      //the fields are set, variables made, now insert into the PassAlong table
      @$a = insertPassAlong($title, $message, $author, $date, $time, $building);
    }
    //print the pass along entries
    @$b = printPassAlong($building);
?>
</body>
</html>
