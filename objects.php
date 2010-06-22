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
 
 * objects.php -- Instantiates Lab and Printer objects, pulling info from DB
 * 
 * Author: Dylan J. Sather
 * Created: 2010-04-09 
 * Last edited: 2010-04-09 
 */ 
 
require 'init.php';
require 'classes.php';

// Pull info from 'labs' table in DB and create Lab objects
$query = "SELECT id, name, location, stringRep, url, phoneNumber,
	  openStatus, alwaysOpenStatus, statusMessage
	  FROM labs";

$labResults= $mysqli->query($query, MYSQLI_STORE_RESULT);

// We want to store our Lab objects in an array
$labObjects = array();

while (list($id, $name, $location, $stringRep, $url, $phoneNumber,
	    $openStatus, $alwaysOpenStatus, $statusMessage) = $labResults->fetch_row()) {

      // Each object can be identified by its ID, which is something we never need to change and which is unique to each object
      $$id = new Lab($id, $name, $location, $stringRep, $url, $phoneNumber,
		     $openStatus, $alwaysOpenStatus, $statusMessage);

      $labObjects[] = $$id;
}

?> 
