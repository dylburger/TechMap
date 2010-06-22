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
 
 * classes.php -- Defines a set of classes for use in the TechMap
 * 
 * Author: Dylan J. Sather
 * Created: 2010-04-06 
 * Last edited: 2010-04-13
 */ 

// Special Exception classes
class StringException extends Exception {
    public function errorMsg() {
	$msg = $this->getMessage() . " is not a valid string";
	return $msg;
    }
}

class IntException extends Exception {
    public function errorMsg() {
	$msg = $this->getMessage() . " is not a valid integer";
	return $msg;
    }
}

// Classes for use in TechMap
class Lab
{
    // Properties
    public $id = '';
    public $name = '';
    public $location = '';
    public $stringRep = '';
    public $url = '';
    public $phoneNumber = '';
    public $openStatus = 0;
    public $alwaysOpenStatus = 0;
    public $statusMessage = '';

    // Constructor method
    public function __construct($labId, $labName, $labLoc, $labStr, $labUrl, $labPhone, $labOpen, $labAOpen, $labMsg) {
	$this->id = $labId;
	$this->name = $labName;
	$this->location = $labLoc;
	$this->stringRep = $labStr;
	$this->url = $labUrl;
	$this->phoneNumber = $labPhone;
	$this->openStatus = $labOpen;
	$this->alwaysOpenStatus = $labAOpen;
	$this->statusMessage = $labMsg;
    }

    // Getter methods

    public function getId() {
	return $this->id;
    }

    public function getName() {
	return $this->name;
    }

    public function getLocation() {
	return $this->location;
    }

    public function getStringRep() {
	return $this->stringRep;
    }

    public function getUrl() {
	return $this->url;
    }

    public function getPhoneNumber() {
	return $this->phoneNumber;
    }

    public function getOpenStatus() {
	return $this->openStatus;
    }

    public function getAlwaysOpenStatus() {
	return $this->alwaysOpenStatus;
    }

    public function getStatusMessage() {
	return $this->statusMessage;
    }

    // Setter methods - set property value for object and update in DB

    public function setName($labName) {
	$this->name = $labName;
	
	// Update value in DB; ensure value is a string
	if (!is_string($labName))
	    throw new StringException($labName);
	else {
	    $query = sprintf("UPDATE labs
			      SET name = '%s'
			      WHERE id = '%s'",
			  mysqli_real_escape_string($mysqli, $labName),
			  mysqli_real_escape_string($mysqli, $this->id));

	    if (!($result = $mysqli->query($query, MYSQLI_STORE_RESULT)))
		throw new Exception("The name \"$labName\" was not updated successfully in the DB");
	    // Otherwise, we're successful
	}
    }

    public function setLocation($labLoc) {
	$this->location = $labLoc;

	// Update value in DB; ensure value is a string
	if (!is_string($labLoc))
	    throw new StringException($labLoc);
	else {
	    $query = sprintf("UPDATE labs
			      SET location = '%s'
			      WHERE id = '%s'",
			  mysqli_real_escape_string($mysqli, $labLoc),
			  mysqli_real_escape_string($mysqli, $this->id));

	    if (!($result = $mysqli->query($query, MYSQLI_STORE_RESULT)))
		throw new Exception("The location \"$labLoc\" was not updated successfully in the DB");	
	    // Otherwise, we're successful
	}
    }

    public function setStringRep($labStr) {
	$this->stringRep = $labStr;

	// Update value in DB; ensure value is a string
	if (!is_string($labStr))
	    throw new StringException($labStr);
	else {
	    $query = sprintf("UPDATE labs
			      SET stringRep = '%s'
			      WHERE id = '%s'",
			  mysqli_real_escape_string($mysqli, $labStr),
			  mysqli_real_escape_string($mysqli, $this->id));

	    if (!($result = $mysqli->query($query, MYSQLI_STORE_RESULT)))
		throw new Exception("The string representation \"$labStr\" was not updated successfully in the DB");	
	    // Otherwise, we're successful
	}
    }

    public function setUrl($labUrl) {
	$this->url = $labUrl;

	// Update value in DB; ensure value is a string
	if (!is_string($labUrl))
	    throw new StringException($labUrl);
	else {
	    $query = sprintf("UPDATE labs
			      SET url = '%s'
			      WHERE id = '%s'",
			  mysqli_real_escape_string($mysqli, $labUrl),
			  mysqli_real_escape_string($mysqli, $this->id));

	    if (!($result = $mysqli->query($query, MYSQLI_STORE_RESULT)))
		throw new Exception("The URL \"$labUrl\" was not updated successfully in the DB");	
	    // Otherwise, we're successful
	}
    }

