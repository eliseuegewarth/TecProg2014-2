<?php
	
	$FILE_NAME = $_SERVER['PHP_SELF']; //Constant - File Name 
	$EXPLODE_FILE_NAME = explode("/",$FILE_NAME,5);
	echo "/* file: " . $EXPLODE_FILE_NAME[4] . "*/";
	/*
	* GNU GENERAL PUBLIC LICENSE / Version 2, June 1991
	* Copyright (C) 1989, 1991 Free Software Foundation, Inc., <http://fsf.org/>
 	* 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA
 	* Everyone is permitted to copy and distribute verbatim copies.
	*/