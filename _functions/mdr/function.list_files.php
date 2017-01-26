<?php

function List_Files($Files, $Recursive = true, $Sub = false) {

	global $RMD;

	$Return = '<ul>';

	foreach ( $Files as $File => $Title ) {

		if ( is_array($Title) ) {

			require_once $RMD['Functions'].'/function.url_to_title.php';
			$Return .= '<li><a href="'.$File.'/"><em>'.url_to_title($File).'</em></a></li>';

			if ( $Recursive ) {
				$Return .= List_Files($Title, $Recursive, $File);
			}

		} else if ( substr($File, -5) != 'index' ) {

			if ( $File != '__NON_RECURSIVE__' ) {
				$Return .= '<li><a href="';
				if ( $Sub ) {
					$Return .= $Sub;
				}
				$Return .= $File.'">'.$Title.'</a></li>';

			} else {
				$Return .= '<li>'.$Title.'</li>';
			}

		}

	}

	$Return .= '</ul>';

	return $Return;

}