    public function setPhoneNumber($labPhone) {
	$this->phoneNumber = $labPhone;

	// Update value in DB; we don't have to check if the phone number is a string/int, since it could conceivably be either
	$query = sprintf("UPDATE labs
			  SET phoneNumber = '%s'
			  WHERE id = '%s'",
		      mysqli_real_escape_string($mysqli, $labPhone),
		      mysqli_real_escape_string($mysqli, $this->id));

	if (!($result = $mysqli->query($query, MYSQLI_STORE_RESULT)))
	    throw new Exception("The phone number \"$labPhone\" was not updated successfully in the DB");	
	// Otherwise, we're successful
    }

    public function setOpenStatus($labOpen) {
	$this->openStatus = $labOpen;

	// Update value in DB; ensure value is an int
	if (!is_int($labOpen))
	    throw new IntException($labOpen);
	else {
	    $query = sprintf("UPDATE labs
			      SET openStatus = '%d'
			      WHERE id = '%s'",
			  $labOpen,
			  mysqli_real_escape_string($mysqli, $this->id));

	    if (!($result = $mysqli->query($query, MYSQLI_STORE_RESULT)))
		throw new Exception("The open status was not updated successfully in the DB");	
	    // Otherwise, we're successful
	}
    }

    public function setAlwaysOpenStatus($labAOpen) {
	$this->alwaysOpenStatus = $labAOpen;

	// Update value in DB; ensure value is an int
	if (!is_int($labAOpen))
	    throw new IntException($labAOpen);
	else {
	    $query = sprintf("UPDATE labs
			      SET alwaysOpenStatus = '%d'
			      WHERE id = '%s'",
			  $labAOpen,
			  mysqli_real_escape_string($mysqli, $this->id));

	    if (!($result = $mysqli->query($query, MYSQLI_STORE_RESULT)))
		throw new Exception("The always open status was not updated successfully in the DB");	
	    // Otherwise, we're successful
	}
    }

    public function setStatusMessage($labMsg) {
	$this->statusMessage = $labMsg;

	// Update value in DB; ensure value is a string
	if (!is_int($labMsg))
	    throw new StringException($labMsg);
	else {
	    $query = sprintf("UPDATE labs
			      SET statusMessage = '%s'
			      WHERE id = '%s'",
			  mysqli_real_escape_string($mysqli, $labMsg),
			  mysqli_real_escape_string($mysqli, $this->id));

	    if (!($result = $mysqli->query($query, MYSQLI_STORE_RESULT)))
		throw new Exception("The status message \"$labMsg\" was not updated successfully in the DB");	
	    // Otherwise, we're successful
	}
    }
}

class Printer
{
    // Properties
    public $id = '';
    public $name = '';
    public $location = '';
    public $stringRep = '';
    public $url = '';
    public $lab = '';
    public $openStatus = 0;
    public $ooStatus = 0;
    public $sendEmail = 1;
    public $openStatusMessage = '';
    public $closedStatusMessage = '';
    public $ooStatusMessage = '';
    public $tonerLevel = 0;

    // Constructor method
    public function __construct($printerId, $printerName, $printerLoc, $printerStr, $printerUrl, $printerLab, 
				$printerOpen, $printerOoStatus, $printerSendEmail, $printerOpenStatusMsg,
				$printerClosedStatusMsg, $printerOoStatusMsg, $printerToner) {
	$this->id = $printerId;
	$this->name= $printerName;
	$this->location = $printerLoc;
	$this->stringRep = $printerStr;
	$this->url = $printerUrl;
	$this->lab = $printerLab;
	$this->openStatus = $printerOpen;
	$this->ooStatus = $printerOoStatus;
	$this->sendEmail = $printerSendEmail;
	$this->openStatusMessage = $printerOpenStatusMsg;
	$this->closedStatusMessage = $printerClosedStatusMsg;
	$this->ooStatusMessage = $printerOoStatusMsg;
	$this->tonerLevel = $printerToner;
    }

    // Getter methods

    public function getId() {
	return $this->id;
    }

    public function getName() {
	return $this->name;
    }

    public function getLocation() {
	return $this->location;
    }

    public function getStringRep() {
	return $this->stringRep;
    }

    public function getUrl() {
	return $this->url;
    }

    public function getLab() {
	return $this->Lab;
    }

