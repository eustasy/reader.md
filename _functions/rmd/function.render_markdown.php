<?php

function Render_Markdown($Source) {

	global $Lang, $Libraries, $RMD, $Request, $Settings, $Templates;

	$Request['Source'] = $Source;
	$Request['Source'] = str_replace($RMD['Root'], '', $Request['Source']);
	include $Templates['Header'];

	$Content = file_get_contents($Source);
	require_once $Libraries['Parsedown'];
	require_once $Libraries['ParsedownExtra'];
	$Parsedown = new ParsedownExtra();
	echo $Parsedown->text($Content);

	include $Templates['Footer'];

}