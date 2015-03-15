<?php

function ucsentences($string) {

	$sentences = preg_split('/([.?!—]+)/', $string, -1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);

	$new_string = '';
	foreach ($sentences as $key => $sentence) {
		if ( ( $key & 1 ) == 0 ) {
			$new_string .= ucfirst(strtolower(trim($sentence)));
		} else {
			$new_string .= $sentence.' ';
		}
	}

	return trim($new_string);

}