    public function getOpenStatus() {
	return $this->openStatus;
    }

    public function getOoStatus() {
	return $this->ooStatus;
    }

    public function getSendEmail() {
	return $this->sendEmail;
    }

    public function getOpenStatusMessage() {
	return $this->openStatusMessage;
    }

    public function getClosedStatusMessage() {
	return $this->closedStatusMessage;
    }

    public function getOoStatusMessage() {
	return $this->ooStatusMessage;
    }

    public function getTonerLevel() {
	return $this->tonerLevel;
    }

    // Setter methods - set property value for object and update in DB

    public function setName($printerName) {
	$this->name = $printerName;
	
	// Update value in DB; ensure value is a string
	if (!is_string($printerName))
	    throw new StringException($printerName);
	else {
	    $query = sprintf("UPDATE printers
			      SET name = '%s'
			      WHERE id = '%s'",
			  mysqli_real_escape_string($mysqli, $printerName),
			  mysqli_real_escape_string($mysqli, $this->id));

	    if (!($result = $mysqli->query($query, MYSQLI_STORE_RESULT)))
		throw new Exception("The name \"$printerName\" was not updated successfully in the DB");
	    // Otherwise, we're successful
	}
    }

    public function setLocation($printerLoc) {
	$this->location = $printerLoc;

	// Update value in DB; ensure value is a string
	if (!is_string($printerLoc))
	    throw new StringException($printerLoc);
	else {
	    $query = sprintf("UPDATE printers
			      SET location = '%s'
			      WHERE id = '%s'",
			  mysqli_real_escape_string($mysqli, $printerLoc),
			  mysqli_real_escape_string($mysqli, $this->id));

	    if (!($result = $mysqli->query($query, MYSQLI_STORE_RESULT)))
		throw new Exception("The location \"$printerLoc\" was not updated successfully in the DB");	
	    // Otherwise, we're successful
	}
    }

    public function setStringRep($printerStr) {
	$this->stringRep = $printerStr;

	// Update value in DB; ensure value is a string
	if (!is_string($printerStr))
	    throw new StringException($printerStr);
	else {
	    $query = sprintf("UPDATE printers
			      SET stringRep = '%s'
			      WHERE id = '%s'",
			  mysqli_real_escape_string($mysqli, $printerStr),
			  mysqli_real_escape_string($mysqli, $this->id));

	    if (!($result = $mysqli->query($query, MYSQLI_STORE_RESULT)))
		throw new Exception("The string representation \"$printerStr\" was not updated successfully in the DB");
	    // Otherwise, we're successful
	}
    }

    public function setUrl($printerUrl) {
	$this->url = $printerUrl;

	// Update value in DB; ensure value is a string
	if (!is_string($printerUrl))
	    throw new StringException($printerUrl);
	else {
	    $query = sprintf("UPDATE printers
			      SET url = '%s'
			      WHERE id = '%s'",
			  mysqli_real_escape_string($mysqli, $printerUrl),
			  mysqli_real_escape_string($mysqli, $this->id));

	    if (!($result = $mysqli->query($query, MYSQLI_STORE_RESULT)))
		throw new Exception("The URL \"$printerUrl\" was not updated successfully in the DB");	
	    // Otherwise, we're successful
	}
    }

    public function setLab($printerLab) {
	$this->lab = $printerLab;

	// Update value in DB; ensure value is a string
	if (!is_string($printerLab))
	    throw new StringException($printerLab);
	else {
	    $query = sprintf("UPDATE printers
			      SET lab = '%s'
			      WHERE id = '%s'",
			  mysqli_real_escape_string($mysqli, $printerLab),
			  mysqli_real_escape_string($mysqli, $this->id));

	    if (!($result = $mysqli->query($query, MYSQLI_STORE_RESULT)))
		throw new Exception("The phone number \"$printerLab\" was not updated successfully in the DB");	
	    // Otherwise, we're successful
	}
    }

    public function setOpenStatus($printerOpen) {
	$this->openStatus = $printerOpen;

	// Update value in DB; ensure value is an int
	if (!is_int($printerOpen))
	    throw new IntException($printerOpen);
	else {
	    $query = sprintf("UPDATE printers
			      SET openStatus = '%d'
			      WHERE id = '%s'",
			  $printerOpen,
			  mysqli_real_escape_string($mysqli, $this->id));

	    if (!($result = $mysqli->query($query, MYSQLI_STORE_RESULT)))
		throw new Exception("The open status was not updated successfully in the DB");	
	    // Otherwise, we're successful
	}
    }

