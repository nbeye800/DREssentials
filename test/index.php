<?php
/* Created by Nichole Beyer
 * Course: CSC354 Spring 2020
 * Assignment: DR Essentials
 * Document description: landing page with buttons to log in
*/

include "functions.php";
session_start();
if(isset($_POST['email'], $_POST['password'], $_POST['hall'])){
  $email = $_POST['email'];
  $password = $_POST['password'];
  $hall = $_POST['hall'];

  $a = getUserRecord($email, $password);
  $b = updateHall($hall, $email);
  if($a = getUserRecord($email, $password)){
    $_SESSION['email'] = $a['email'];
    $_SESSION['password'] = $a['password'];
    $_SESSION['name'] = $a['name'];
    $_SESSION['role'] = $a['role'];
    $_SESSION['hall'] = $a['hall'];
    header('Location: landing_page.php');
 }
if(!$a){
  print("INVALID"); //need a better error message
}

}
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
   <!-- insert logo -->
   <div class="logo-section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-6 col-sm-6 col-md-4">
          <img src="assets/images/logo2.png" class="logo img-fluid" alt="logo">
        </div>
      </div>
    </div>
   </div>

  <!--make button-->

  <div id='id01' class="signIn">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <form class="signIn" action="index.php" method="post">
            <div class="form-group">
              <label for="email_1"><b>Email</b></label>
              <input type="email" id="email_1" class="form-control" placeholder="Enter Your KU Email" name="email" required>
            </div>

            <div class="form-group">
              <label for="password_1"><b>Password</b></label>
              <input type="password" id="password_1" class="form-control" placeholder="Enter Your KU Password" name="password" required>
            </div>

            <div class="form-group">
              <label for="list"><b>Where is your shift?</b></label>
              <select id="list" class="form-control" name="hall">
                <option value="Beck">Beck</option>
                <option value="Berks">Berks</option>
                <option value="Bonner">Bonner</option>
                <option value="Deatrick">Deatrick</option>
                <option value="Dixon North">Dixon North</option>
                <option value="Dixon South">Dixon South</option>
                <option value="GBVS">Golden Bear Village South</option>
                <option value="Lehigh">Lehigh</option>
                <option value="Rothermel">Rothermel/GBVW</option>
                <option value="Schuykill">Schuykill</option>
                <option value="UP">University Place</option>
              </select>
            </div>
            
            <div class="form-group text-center">
              <input type="submit" class="btn btn-danger btn-lg border rounded" placeholder="Login">
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>

</body>
</html>
