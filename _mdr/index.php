<?php



////	General Settings

// How should MDR capitalize titles?
// - 'Words'
// - 'Sentences'
// - 'First'
// - 'All'
// - 'None'
$Settings['Capitalize']['Titles'] = 'Words';

// How should MDR capitalize breadcrumbs?
// - 'Words'
// - 'Sentences'
// - 'First'
// - 'All'
// - 'None'
$Settings['Capitalize']['Breadcrumbs'] = 'All';

// Language
// - 'en'
// - 'tech'
$Settings['Language'] = 'tech';

// Show Source
// - true
// - false
$Settings['Show Source'] = true;



////	Automatic and Advanced Settings
// Figure out what file they're after.

$MDR['Core']            = __DIR__;
$MDR['Root']            = str_replace('/_mdr', '', $MDR['Core']);
$MDR['Templates']       = $MDR['Root'].'/_templates/';

// PHP >= 5.2 Only
$Request['Raw']         = filter_input(INPUT_SERVER, 'REQUEST_URI');
$Request['Exploded']    = explode('?', $Request['Raw']);
$Request['Trimmed']     = trim(rtrim(str_replace('.md', '', $Request['Exploded'][0]), '/'));
$Request['Directory']   = $MDR['Root'].$Request['Trimmed'];
$Request['Markdown']    = $Request['Directory'].'.md';
$Request['Source']      = false;

$Libraries['Parsedown'] = $MDR['Core'].'/Parsedown.php';
$Libraries['ParsedownExtra'] = $MDR['Core'].'/ParsedownExtra.php';

$Templates['Header']    = $MDR['Templates'].'header.php';
$Templates['Footer']    = $MDR['Templates'].'footer.php';

$Assets['Styles']       = '/assets/styles.min.css';



////	Strings and Translations

$Lang['tech']['FILE_NOT_FOUND'] = 'File Not Found.';
$Lang['tech']['NO_FILES_IN_DIRECTORY'] = 'No Files in Directory.';
$Lang['tech']['SOURCE'] = 'Source';

$Lang['en']['FILE_NOT_FOUND'] = 'Sorry, we couldn\'t find that.';
$Lang['en']['NO_FILES_IN_DIRECTORY'] = 'Sorry, we couldn\'t find any files in this folder.';
$Lang['tech']['SOURCE'] = 'Source';







// START READABLE
if (
	is_readable($Request['Directory']) ||
	is_readable($Request['Markdown'])
) {



	// START INDEX
	if ( is_dir($Request['Directory']) ) {

		// TODO Consider loading `index.md` instead.

		// Index Header
		include $Templates['Header'];
		require_once $MDR['Core'].'/function.url_to_title.php';
		$Title = url_to_title($Request['Trimmed']);
		if ( !empty($Title) ) {
			echo '<h2>'.$Title.'</h2>';
		}

		// Find Suitable Files
		require_once $MDR['Core'].'/function.find_files.php';
		$Files = Find_Files($Request['Directory']);
		ksort($Files);

		require_once $MDR['Core'].'/function.title_files.php';
		$Files = Title_Files($Files);

		// List suitable files, or error accordingly.
		if ( empty($Files) ) {
			// Don't 404, because the directory does exist.
			echo '<h3>'.$Lang['en']['NO_FILES_IN_DIRECTORY'].'</h3>';
		} else {
			require_once $MDR['Core'].'/function.list_files.php';
			echo List_Files($Files);
		}

		// Footer
		include $Templates['Footer'];

	// END INDEX



	// START FILE
	} else {

		if ( is_readable($Request['Directory']) ) {
			// Apparently this isn't a directory, just a poorly named file.
			$Content = file_get_contents($Request['Directory']);
			$Request['Source'] = $Request['Directory'];
		} else {
			$Content = file_get_contents($Request['Markdown']);
			$Request['Source'] = $Request['Markdown'];
		}
		$Request['Source'] = str_replace($MDR['Root'], '', $Request['Source']);

		include $Templates['Header'];

		require_once $Libraries['Parsedown'];
		require_once $Libraries['ParsedownExtra'];
		$Parsedown = new ParsedownExtra();
		echo $Parsedown->text($Content);

		include $Templates['Footer'];

	} // END FILE



// END READABLE







// START NON-EXISTANT
} else {

	// Headers MUST be sent before any content.
	header($_SERVER["SERVER_PROTOCOL"].' 404 Not Found');

	include $Templates['Header'];

	require_once $MDR['Core'].'/function.url_to_title.php';
	$Title = url_to_title($Request['Trimmed']);
	if ( !empty($Title) ) {
		echo '<h2>'.$Title.'</h2>';
	}

	echo '<h3>'.$Lang[$Settings['Language']]['FILE_NOT_FOUND'].'</h3>';

	include $Templates['Footer'];

} // END NON-EXISTANT
