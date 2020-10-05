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
   <link href="style.css" rel="stylesheet">
  </head>
  <body class="passalong"> <!--Nichole added class to be used for styling-->
  <button onclick="location.href='landing_page.html';">Home</button> <!--temporary home button for presentation-->
  <h1>Add A Pass Along</h1>
  <form id="id02" method=post action="PassAlong.php"> <!--Nichole added the id for styling purposes and fixed the action page to PassAlong.php -->
<!--
  <p><strong>Your Name:</strong><br>
  <input type="text" name="topic_owner" size=40 maxlength=150>
  <p><strong>Pass Along Title:</strong><br>
  <input type="text" name="topic_title" size=40 maxlength=150>
  <P><strong>Pass Along Text:</strong><br>
  <textarea name="post_text" rows=8 cols=40 wrap=virtual></textarea>
  <P><input type="submit" name="submit" value="Add Pass Along"></p>
-->
<!--Nichole edited the above form to add labels instead of strong. each input field can have assigned labels.-->
<!--Note: the names of each input type matches the columns in the PassAlong table in database2.db to make for easy handling-->
  <div class = "createPassAlong"> <!--Nichole added class for styling purposes-->
    <label for="pDate">Date:</label>
    <input type="date" id="pDate" name="date"><br>

    <label for="pTime">Time:</label>
    <input type="time" id="pTime" name="time"><br>

<!--Labels came from the physical pass along paper from binder (Nichole)-->
    <label for="pName">DR Submitting:</label>
    <input type="text" id="pName" name="author"><br>

    <label for="pSubject">Subject:</label>
    <input type="text" id="pSubject" name="title"><br>

    <label for="pMessage">Message:</label>
    <input type="text" id="pMessage" name="message"><br> <!--Your styling of making it a box you can do in the stylesheet with the rest of the styling! thats why its not there in this version-->

    <input type="submit" name="submit" value="Add Pass Along">
  </div> <!-- end of div that encapsulates the form fields -->
  </form>

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
