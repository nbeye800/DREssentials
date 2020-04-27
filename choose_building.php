<?php
/* Created by Nichole Beyer
 * Course: CSC354 Spring 2020
 * Assignment: DR Essentials
 * Document Description: page to choose what building you're in to show appropriate info
 */

/* Building Options:
   *Traditional halls:
     * Lehigh 
     * Berks
     * Schuykill
     * Beck
     * Bonner
     * Deatrick
     * Rothermel
     * Johnson (is not opening fall 2020 so will not be included)
 *Non-Traditional halls:
     * Dixon Hall (North)
     * Dixon Hall (South)
     * University Place
     * Golden Bear Village South
     * Golden Bear Village West (apart of roth)
     * Honors Apartments (no desk)
     */

include "functions.php";
session_start();
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
  <div id="greeting"><p> Hello what building are you working in?</p></div>
  
  <div class="btn-group">
     <form action="/DREssentials/landing_page.html" method="post">
        <input type="submit" name="Beck" value="Beck"/>
        <input type="submit" name="Berks" value="Berks"/>
        <input type="submit" name="Bonner" value="Bonner"/>
        <input type="submit" name="Deatrick" value="Deatrick"/>
        <input type="submit" name="Dixon North" value="Dixon North"/>
        <input type="submit" name="Dixon South" value="Dixon South"/>
        <input type="submit" name="GBVS" value="Golden Bear Village South"/>
        <input type="submit" name="Lehigh" value="Lehigh"/>
        <input type="submit" name="Rothermel" value="Rothermel/GBVW"/>
        <input type="submit" name="Schuykill" value="Schuykill"/>
        <input type="submit" name="UP" value="University Place"/>
      </form>
  </div>

  <?php

    if(isset($_POST['Beck'])){updateHall('Beck', $_SESSION['email']);}
    if(isset($_POST['Bonner'])){updateHall('Bonner', $_SESSION['email']);}
    if(isset($_POST['Berks'])){updateHall('Berks', $_SESSION['email']);}
    if(isset($_POST['Deatrick'])){updateHall('Deatrick', $_SESSION['email']);}
    if(isset($_POST['Dixon North'])){updateHall('Dixon North', $_SESSION['email']);}
    if(isset($_POST['Dixon South'])){updateHall('Dixon South', $_SESSION['email']);}
    if(isset($_POST['GBVS'])){updateHall('GBVS', $_SESSION['email']);}
    if(isset($_POST['Lehigh'])){updateHall('Lehigh', $_SESSION['email']);}
    if(isset($_POST['Rothermel'])){updateHall('Rothermel', $_SESSION['email']);}
    if(isset($_POST['Schuykill'])){updateHall('Schuykill', $_SESSION['email']);}
    if(isset($_POST['UP'])){updateHall('UP', $_SESSION['email']);}

  ?>
</body>
</html>
