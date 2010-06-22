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
 
 * header.php -- Header file for TechMap
 * 
 * Author: Dylan J. Sather
 * Created: 2010-04-05 
 * Last edited: 2010-04-05 
 */ 

require 'init.php'; 
 
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
        "http://www.w3.org/TR/html4/strict.dtd">

<html lang="en">
  <head>
    <title><?php echo $mapTitle . ' - ' . $pageTitle; ?></title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
    
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="author" content="Dylan J. Sather" />
    <meta name="description" content="Grinnell College Campus Technology Map" />
    <meta name="keywords" content="Grinnell College, TC Corps, Technology Consultant,
				   Computer lab, Map, Dylan J. Sather" />
    <meta http-equiv="Content-Style-Type" content="text/css" />
    <meta http-equiv="Content-Script-Type" content="text/javascript" />
    <link rel="stylesheet" type="text/css" href="css/labmap.css" />

    <!-- IE8 fixed certain CSS issues, so we only want to use the IE styles on <= IE7 --> 
    <!--[if lte IE 7]>
	    <link rel="stylesheet" type="text/css" href="css/ie.css" />
    <![endif]-->

    <script src="javascript/jquery/js/jquery-1.4.2.min.js" type="text/javascript"></script>
    <script src="javascript/jquery/js/jquery-ui-1.8.custom.min.js" type="text/javascript"></script>
    <script src="javascript/jquery/development-bundle/ui/jquery.ui.tabs.js" type="text/javascript"></script>
    <script src="javascript/toggle.js" type="text/javascript"></script>
    <script src="javascript/bubble.js" type="text/javascript"></script>
    <script type="text/javascript">
	$(function() {
	    $('#fade > ul').tabs({ selected: <?php

	    // jQuery UI Tabs
	    
	    /* If we receive a value for the 'tabSelect' variable in the GET or POST superglobal, we
	       should set the tab accordingly; otherwise, the default tab is 0. This allows one to either
	       redirect users to a given tab after a form submission, or link to a specific tab directly
	    */

	    if (isset($_POST['tabSelect']))
		print "{$_POST['tabSelect']}"; 
	    else if (isset($_GET['tabSelect']))
		print "{$_GET['tabSelect']}";
	    else
		print "0"; // First tab (default)

	    ?> });
	    $('#fade > ul').tabs({ fx: { opacity: 'toggle' } }); // Nice fade effect when switching tabs
	});
    </script>
  </head>	   
