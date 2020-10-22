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

/* Created By: Nichole Beyer
 * Function Name: insertDeskLog()
 * Description: insert the desk log entry into the database
 * Parameters:

 * Return Value: (boolean) TRUE if the information was successfully inserted, otherwise FALSE
 */
 function insertDeskLog($date, $timein, $timeout, $name, $numpackages, $k_e, $rd, $totalhours, $building, $comments){
   // try to insert into the database
   // is an error occurs return FALSE
   try{
     $db = new PDO("sqlite:database2.db");
     $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $sql = "INSERT INTO DeskLog (date, time_in, time_out, name, num_packages, keys_equipment, rd, total_hours, building, comments)
                          VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
     $stmt = $db->prepare($sql);
     $stmt->execute([$date, $timein, $timeout, $name, $numpackages, $k_e, $rd, $totalhours, $building, $comments]);
     return TRUE;
   } //end try
   catch (Exception $e) {
       print "<p>$e</p>";
       return FALSE;
   }

 }

 /* Created By: Nichole Beyer
 * Function Name: printDeskLog
 * Description: Print desk logs for building the user is logged in for
 * Parameters: (string) $building
 * Return Value: none
 */
 function printDeskLog($building){
   $db = new PDO("sqlite:database2.db");
   $sql = "SELECT date, time_in, time_out, name, num_packages, keys_equipment, rd, total_hours, building, comments FROM DeskLog WHERE building = '$building'";// order by date and time_in desc";
   $stmt = $db->query($sql);
   print("<h1> DATE     | TIME IN    | TIME OUT   | NAME        | COMMENTS           | # PACKAGES | KEYS & EQUIPMENT | RD  | TOTAL HOURS </h1>");

   $records = $stmt->fetchall(PDO::FETCH_ASSOC);
   foreach($records as $DeskLog){
    print($DeskLog['date']);
    print(" ");

    print($DeskLog['time_in']);
    print(" ");

    print($DeskLog['time_out']);
    print(" ");

    print($DeskLog['name']);
    print(" ");

    print($DeskLog['comments']);
    print(" ");

    print($DeskLog['num_packages']);
    print(" ");

    print($DeskLog['keys_equipment']);
    print(" ");

    print($DeskLog['rd']);
    print(" ");

    print($DeskLog['total_hours']);
    print(" ");

    print("<br>");
   }
 }

 /* Created By: Nichole Beyer
  * Function Name: insertPassAlong()
  * Description: insert the Pass ALong entry into the database
  * Parameters:

  * Return Value: (boolean) TRUE if the information was successfully inserted, otherwise FALSE
  */
 function insertPassAlong($title, $message, $author, $date, $time, $building){
   // try to insert into the database
   // is an error occurs return FALSE
   try{
     $db = new PDO("sqlite:database2.db");
     $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $sql = "INSERT INTO PassAlong (title, message, author, date, time, building)
                          VALUES (?, ?, ?, ?, ?, ?)";
     $stmt = $db->prepare($sql);
     $stmt->execute([$title, $message, $author, $date, $time, $building]);
     return TRUE;
   } //end try
   catch (Exception $e) {
       print "<p>$e</p>";
       return FALSE;
   }
 }

 /* Created By: Nichole Beyer
 * Function Name: printPassAlong
 * Description: Print pass along entries for building the user is logged in for
 * Parameters: (string) $building
 * Return Value: none
 */
 function printPassAlong($building){
   $db = new PDO("sqlite:database2.db");
   $sql = "SELECT title, message, author, date, time, building FROM PassAlong WHERE building = '$building' order by date desc ";
   $stmt = $db->query($sql);
   print("<h1> DATE      | TIME    | DR SUBMITTING   | SUBJECT         | MESSAGE</h1>");
   $records = $stmt->fetchall(PDO::FETCH_ASSOC);
   foreach($records as $PassAlong){
     print($PassAlong['date']);
     print(" ");

     print($PassAlong['time']);
     print(" ");

     print($PassAlong['author']);
     print(" ");

     print($PassAlong['title']);
     print(" ");

     print($PassAlong['message']);
     print(" ");

     print("<br>");
   }
 }

/* Created By: Nichole Beyer, Modified By: Henok Araya
 * Function Name: insertKeyLog()
 * Description: insert the key log entry into the database
 * Parameters:
 * Return Value: (boolean) TRUE if the information was successfully inserted, otherwise FALSE
 */
 function insertKeyLog($date, $name, $key_num, $type_of_id, $time_out, $dr_initials, $time_in, $dr_initials){
   // try to insert into the database
   // is an error occurs return FALSE
   try{
     $db = new PDO("sqlite:database2.db");
     $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $sql = "INSERT INTO KeyLog (date, name, key_num, type_of_id, time_out, dr_initials, time_in, dr_initials)
                          VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
     $stmt = $db->prepare($sql);
     $stmt->execute([$date, $name, $key_num, $type_of_id, $time_out, $dr_initials, $time_in, $dr_initials]);
     return TRUE;
   } //end try
   catch (Exception $e) {
       print "<p>$e</p>";
       return FALSE;
   }

 }

 /* Created By: Nichole Beyer, Modified By: Henok Araya
 * Function Name: printKeyLog
 * Description: Print Key logs for building the user is logged in for
 * Parameters: (string) $building
 * Return Value: none
 */
 function printKeyLog($building){
   $db = new PDO("sqlite:database2.db");
   $sql = "SELECT date, name, key_num, type_of_id, time_out, dr_initials, time_in, dr_initials FROM KeyLog WHERE building = '$building'";// order by date and time_in desc";
   $stmt = $db->query($sql);
   print("<h1> DATE     | Name    | Key #   | Type of ID    | Time Out | DR Initials | Time In | DR Initials | </h1>");

   $records = $stmt->fetchall(PDO::FETCH_ASSOC);
   foreach($records as $KeyLog){
    print($KeyLog['date']);
    print(" ");

    print($KeyLog['name']);
    print(" ");

    print($KeyLog['key_num']);
    print(" ");

    print($KeyLog['type_of_id']);
    print(" ");

    print($KeyLog['time_out']);
    print(" ");

    print($KeyLog['dr_initials']);
    print(" ");

    print($KeyLog['time_in']);
    print(" ");

    print($KeyLog['dr_initials']);
    print(" ");


    print("<br>");
   }
 }
?>
