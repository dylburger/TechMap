<?php 
/* 
 * This file is part of the Grinnell College Technology Map 
 * 
 * Copyright (C) 2010 
 * Dylan J. Sather 
 * dylan.sather@gmail.com 
 * 
 * This software is licensed under the terms of the MIT License. 
 * See LICENSE for details. 
 * 
 * You should have received a copy of the MIT License along with the 
 * TechMap. If not, see <http://www.opensource.org/licenses/mit-license.php>. 
 * 
 
 ============================================================================= 
 
 * init.php -- Initiates a connection to the DB
 *	       Pulls info from 'admin' table and sets system variables
 *	       Included in 'header.php', and where appropriate
 * 
 * Author: Dylan J. Sather
 * Created: 2010-04-05 
 * Last edited: 2010-04-06
 */ 
 
$mapTitle = 'Grinnell College Technology Map';
$adminEmail = 'dylan.sather@gmail.com';

// Initiate DB connection
$mysqlHost = 'localhost';
$mysqlUser = 'techMap';
$mysqlPass = 'eUVMa3mPcFyFNuwD';
$mysqlDb = 'techMap';

$mysqli = new mysqli($mysqlHost, $mysqlUser, $mysqlPass, $mysqlDb);

/* Check to see if there were any errors in connecting; if so, tells user to email $adminEmail
   Emails $adminEmail, as well, for good measure :)
*/

if ($mysqli->connect_errno) {
       
    print "<p>Sorry -- it looks like the Technology Map is having trouble connecting to the database. <br />
	    Please contact " . $adminEmail . " to let the admin know</p>";
    $to = $adminEmail;
    $subject = "TechMap connection error";
    $msg = "The TechMap had an error in connecting to the DB: " . $mysqli->connect_error;

    mail($to, $subject, $msg);

    exit();
}

// If all went well, we should pull some admin info from the 'admin' table in the DB
$result = $mysqli->query("SELECT * FROM admin", MYSQLI_STORE_RESULT);

/* Here, we're updating the $adminEmail and setting basic boolean variables:
     $isDebugging - conditionals are set throughout the TechMap to report critical debugging info
     $isHoliday - since many labs close for academic breaks, this is an easy way to toggle lab availability
     $isSummer - see above 
*/

list($adminEmail, $isDebugging, $isHoliday, $isSummer) = $result->fetch_row();

$result->free();

?> 
