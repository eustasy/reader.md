<!DocType html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>MDR</title>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/g/normalize,colors.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Droid+Serif|Open+Sans:400,700|Inconsolata">
		<link rel="stylesheet" href="<?php echo $Assets['Styles']; ?>">
		<style>

			body {
				font-size: 1em;
				margin: 0 auto;
				max-width: 50rem;
				width: 90%;
			}
			footer {
				opacity: 0.7;
				margin: 5rem 0 1rem;
			}

			hr {
				border: none;
				height: 1px;
				background: #c9c9c9;
			}
			hr.fade-the-edges {
				/* IE6-9 */
				filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#ffffff',GradientType=1 );
				/* IE10+ */
				background: -ms-linear-gradient(left,  #ffffff 0%,#c9c9c9 50%,#ffffff 100%);
				/* FF3.6+ */
				background: -moz-linear-gradient(left,  #ffffff 0%, #c9c9c9 50%, #ffffff 100%);
				/* Chrome,Safari4+ */
				background: -webkit-gradient(linear, left top, right top, color-stop(0%,#ffffff), color-stop(50%,#c9c9c9), color-stop(100%,#ffffff));
				/* Chrome10+,Safari5.1+ */
				background: -webkit-linear-gradient(left,  #ffffff 0%,#c9c9c9 50%,#ffffff 100%);
				/* Opera 11.10+ */
				background: -o-linear-gradient(left,  #ffffff 0%,#c9c9c9 50%,#ffffff 100%);
				/* W3C */
				background: linear-gradient(to right,  #ffffff 0%,#c9c9c9 50%,#ffffff 100%);
			}

			h1 span {
				font-size: 1rem;
				opacity: 0.7;
			}
			.breadcrumbs {
				color: #666;
				opacity: 0.7;
			}

			th,
			td {
				padding: .5rem 2rem;
			}
			/*
			tr th:first-child,
			tr td:first-child { padding-left: 1rem; }
			tr th:last-child,
			tr td:last-child { padding-right: 1rem; }
			*/
			tr:nth-child(odd) { background: #fafafa; }
			tr:nth-child(even) { background-color: #efefef; }
			th {
				background: #dfdfdf;
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
					echo '<a href="'.$Request['Source'].'" class="source float-right">';
					echo url_to_title($Lang[$Settings['Language']]['SOURCE'], $Settings['Capitalize']['Breadcrumbs']);
					echo '</a>';
				}
				echo '</p>';
			}