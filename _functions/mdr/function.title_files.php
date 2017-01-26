<?php

function Title_Files($Files, $Recursive = true) {

	global $RMD;

	foreach ( $Files as $File => $Title) {

		if (
			is_array($Title) &&
			(
				!$Recursive ||
				empty($Title)
			)
		) {
			unset($Files[$File]);

		} else if ( is_array($Title) ) {
			$Files[$File] = Title_Files($Title, $Recursive);

		} else if ( empty($Title) ) {
			require_once $RMD['Functions'].'/function.url_to_title.php';
			$Files[$File] = url_to_title($File);
		}

	}

	return $Files;

}