    public function setOoStatus($printerOoStatus) {
	$this->ooStatus = $printerOoStatus;

	// Update value in DB; ensure value is an int
	if (!is_int($printerOoStatus))
	    throw new IntException($printerOoStatus);
	else {
	    $query = sprintf("UPDATE printers
			      SET ooStatus = '%d'
			      WHERE id = '%s'",
			  $printerOoStatus,
			  mysqli_real_escape_string($mysqli, $this->id));

	    if (!($result = $mysqli->query($query, MYSQLI_STORE_RESULT)))
		throw new Exception("The out-of-order status was not updated successfully in the DB");	
	    // Otherwise, we're successful
	}
    }

    public function setSendEmailStatus($printerSendEmail) {
	$this->sendEmail = $printerSendEmail;

	// Update value in DB; ensure value is an int
	if (!is_int($printerSendEmail))
	    throw new IntException($printerSendEmail);
	else {
	    $query = sprintf("UPDATE printers
			      SET sendEmail = '%d'
			      WHERE id = '%s'",
			  $printerSendEmail,
			  mysqli_real_escape_string($mysqli, $this->id));

	    if (!($result = $mysqli->query($query, MYSQLI_STORE_RESULT)))
		throw new Exception("The send e-mail status was not updated successfully in the DB");	
	    // Otherwise, we're successful
	}
    }

    public function setOpenStatusMessage($printerOpenStatusMsg) {
	$this->openStatusMessage = $printerOpenStatusMsg;

	// Update value in DB; ensure value is a string
	if (!is_int($printerOpenStatusMsg))
	    throw new StringException($printerOpenStatusMsg);
	else {
	    $query = sprintf("UPDATE printers
			      SET openStatusMessage = '%s'
			      WHERE id = '%s'",
			  mysqli_real_escape_string($mysqli, $printerOpenStatusMsg),
			  mysqli_real_escape_string($mysqli, $this->id));

	    if (!($result = $mysqli->query($query, MYSQLI_STORE_RESULT)))
		throw new Exception("The status message \"$printerOpenStatusMsg\" was not updated successfully in the DB");
	    // Otherwise, we're successful
	}
    }

    public function setClosedStatusMessage($printerClosedStatusMsg) {
	$this->closedStatusMessage = $printerClosedStatusMsg;

	// Update value in DB; ensure value is a string
	if (!is_int($printerClosedStatusMsg))
	    throw new StringException($printerClosedStatusMsg);
	else {
	    $query = sprintf("UPDATE printers
			      SET closedStatusMessage = '%s'
			      WHERE id = '%s'",
			  mysqli_real_escape_string($mysqli, $printerClosedStatusMsg),
			  mysqli_real_escape_string($mysqli, $this->id));

	    if (!($result = $mysqli->query($query, MYSQLI_STORE_RESULT)))
		throw new Exception("The status message \"$printerClosedStatusMsg\" was not updated successfully in the DB");	
	    // Otherwise, we're successful
	}
    }

    public function setOoStatusMessage($printerOoStatusMsg) {
	$this->ooStatusMessage = $printerOoStatusMsg;

	// Update value in DB; ensure value is a string
	if (!is_int($printerOoStatusMsg))
	    throw new StringException($printerOoStatusMsg);
	else {
	    $query = sprintf("UPDATE printers
			      SET ooStatusMessage = '%s'
			      WHERE id = '%s'",
			  mysqli_real_escape_string($mysqli, $printerOoStatusMsg),
			  mysqli_real_escape_string($mysqli, $this->id));

	    if (!($result = $mysqli->query($query, MYSQLI_STORE_RESULT)))
		throw new Exception("The status message \"$printerOoStatusMsg\" was not updated successfully in the DB");	
	    // Otherwise, we're successful
	}
    }

    public function setTonerLevel($printerToner) {
	$this->tonerLevel = $printerToner;

	// Update value in DB; ensure value is an int
	if (!is_int($printerToner))
	    throw new IntException($printerToner);
	else {
	    $query = sprintf("UPDATE printers
			      SET tonerLevel = '%d'
			      WHERE id = '%s'",
			  $printerToner,
			  mysqli_real_escape_string($mysqli, $this->id));

	    if (!($result = $mysqli->query($query, MYSQLI_STORE_RESULT)))
		throw new Exception("The toner level was not updated successfully in the DB");	
	    // Otherwise, we're successful
	}
    }
}

?>
