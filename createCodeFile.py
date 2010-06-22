#!/usr/bin/python

""" createCodeFile.py

    This file is part of the Grinnell College Technology Map 

    Copyright (C) 2010 
    Dylan J. Sather 
    dylan.sather@gmail.com 

    This software is licensed under the terms of the MIT License. 
    See LICENSE for details. 

    You should have received a copy of the MIT License along with the 
    TechMap. If not, see <http://www.opensource.org/licenses/mit-license.php>. 

    ============================================================================= 

    Creates files and generates pre-formatted headers for the Grinnell College 
    TechMap code files. Takes any number of filenames as command line params

    Checks file extension (.php, .py) for each param (file) and creates an
    appropriate header 
    
    If the file extension is not one for which we've created headers, the 
    program simply creates a blank file """


__author__ = "Dylan J. Sather"
__created__ = "2009-07-25"
__lastEdited__ = "2010-04-05"

import sys
import string
from time import strftime

# For each file we've specified on the command line...

for file in sys.argv[1:]:

    # Check file extension and write lines
    fileExt = string.split(file, '.')[-1]
    filename = file

    # PHP
    if fileExt == 'php':
	lines = ["<?php \n", 
	"/* \n", 
	" * This file is part of the Grinnell College Technology Map \n", 
	" * \n",
	" * Copyright (C) 2010 \n",
	" * Dylan J. Sather \n",
	" * dylan.sather@gmail.com \n",
	" * \n", 
	" * This software is licensed under the terms of the MIT License. \n",
	" * See LICENSE for details. \n",
	" * \n",
	" * You should have received a copy of the MIT License along with the \n",
	" * TechMap. If not, see <http://www.opensource.org/licenses/mit-license.php>. \n",
	" * \n",
	" \n",
	" ============================================================================= \n",
	" \n",
	" * " + filename + " -- [Insert summary here] \n",
	" * \n",
	" * Author: \n",
	" * Created: " + strftime("%Y-%m-%d") + " \n",
	" * Last edited: " + strftime("%Y-%m-%d") + " \n",
	" */ \n",
	" \n",
	"$pageTitle = \"" + filename + "\"; \n",
	"\n",
	"require 'header.php'; \n",
	"\n",
	"// Code goes here \n",
	"\n",
	"require 'footer.php'; \n",
	"\n",
	"?> \n"]

    # Python
    elif fileExt == 'py':
	lines = ["#!/usr/bin/python \n",
	"\n",
	"\"\"\" " + filename + "\n",
	"\n",    
	"    This file is part of the Grinnell College Technology Map \n", 
	"\n",
	"    Copyright (C) 2010 \n",
	"    Dylan J. Sather \n",
	"    dylan.sather@gmail.com \n",
	"\n", 
	"    This software is licensed under the terms of the MIT License. \n",
	"    See LICENSE for details. \n",
	"\n",
	"    You should have received a copy of the MIT License along with the \n",
	"    TechMap. If not, see <http://www.opensource.org/licenses/mit-license.php>. \n",
	"\n",
	"    ============================================================================= \n",
	"\n",
	"    [Enter description here] \"\"\" \n", 
	"\n",
	"__author__ = \"\" \n",
	"__created__ = \"" + strftime("%Y-%m-%d") + "\" \n",
	"__lastEdited__ = \"" + strftime("%Y-%m-%d") + "\" \n"]

    # Otherwise, we have a different file extension and shouldn't write anything to file
    else:
	lines = []

	print "\nThere are no pre-formatted headers for the file extension '" + fileExt + "'\n" + \
	      "If the name of your file is '" + filename + "', you may have forgotten to include an extension\n" + \
	      "A blank file named '" + filename + "' has been created\n"

    # Open file, write lines, close file
    FILE = open(filename, "w")
    FILE.writelines(lines)
    FILE.close()
