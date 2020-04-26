<?php
// Edited By: Nichole Beyer DR Essentials CSC354 Spring2020
// History of function creation
// Edited By: Nichole Beyer Final Project CSC242 Fall 2018
// Created By: Dr. Schwesinger, CSC 242, Fall 2018, Assignment 9

/* Function Name: getUserRecord
 * Description: get user information from the database
 * Parameters: (string) $email: the user's email
 *             (string) $password: the user's password
 * Return Value: (array) The user's record if it exists, otherwise an empty
 *               array
 */
 
 function getUserRecord($email, $password) {

    // try to insert into the database
    // if an error occurs return FALSE
    try {
        $db =  new PDO("sqlite:database2.db");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM accounts WHERE email='$email' and password='$password'";
        $stmt = $db->query($sql);
        // there should only be a single record
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    catch (Exception $e) {
        print "<p>$e</p>";
        return array();
    }
}

/* Created By: Nichole Beyer
 * Function Name: updateHall()
 * Description: update what hall the DR/ARD/BD is in
 * Parameters: (string) $email: the user's email
 * 				(string) $newhall: the name of the new hall
 * Return Value: none
 */
function updateHall($newHall, $email){
	try{
		$db = new PDO("sqlite:database2.db");
		$sql = "UPDATE accounts SET hall = ? WHERE email = ?";
		$stmt = $db->prepare($sql);
		$stmt->execute([$newHall, $email]);
		//header("Refresh:0");
		return TRUE;
	}
	catch (Exception $e){
		print"<p>$e</p>";
		return FALSE;
	}
		$db=null;
}
?>
