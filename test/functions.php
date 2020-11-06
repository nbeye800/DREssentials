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
    print("<div class='desklog-table'>");
      print("<div class='container'>");
        print("<div class='row'>");
          print("<div class='col-12'>");
            print("<table class='table table-striped table-bordered table-responsive'>");
              print("<thead class='thead-dark'>");
                print("<tr>");
                  print("<th scope='col'>DATE</th>");
                  print("<th scope='col'>TIME IN</th>");
                  print("<th scope='col'>TIME OUT</th>");
                  print("<th scope='col'>NAME</th>");
                  print("<th scope='col'>COMMENTS</th>");
                  print("<th scope='col'># PACKAGES</th>");
                  print("<th scope='col'>KEYS & EQUIPMENT</th>");
                  print("<th scope='col'>RD </th>");
                  print("<th scope='col'>TOTAL HOURS</th>");
                print("</tr>");
              print("</thead>");
              print("<tbody>");
                $records = $stmt->fetchall(PDO::FETCH_ASSOC);
                foreach($records as $DeskLog){
                  print("<tr>");
                  print("<td>{$DeskLog['date']}</td>");
                  print("<td>{$DeskLog['time_in']}</td>");
                  print("<td>{$DeskLog['time_out']}</td>");
                  print("<td>{$DeskLog['name']}</td>");
                  print("<td>{$DeskLog['comments']}</td>");
                  print("<td>{$DeskLog['num_packages']}</td>");
                  print("<td>{$DeskLog['keys_equipment']}</td>");
                  print("<td>{$DeskLog['rd']}</td>");
                  print("<td>{$DeskLog['total_hours']}</td>");
                  print("</tr>");
                }
              print("</tbody>");
            print("</table>");
          print("</div>");
        print("</div>");
      print("</div>");
    print("</div>");
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
    print("<div class='desklog-table'>");
      print("<div class='container'>");
        print("<div class='row'>");
          print("<div class='col-12'>");
            print("<table class='table table-striped table-bordered table-responsive'>");
              print("<thead class='thead-dark'>");
                print("<tr>");
                  print("<th scope='col'>DATE</th>");
                  print("<th scope='col'>TIME</th>");
                  print("<th scope='col'>DR SUBMITTING</th>");
                  print("<th scope='col'>SUBJECT</th>");
                  print("<th scope='col'>MESSAGE</th>");
                print("</tr>");
              print("</thead>");
              print("<tbody>");
                $records = $stmt->fetchall(PDO::FETCH_ASSOC);
                foreach($records as $PassAlong){
                  print("<tr>");
                  print("<td>{$PassAlong['date']}</td>");
                  print("<td>{$PassAlong['time']}</td>");
                  print("<td>{$PassAlong['author']}</td>");
                  print("<td>{$PassAlong['title']}</td>");
                  print("<td>{$PassAlong['message']}</td>");
                  print("</tr>");
                }
              print("</tbody>");
            print("</table>");
          print("</div>");
        print("</div>");
      print("</div>");
    print("</div>");
  }

/* Created By: Nichole Beyer, Modified By: Henok Araya
 * Function Name: insertKeyLog()
 * Description: insert the key log entry into the database
 * Parameters:
 * Return Value: (boolean) TRUE if the information was successfully inserted, otherwise FALSE
 */
 function insertKeyLog($date, $name,$id_num, $key_code, $time_out, $time_in, $DR_in, $DR_out, $building){
   // try to insert into the database
   // is an error occurs return FALSE
   try{
     $db = new PDO("sqlite:database2.db");
     $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $sql = "INSERT INTO KeyLog (date, name, id_num, key_code, time_out, time_in, DR_in, DR_out, building)
                          VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
     $stmt = $db->prepare($sql);
     $stmt->execute([$date, $name, $id_num, $key_code, $time_out, $time_in, $DR_in, $DR_out, $building]);
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
    $sql = "SELECT date, name, id_num, key_code, time_out, time_in, DR_in, DR_out, building FROM KeyLog WHERE building = '$building'";// order by date and time_in desc";
    $stmt = $db->query($sql);
    print("<div class='desklog-table'>");
      print("<div class='container'>");
        print("<div class='row'>");
          print("<div class='col-12'>");
            print("<table class='table table-striped table-bordered table-responsive'>");
              print("<thead class='thead-dark'>");
                print("<tr>");
                  print("<th scope='col'>DATE</th>");
                  print("<th scope='col'>Name</th>");
                  print("<th scope='col'>Key #</th>");
                  print("<th scope='col'>Type of ID</th>");
                  print("<th scope='col'>Time Out</th>");
                  print("<th scope='col'>DR Initials</th>");
                  print("<th scope='col'>Time In</th>");
                  print("<th scope='col'>DR Initials</th>");
                print("</tr>");
              print("</thead>");
              print("<tbody>");
                $records = $stmt->fetchall(PDO::FETCH_ASSOC);
                foreach($records as $KeyLog){
                  print("<tr>");
                  print("<td>{$KeyLog['date']}</td>");
                  print("<td>{$KeyLog['name']}</td>");
                  print("<td>{$KeyLog['key_code']}</td>");
                  print("<td>{$KeyLog['id_num']}</td>");
                  print("<td>{$KeyLog['time_out']}</td>");
                  print("<td>{$KeyLog['DR_out']}</td>");
                  print("<td>{$KeyLog['time_in']}</td>");
                  print("<td>{$KeyLog['dr_initials']}</td>");
                  print("</tr>");
                }
              print("</tbody>");
            print("</table>");
          print("</div>");
        print("</div>");
      print("</div>");
    print("</div>");
  }
?>
