<?php

////	!IMPORTANT: Copy this file to _settings/rmd.custom.php for editing.

////	General Settings

// How should RMD capitalize things?
// - 'Words'
// - 'Sentences'
// - 'First'
// - 'All'
// - 'None'
$Settings['Capitalize']['Titles'] = 'Words';
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

$RMD['Settings']        = __DIR__;
$RMD['Root']            = str_replace('/_settings', '', $RMD['Settings']);
$RMD['Libs']            = $RMD['Root'].'/_libs/';
$RMD['Functions']       = $RMD['Root'].'/_functions/rmd/';
$RMD['Templates']       = $RMD['Root'].'/_templates/';

$Request['Raw']         = filter_input(INPUT_SERVER, 'REQUEST_URI');
$Request['Exploded']    = explode('?', $Request['Raw']);
$Request['Trimmed']     = trim(rtrim(str_replace('.md', '', $Request['Exploded'][0]), '/'));
$Request['Directory']   = $RMD['Root'].$Request['Trimmed'];
$Request['Markdown']    = $Request['Directory'].'.md';
$Request['Source']      = false;

$Libraries['Parsedown'] = $RMD['Libs'].'Parsedown.php';
$Libraries['ParsedownExtra'] = $RMD['Libs'].'ParsedownExtra.php';

$Templates['Header']    = $RMD['Templates'].'header.php';
$Templates['Footer']    = $RMD['Templates'].'footer.php';



////	Strings and Translations

$Lang['tech']['FILE_NOT_FOUND'] = '404: File Not Found.';
$Lang['tech']['NO_FILES_IN_DIRECTORY'] = 'No Files in Directory.';
$Lang['tech']['SOURCE'] = 'Source';

$Lang['en']['FILE_NOT_FOUND'] = 'Sorry, we couldn\'t find that.';
$Lang['en']['NO_FILES_IN_DIRECTORY'] = 'Sorry, we couldn\'t find any files in this folder.';
$Lang['en']['SOURCE'] = 'Source';
