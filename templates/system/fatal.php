<?php
/**
 * @package     Joomla.Site
 * @subpackage  Template.system
 *
 * @copyright   Copyright (C) 2005 - 2020 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Symfony\Component\ErrorHandler\ErrorRenderer\HtmlErrorRenderer;

/**
 * Note: This file is only used when unrecoverable errors happen,
 * normally at boot up stages, and therefore it cannot be assumed
 * that any part of Joomla is available (Eg: a Factory or application)
 *
 * For "normal" error handling, use error.php not this file.
 *
 * @var  HtmlErrorRenderer  $this       object containing charset
 * @var  string             $statusText exception error message
 * @var  string             $statusCode exception error code
 */

// allow override to prevent changes being wiped on Joomla upgrade.
if (file_exists(__DIR__ . '/fatal.custom.php'))
{
	include __DIR__ . '/fatal.custom.php';

	return;
}

?>
<html>
<head>
	<meta charset="<?php echo $this->charset; ?>"/>
	<meta http-equiv="Content-Language" content="en-GB">
	<meta name="robots" content="noindex, nofollow">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>An Error Occurred: <?php echo $statusText; ?></title>
	<style>body {
			margin: 0;
			padding: 0;
			font: 14px / 18px sans-serif;
			color: #555;
			background-color: transparent
		}

		html {
			background: #f1f1f1;
			background: -moz-radial-gradient(center, ellipse cover, rgba(241, 241, 241, 1) 0, rgb(255, 185, 185) 100%);
			background: -webkit-radial-gradient(center, ellipse cover, rgba(241, 241, 241, 1) 0, rgb(255, 185, 185) 100%);
			background: radial-gradient(ellipse at center, rgba(241, 241, 241, 1) 0, rgb(255, 185, 185) 100%);
			background-repeat: no-repeat;
			background-attachment: fixed
		}


		.container {
			display: flex;
			flex-direction: column;
			justify-content: center;
			align-items: center;
			position: relative;
			margin: 0 auto;
			width: 100%;
			height: 100vh;
			overflow: hidden
		}

		.alert-main {
			display: block;
			position: relative;
			background: #fff;
			border: 1px solid rgba(0, 0, 0, 0.1);
			border-radius: 5px;
			padding: 20px 60px;
			margin: 0 20px;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.05)
		}

		svg {
			position: absolute;
			bottom: -120px;
			right: -70px;
			width: 400px;
			transform: rotate(10deg);
			z-index: -1
		}

		h1, h2, p {
			position: relative;
			z-index: 10;
			text-align: center;
			text-rendering: optimizeLegibility
		}

		h1 {
			margin: 18px 0 0;
			font-size: 40px;
			font-weight: 200;
			line-height: 1;
			text-shadow: 0 1px 2px rgba(0, 0, 0, .2)
		}

		p, label {
			margin: 10px 0 20px;
			font-size: 18px;
			font-weight: 300;
			line-height: 25px;
			color: #777
		}

		p a {
			font-weight: bold;
			color: #1c3d5c
		}

		@media screen and (max-width: 480px) {
			.container {
				height: auto;
				padding-top: 20px;
				padding-bottom: 20px
			}

			h1 {
				font-size: 30px
			}
		}</style>
</head>
<body>
<div class="container">
	<div class="container-main">
		<div class="alert-main">

			<h1 id="headerText">Sorry, there was a problem we could not recover from.</h1>
			<h2>The server returned a "<?php echo $statusCode . ' ' . $statusText; ?>".</h2>

			<p id="descText1">
				Sorry for any inconvenience caused.
			</p>

			<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
					 viewBox="0 0 74.8 74.8" enable-background="new 0 0 74.8 74.8" xml:space="preserve">
							<g id="brandmark">
								<path id="j-green" fill="red"
											d="M13.5,37.7L12,36.3c-4.5-4.5-5.8-10.8-4.2-16.5c-4.5-1-7.8-5-7.8-9.8c0-5.5,4.5-10,10-10 c5,0,9.1,3.6,9.9,8.4c5.4-1.3,11.3,0.2,15.5,4.4l0.6,0.6l-7.4,7.4l-0.6-0.6c-2.4-2.4-6.3-2.4-8.7,0c-2.4,2.4-2.4,6.3,0,8.7l1.4,1.4 l7.4,7.4l7.8,7.8l-7.4,7.4l-7.8-7.8L13.5,37.7L13.5,37.7z"/>
								<path id="j-orange" fill="red"
											d="M21.8,29.5l7.8-7.8l7.4-7.4l1.4-1.4C42.9,8.4,49.2,7,54.8,8.6C55.5,3.8,59.7,0,64.8,0 c5.5,0,10,4.5,10,10c0,5.1-3.8,9.3-8.7,9.9c1.6,5.6,0.2,11.9-4.2,16.3l-0.6,0.6l-7.4-7.4l0.6-0.6c2.4-2.4,2.4-6.3,0-8.7 c-2.4-2.4-6.3-2.4-8.7,0l-1.4,1.4L37,29l-7.8,7.8L21.8,29.5L21.8,29.5z"/>
								<path id="j-red" fill="red"
											d="M55,66.8c-5.7,1.7-12.1,0.4-16.6-4.1l-0.6-0.6l7.4-7.4l0.6,0.6c2.4,2.4,6.3,2.4,8.7,0 c2.4-2.4,2.4-6.3,0-8.7L53,45.1l-7.4-7.4l-7.8-7.8l7.4-7.4l7.8,7.8l7.4,7.4l1.5,1.5c4.2,4.2,5.7,10.2,4.4,15.7 c4.9,0.7,8.6,4.9,8.6,9.9c0,5.5-4.5,10-10,10C60,74.8,56,71.3,55,66.8L55,66.8z"/>
								<path id="j-blue" fill="red"
											d="M52.2,46l-7.8,7.8L37,61.2l-1.4,1.4c-4.3,4.3-10.3,5.7-15.7,4.4c-1,4.5-5,7.8-9.8,7.8 c-5.5,0-10-4.5-10-10C0,60,3.3,56.1,7.7,55C6.3,49.5,7.8,43.5,12,39.2l0.6-0.6L20,46l-0.6,0.6c-2.4,2.4-2.4,6.3,0,8.7 c2.4,2.4,6.3,2.4,8.7,0l1.4-1.4l7.4-7.4l7.8-7.8L52.2,46L52.2,46z"/>
							</g>
						</svg>
		</div>
	</div>
</div>
</body>
</html>
