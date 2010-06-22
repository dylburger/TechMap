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
 
 * addLab.php -- Allows an authenticated user to add a Lab
 * 
 * Author: Dylan J. Sather
 * Created: 2010-04-08 
 * Last edited: 2010-04-08 
 */ 
 
$pageTitle = "Add New Lab"; 

require 'header.php'; 

// Check to see if the hidden 'submissionCheck' field exists in the $_POST superglobal; if so, add Lab to DB
if (array_key_exists('submissionCheck', $_POST)) {

    // For consistency (all variable names are mixedCase), we'd like 'stringRep' to be mixedCase
    $nameArray = explode(' ', $name);
    foreach ($nameArray as &$word)
	$word = ucfirst($word);
    $nameArray[0] = strtolower($nameArray[0]);
    $stringRep = implode($nameArray);

    $query = sprintf("INSERT INTO labs
		      (name, location, stringRep, url, phoneNumber, alwaysOpenStatus)
		      VALUES ('%s', '%s', '%s', '%s', '%s', '%s')",
		  mysqli_real_escape_string($mysqli, $_POST['name']),
		  mysqli_real_escape_string($mysqli, $_POST['location']),
		  mysqli_real_escape_string($mysqli, $stringRep),
		  mysqli_real_escape_string($mysqli, $_POST['url']),
		  mysqli_real_escape_string($mysqli, $_POST['phoneNumber']),
		  mysqli_real_escape_string($mysqli, $_POST['alwaysOpenStatus']));
    
    if ($mysqli->query($query))
	$message = $_POST['name'] . " was added successfully";
    else
	$message = $_POST['name'] . " was not added to the database. Please contact $adminEmail and report the following error:<br /> $mysqli->error";
}

?>

<h2 class="bold">Add Lab to TechMap</h2>

<?php // Display important messages, if they exist
echo "<p>$message</p>"; 
?>

<form id="addLab" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  <div> <!-- FORM div -->
    <label for="name">Name</label>
    <input type="text" name="name" id="name" value="" /><br />
    <label for="location">Location on Campus</label>
    <input type="text" name="location" id="location" value="" /><br />
    <label for="url">URL</label>
    <input type="text" name="url" id="url" value="http://" /><br />
    <label for="phoneNumber">Phone Number</label>
    <input type="text" name="phoneNumber" id="phoneNumber" value="" /><br />
    <label for="alwaysOpenStatus">Is this lab open 24 hours a day?</label>
    <input type="radio" name="alwaysOpenStatus" id="alwaysOpenStatus" value="1" checked="checked" />Yes
    <input type="radio" name="alwaysOpenStatus" id="alwaysOpenStatus" value="0" />No<br />
    <input type="hidden" name="submissionCheck" value="1" />
    <input type="submit" value="Add Lab" /><br />
  </div> <!-- End FORM div -->
</form>

<?php

require 'footer.php'; 

?> 
