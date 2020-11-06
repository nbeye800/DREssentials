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
 <meta name="viewport" content="width=device-width, initial-scale=1.0">

 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
 <link rel="stylesheet" href="assets/css/custom.css">
</head>
<body class="d-flex flex-column justify-content-center vh-100">

<div class="logo-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6 col-sm-6 col-md-4">
                <img src="assets/images/logo2.png" class="logo img-fluid" alt="logo">
            </div>
        </div>
    </div>
</div>


<div class="relocate-section">
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-6">
              <button onclick="location.href='landing_page.html';" class="btn btn-secondary my-4 ml-2">Home</button> <!--temporary home button for presentation-->
              <h6 class="text-white my-4 ml-2">Hello what building are you working in?</h6>
              <div class="relocate-btn">
                <button onclick="location.href='landing_page.html';" class="btn bg-white rounded border border-dark">Beck</button>
                <button onmousedown="<?php updateHall('Berks', $_SESSION['email']) ?>;" onmouseup="location.href='landing_page.html';"" class="btn bg-white rounded border border-dark">Berks</button>
                <button onclick="location.href='landing_page.html';" class="btn bg-white rounded border border-dark">Bonner</button>
                <button onclick="location.href='landing_page.html';" class="btn bg-white rounded border border-dark">Deatrick</button>
                <button onclick="location.href='landing_page.html';" class="btn bg-white rounded border border-dark">Dixon North</button>
                <button onclick="location.href='landing_page.html';" class="btn bg-white rounded border border-dark">Dixon South</button>
                <button onclick="location.href='landing_page.html';" class="btn bg-white rounded border border-dark">Golden Bear Village South</button>
                <button onmousedown="<?php updateHall('Lehigh', $_SESSION['email'])?>;" onmouseup="location.href='landing_page.html';" class="btn bg-white rounded border border-dark">Lehigh</button>
                <button onclick="location.href='landing_page.html';" class="btn bg-white rounded border border-dark">Rothermel/GBVW</button>
                <button onclick="location.href='landing_page.html';" class="btn bg-white rounded border border-dark">Schuykill</button>
                <button onclick="location.href='landing_page.html';" class="btn bg-white rounded border border-dark">University Place</button>             
              </div>
          </div>
      </div>
  </div>
</div>

</body>
</html>
