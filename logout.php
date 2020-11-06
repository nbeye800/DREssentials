<?php
/*
 * Created By: Nichole Beyer
 * Course: CSC355
 * Assignment: DR Essentials
*/
session_start();
session_unset('email', 'password', 'name', 'role', 'building');

if(session_destroy()){
	header("Location: index.php");
	exit();
}
?>
