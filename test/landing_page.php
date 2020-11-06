<?php
//REMEMBER TO DOCUMENT
include "functions.php";
session_start();
if(isset($_SESSION['email'], $_SESSION['password'])){
  print($_SESSION['email']);
}
if(isset($_SESSION['name'], $_SESSION['role'])){
print($_SESSION['name']);
print($_SESSION['role']);
}
if(isset($_SESSION['hall'])){$building = $_SESSION['hall'];}
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


<div class="relocate-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h3 class="text-white my-4 ml-2">Choose a Binder</h3>
                <div class="relocate-btn">
                    <button onclick="location.href='desklog.php';" class="btn bg-white rounded border border-dark">Desk Log</button>
                    <button class="btn bg-white rounded border border-dark">Equipment Log</button>
                    <button onclick="location.href='PassAlong.php';" class="btn bg-white rounded border border-dark">Pass Along</button>
                    <button onclick="location.href='Keylog.php';" class="btn bg-white rounded border border-dark">Key Log</button>
                    <button onclick="location.href='DRschedule.php';" class="btn bg-white rounded border border-dark">Schedules & Contact Info</button>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
