<?php

/**
 * Speedar - The Internet Connection Clock
 * Version 2.0
 * Copyright 2001-2004 Rietta Solutions.
 *
 * This script may be customized for internal use, but may not be
 * distributed to anyone who has not received a license from Rietta
 * Solutions.
 * 
 * CREDITS
 * Concept and core development by Andrew Conner
 * Debugging and server side work by Jonathan Cullifer
 * Project management by Frank Rietta
 */
	 
	/*
	 * Read the HTML template for the results page.
	 * This is the same template that can be customized to change 
	 * the appearance of the results.
	 */
	$aTemplateFile = file("speedar_results.html");
	
	/*
	 * The size of the download sample is specified by the
	 * inspd parameter passed with the page call.  Load the
	 * sample data of the size specified (default is 50 KB).
	 */
	if($inspd == "500") {
		$aSpeedarFile = file("speedar500.inc");
	} else {
		$aSpeedarFile = file("speedar50.inc");
	} // end if
		  

	/*
	 * Define the Javascript code snippets, which will be inserted
	 * into the results page.
	 */
	$KBITS = "<script language=\"JavaScript\"><!--\ndocument.write(kbps);\n//--></script>";
	$KBYTES = "<script language=\"JavaScript\"><!--\ndocument.write(kbytes_sec);\n//--></script>";
	$LINETYPE = "<script language=\"JavaScript\"><!--\ndocument.write(linetype_text);\n//--></script>";
	 
	$STARTTIME = "<script language=\"JavaScript\"><!--\ndocument.write(starttime);\n//--></script>";
	$ENDTIME = "<script language=\"JavaScript\"><!--\ndocument.write(endtime);\n//--></script>";
	$DLTIME = "<script language=\"JavaScript\"><!--\ndocument.write(downloadtime);\n//--></script>";
	$DATASIZE = "<script language=\"JavaScript\"><!--\ndocument.write(kbytes_of_data);\n//--></script>";
	$LINESPEED = "<script language=\"JavaScript\"><!--\ndocument.write(linespeed);\n//--></script>";
	 
	$sOutput = "";
	 
	$nTCount = count($aTemplateFile);
	for($i=0;$i<=$nTCount; $i++) {
	
	      	// Replace key varibles inside the results template
		$aTemplateFile[$i] = str_replace("{kbits}", $KBITS, $aTemplateFile[$i]);
		$aTemplateFile[$i] = str_replace("{kbytes}", $KBYTES, $aTemplateFile[$i]);
		$aTemplateFile[$i] = str_replace("{start time}", $STARTTIME, $aTemplateFile[$i]);
		$aTemplateFile[$i] = str_replace("{end time}", $ENDTIME, $aTemplateFile[$i]);
		$aTemplateFile[$i] = str_replace("{download time}", $DLTIME, $aTemplateFile[$i]);
		$aTemplateFile[$i] = str_replace("{data size}", $DATASIZE, $aTemplateFile[$i]);
		$aTemplateFile[$i] = str_replace("{line speed}", $LINESPEED, $aTemplateFile[$i]);
		$aTemplateFile[$i] = str_replace("{linetype}", $LINETYPE, $aTemplateFile[$i]);
		
		if(stristr($aTemplateFile[$i], "</head") == false) {
			$sOutput .= $aTemplateFile[$i];
		} else {
		       // Insert the Speedar Code
			   $nSpeedCount = count($aSpeedarFile);
	 		   for($sd=0; $sd<=$nSpeedCount; $sd++)
			        $sOutput .= $aSpeedarFile[$sd];
					
			   // Now print the current line
			   $sOutput .= $aTemplateFile[$i];
		} // end if
	} // end for
	 
	/*
	 * Calculate the final size of the HTML being sent to the
	 * browser.  The size will be written to the file in order to
	 * allow the client-side script to properly calculate the
	 * donwload time.
	 */
	$nDataSize = strlen($sOutput) / 1024;

	
	/*
	 * Finally, send the data to the browser.
	 */
	print "<script language=\"JavaScript\">\n var kbytes_of_data = $nDataSize; \n</script>";
	print $sOutput;
	 
?> 




