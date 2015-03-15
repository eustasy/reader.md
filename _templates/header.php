<!DocType html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>MDR</title>
		<link rel="stylesheet" href="//cdn.jsdelivr.net/g/normalize,colors.css">
		<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Droid+Serif|Open+Sans:400,700|Inconsolata">
		<link rel="stylesheet" href="<?php echo $Assets['Styles']; ?>">
		<style>
			body {
				font-size: 1em;
				margin: 0 auto;
				max-width: 50rem;
				width: 90%;
			}
			h1 span {
				opacity: 0.7;
				font-size: 1rem;
			}
			ul {
				padding-left: 1.2rem;
			}
			.breadcrumbs {
				opacity: 0.7;
				color: #666;
			}
			.source {
				opacity: 0.7;
			}
			.text-center { text-align: center; }
			.text-left   { text-align: left;   }
			.text-right  { text-align: right;  }
			.float-center {
				float:  none;
				margin: 0 auto;
			}
			.float-left  { float: left; }
			.float-right { float: right; }
		</style>
	</head>
	<body>
		<h1>MDR <span>a markdown document reader and navigator</span></h1>
		<?php
			if ( $Request['Directory'] != $MDR['Root'] ) {

				require_once $MDR['Core'].'/function.breadcrumbs.php';
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
					require_once $MDR['Core'].'/function.url_to_title.php';
					echo '<a href="'.$URL.'">'.url_to_title($Crumb, $Settings['Capitalize']['Breadcrumbs']).'</a>';
				}
				if (
					$Settings['Show Source'] &&
					$Request['Source']
				) {
					require_once $MDR['Core'].'/function.url_to_title.php';
					echo '<a href="'.$Request['Source'].'" class="source float-right">'.url_to_title($Lang[$Settings['Language']]['SOURCE'], $Settings['Capitalize']['Breadcrumbs']).'</a>';
				}
				echo '</p>';
			}