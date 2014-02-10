<?php

/*
Plugin Name: GData Import
Plugin URI: http://www.ankitsharma.info
Description: Imports Google Spreadsheets Data into a post using shortcode.
Version: 1.0.1
Author: Ankit Sharma
Author URI: http://wwww.ankitsharma.info
*/

function gdataimport_handler($attrib) {
	$demolph_output = gdata_import($attrib);
	return $demolph_output;
}

function gdata_import($attrib) {
	if($attrib["sheet"]=="" || $attrib["worksheet"] == "" || $attrib["user"] == "" || $attrib["pass"] == ""){
		echo('ERROR: SET ALL ATTRIBUTES i.e sheet, worksheet, user and pass. ');
		return;
	}
	// load Zend Gdata libraries
	set_include_path(get_include_path() . PATH_SEPARATOR . WP_PLUGIN_DIR . "//gdata-importer//");
	require_once 'Zend/Loader.php';
	Zend_Loader::loadClass('Zend_Gdata_Spreadsheets');
	Zend_Loader::loadClass('Zend_Gdata_ClientLogin');
	
	// set credentials for ClientLogin authentication
	$user = $attrib["user"];
	$pass = $attrib["pass"];
	
	try {  
		// connect to API
		$service = Zend_Gdata_Spreadsheets::AUTH_SERVICE_NAME;
		$client = Zend_Gdata_ClientLogin::getHttpClient($user, $pass, $service);
		$service = new Zend_Gdata_Spreadsheets($client);
		
		// get spreadsheet entry
		$ssEntry = $service->getSpreadsheetEntry(
				//'https://spreadsheets.google.com/feeds/spreadsheets/ssid');
				//'https://spreadsheets.google.com/feeds/spreadsheets/0ApI94evITOwNdGdvNC1UdkhDT2NaT1hDRGpCN0VBQ2c');
				$attrib["sheet"]);
		
		// get worksheets in this spreadsheet
		$wsFeed = $ssEntry->getWorksheets($attrib["worksheet"]);
	} catch (Exception $e) {
		echo ('ERROR: ' . $e->getMessage());
		return;
	}
	
	$content = <<<HTML
	<table>
HTML;
	
	foreach($wsFeed as $wsEntry):
		//if ($wsEntry->getTitle() == "Sheet1"):
			$rows = $wsEntry->getContentsAsRows();
			foreach ($rows as $row):
				 $content = $content . "<tr>";
					foreach($row as $key => $value): 
					$content = $content . "<td>" .$value . "</td>";
					endforeach;
				 $content = $content . "</tr>";
				endforeach;
		//endif;
	endforeach;
	
	$content = $content . <<<HTML
		</tbody>
	</table>
HTML;
	
	return $content;
}

function cleanClassname($content){
	$content = preg_replace('/\s/', '-', $content);
	$content = strtolower($content);
	return $content; 
}

add_shortcode("gdata_import", "gdataimport_handler");

?>