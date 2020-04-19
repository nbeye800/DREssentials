<?php
/* Created by Nichole Beyer
 * Course: CSC354 Spring 2020
 * Assignment: DR Essentials
 * Document description: landing page with buttons to log in
*/

/* create and include a functions.php file */
/* Start session here */



 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
   <title>DR Essentials</title>
   <meta charset="utf-8">
   <!-- insert a link to stylesheet when made -->
 </head>
 <body>
   <!-- insert logo -->

   <!--make button-->
  <button class='btn' type='button' onclick='openForm();'>Login</button>

   <!-- log in form -->
   <div id='id01' class="login">
     <!-- creating an x button to close form -->
     <span onclick="closeForm();" class="close" title="Close Sign In">&times;</span>
     <form class="signInContent" action="index.php" method="post">
      <div class="container">
        <h2>Sign In</h2>
          <p> Please enter your credidentials to login to DR Essentials</p>
          <!--Horizontal rule-->
          <hr>
          <label for="email_1"><b>Email</b></label>
          <input type="email" id="email_1" placeholder="Enter Your KU Email" name="email" required>

          <label for="password_1"><b>Password</b></label>
          <input type="password" id="password_1" placeholder="Enter Your KU Password" name="password" required>

          <input type="hidden" name="action" value="signIn">

          <!--Cancel and Submit Buttons-->
          <button type="button" onclick="closeform();" class="cancelbtn">Cancel</button>
          <button type="submit" class="signinbtn">Sign In</button>
          <br><br><br>
      </div>
    </form>
  </div>
  <!--Functions for Form-->
  <script>
    function openForm(){
      document.getElementById('id01').style.display = "block";
    }
  </script>
  <script>
    function closeForm(){
      document.getElementById('id01').style.display = "none";
    }
  </script>
</body>
</html>
