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
 
 * editLabs.php -- Allows an authenticated user to edit Lab info
 * 
 * Author: Dylan J. Sather
 * Created: 2010-04-08 
 * Last edited: 2010-04-08 
 */ 
 
$pageTitle = "Edit Lab Info"; 

require 'header.php'; 

?>

<h2 class="bold">Edit Lab Info</h2>
<table>
  <tr>
    <th class="bold">Lab ID</th>
    <th class="bold">Name</th>
    <th class="bold">Location</th>
    <th class="bold">String Representation</th>
    <th class="bold">URL</th>
    <th class="bold">Phone Number</th>
    <th class="bold">Open Status</th>
    <th class="bold">Always Open?</th>
    <th class="bold">Status Message</th>
  </tr>

<?php

// Pull Lab info from DB
$query = "SELECT id, name, location, stringRep, url, phoneNumber,
		 openStatus, alwaysOpenStatus, statusMessage
	  FROM labs
	  ORDER BY name ASC";

$labResults = $mysqli->query($query, MYSQLI_STORE_RESULT);

// Display Lab info row-by-row
while (list($id, $name, $location, $stringRep, $url, $phoneNumber,
	    $openStatus, $alwaysOpenStatus, $statusMessage) = $labResults->fetch_row()) {
    echo "
    <form method='post' action='" . $_SERVER['PHP_SELF'] . "'>
      <tr>
	<td>$id</td>
	<td>
	  <input type='text' name='name' value='$name' />
	</td>
	<td>
	  <input type='text' name='location' value='$location' />
	</td>
	<td>
	  <input type='text' name='stringRep' value='$stringRep' />
	</td>
	<td>
	  <input type='text' name='url' value='$url' />
	</td>
	<td>
	  <input type='text' name='phoneNumber' value='$phoneNumber' />
	</td>
	<td>$openStatus</td>
	<td>$alwaysOpenStatus</td>
	<td>$statusMessage</td>
	<td>
	  <input type='hidden' name='submissionCheck' value='1' />
	  <input type='submit' value='Edit Info' /><br />
	</td>
      </tr>";
}

$labResults->free();

echo "</table>";

require 'footer.php'; 

?> 
