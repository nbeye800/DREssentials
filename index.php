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
    header('Location: http://csit.kutztown.edu/DREssentials/landing_page.html');
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
   <!-- insert a link to stylesheet when made -->
  <link href="style.css" rel="stylesheet">
 </head>
 <body>
   <!-- insert logo -->
 <img class="logo" src="logo2.png" alt="logo">
   <!--make button-->

  <div id='id01' class="signIn">
   <form class="signIn" action="index.php" method="post">
   <div class="container">
    <label for="email_1"><b>Email</b></label>
    <input type="email" id="email_1" placeholder="Enter Your KU Email" name="email" required>

    <label for="password_1"><b>Password</b></label>
    <input type="password" id="password_1" placeholder="Enter Your KU Password" name="password" required>

     <label for="list"><b>Where is your shift?</b></label>
     <select id="list" name="hall">
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

     <input type="submit" placeholder="Login">
   </div>
   </form>
  </div>

</body>
</html>
