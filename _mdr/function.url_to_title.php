<?php



function url_to_title($Location, $Capitalize_Override = false) {



	global $MDR, $Settings;



	$Capitalize_Possible = array('Words', 'Sentences', 'First', 'All', 'None');



	if (
		$Capitalize_Override &&
		in_array($Capitalize_Override, $Capitalize_Possible)
	) {
		$Capitalize = $Capitalize_Override;

	} else {
		$Capitalize = $Settings['Capitalize']['Titles'];
	}



	$Title = strtolower(trim(str_replace(array('/', '_', '-'), array(' ', ' ', ' '), trim($Location, '/'))));



	if ( $Capitalize == 'Words' ) {
		$Title = ucwords($Title);

	} else if ( $Capitalize == 'Sentences' ) {
		require_once $MDR['Core'].'/function.ucsentences.php';
		$Title = ucsentences($Title);

	} else if ( $Capitalize == 'First' ) {
		$Title = ucfirst($Title);

	} else if ( $Capitalize == 'All' ) {
		$Title = strtoupper($Title);
	}



	return $Title;



}