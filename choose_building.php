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
    <button onclick="location.href='landing_page.html';">Beck</button>
    <button onmousedown="<?php updateHall('Berks', $_SESSION['email']) ?>;" onmouseup="location.href='landing_page.html';"">Berks</button>
    <button onclick="location.href='landing_page.html';">Bonner</button>
    <button onclick="location.href='landing_page.html';">Deatrick</button>
    <button onclick="location.href='landing_page.html';">Dixon North</button>
    <button onclick="location.href='landing_page.html';">Dixon South</button>
    <button onclick="location.href='landing_page.html';">Golden Bear Village South</button>
    <button onmousedown="<?php updateHall('Lehigh', $_SESSION['email'])?>;" onmouseup="location.href='landing_page.html';">Lehigh</button>
    <button onclick="location.href='landing_page.html';">Rothermel/GBVW</button>
    <button onclick="location.href='landing_page.html';">Schuykill</button>
    <button onclick="location.href='landing_page.html';">University Place</button>
  </div>

</body>
</html>
