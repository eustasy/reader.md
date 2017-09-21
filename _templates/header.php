<!DocType html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>RMD</title>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/g/normalize,colors.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Droid+Serif|Open+Sans:400,700|Inconsolata">
		<link rel="stylesheet" href="/assets/elementary.custom.min.css">
		<link rel="stylesheet" href="/assets/rmd.min.css">
	</head>
	<body>
		<h1>RMD <span>a markdown document reader and navigator</span></h1>
		<?php
			if ( $Request['Directory'] != $RMD['Root'] ) {

				require_once $RMD['Functions'].'function.breadcrumbs.php';
				$Crumbs = Breadcrumbs($Request['Trimmed']);

				echo '<p class="breadcrumbs">';
				$First = true;
				foreach ( $Crumbs as $Crumb => $URL ) {
					if ( $First ) {
						echo '/&emsp; ';
						$First = false;
					} else {
						echo ' &emsp;/&emsp; ';
					}
					require_once $RMD['Functions'].'function.url_to_title.php';
					echo '<a href="'.$URL.'">'.url_to_title($Crumb, $Settings['Capitalize']['Breadcrumbs']).'</a>';
				}
				if (
					$Settings['Show Source'] &&
					$Request['Source']
				) {
					require_once $RMD['Functions'].'function.url_to_title.php';
					echo '<a href="'.$Request['Source'].'" class="source float-right">';
					echo url_to_title($Lang[$Settings['Language']]['SOURCE'], $Settings['Capitalize']['Breadcrumbs']);
					echo '</a>';
				}
				echo '</p>';
			}
