<!DOCTYPE html>
<html lang="en">
	<head>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> <!-- JQ library for $function -->
		<script defer src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script> <!-- UI for drag and drop menu, which can be deferred -->
		<script async src="/getCoding/fadeTo.js"></script> <!-- my background fade API -->
		<script async src="/getCoding/jquery.js"></script> <!-- async allows import to start as soon as the JQ library is loaded and before the DOM is ready -->
		<link rel="shortcut icon" href="favicon.ico">
		<link rel="icon" href="favicon.ico">
		<title>Full Stack Software Developer</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<style>
			/************** Global settings *************/
			* {
				box-sizing: border-box;
				padding: 0;
			}
			/***************** List margins *************/
			#text ul > li, #text ol > li {
				margin-left: 1em;
			}
			#text li > ul, #text li > ol {
				margin-left: 2em;
			}
			nav li > ul, nav ul > li {
				margin-left: 0.5em;
			}
			/********************************************/
			body {
				/************ Grid Settings *************/
				display: grid;
				grid-template-rows: repeat(3, auto);
				grid-template-columns: 1fr 4fr 1fr;
				grid-column-gap: 2em;
				grid-row-gap: 1em;
				grid-template-areas:
					"top top top"
					"left centre right"
					"bottom bottom bottom";
				/****************************************/
				font-family: 'sans serif', 'serif';
			}
			#headline {
				display: flex;
				justify-content: space-between;
			}
			/********************* Top Nav Bar **********/
			#jump {
				position: fixed;
				left: 33%;
			}
			#jump ul, #jump ul li {
				display: inline;
			}
			#jump ul li {
				border: 1px solid lightgrey;
				text-align: center;
				padding: 0.5em 1em 0.5em 1em;
			}
			/********************************************/
			header {
				grid-area: top;
				background-color: #efefef;
				padding: 0.5em;
				box-shadow: 1px 2px 4px black, -1px -2px 4px black;
			}
			header h1, header h3 {
				text-align: center;
			}
			#nav-left, #nav-right {
				padding: 0.5em;
			}
			#nav-left {
				grid-area: left;
			}
			#nav-left table {
				border-collapse: collapse;
				border: 5px solid #eeeeee;
				text-align: center;
				box-shadow: 2px 2px 4px black;
			}
			#nav-left table tr td {
				border: 1px solid white;
				background-color: #eeeeee;
			}
			#nav-left table tbody {
				font-size: 80%;
			}
			#nav-left table tbody td {
				width: 33%;
			}
			#nav-right {
				grid-area: right;
			}
			#nav-right ul, #nav-left ul {
				text-align: left;
				font-size: 12pt;
				line-height: 26px;
			}
			#nav-right ul li, #nav-left ul li {
				border-bottom: 1px solid white;
				display: block;
				background-color: #eeeeee;
				padding-left: 0.5em;
				box-shadow: 2px 2px 4px black;
			}
			#nav-right ul li ul li, #nav-left ul li ul li {
				padding-left: 3%;
				padding-right: 10%;
				width: 100%;
				border-bottom: 1px solid /*yellow*/;
				background-color: #dddddd;
				/*color: yellow;*/
			}
			.bullet_list {
				list-style-type: circle;
			}
			form {
				position: absolute;
				left: 18%;
				bottom: 20%;
			}
			main {
				grid-area: centre;
				line-height: 200%;
			}
			main h4 {
				font-weight: bold;
			}
			img {
				margin-left: 10%;
			}
			/*article ol li {
				padding-bottom: 1%;
			}*/
			footer {
				grid-area: bottom;
			}
			/*#notelink {
				position: fixed;
				width: 15%;
				text-align: center;
			}*/
			.headline {
				font-weight: bold;
				font-style: italic;
			}
			/************* Pseudo classes ************/
			nav a:link {
				color: inherit;
				text-decoration: none;
			}
			/*.text a:link {
				text-decoration: underline;
				color: inherit;
			}*/
			/*nav a:active, #jump a:active, .text a:active {
				color: green;
			}
			.text a:visited, nav a:visited, .text a:visited {
				color: grey;
			}
			nav a:hover, #jump a:hover, .text a:hover {
				color: red;
			}*/
			/************** Drop-Down Menu *****************/
			.dropDown {
				min-width: 40px;
			}
			/************** Responsive Design *************/
			@media (max-width: 1000px) {
				table {
					display: none;
				}
				root {
					width: 100vw;
				}
				body {
					display: grid;
					grid-template-rows: auto auto 1fr auto;
					grid-template-columns: 1fr 5fr;
					grid-column-gap: 2em;
					grid-row-gap: 1em;
					grid-template-areas:
					"top top"
					"left centre"
					"right centre"
					"bottom bottom";
				}
				#jump {
					display: none;
				}
			}
			/***********************************************/
			hr {
				color: #eeeeee;
			}
			/*************** Figure Flexbox ****************/
			.fig-flex {
				display: flex;
				justify-content: center;
			}
			/****** Paragraph First Letter Pseudo Class ******/
			p:first-of-type::first-letter, hr+p::first-letter {
				font-size: 1.5em;
			}
			/******* Links First Letter Pseudo Class *********/
			.link::first-letter {
				font-size: 1.2em;
			}
			/*************************************************/
		</style>
	</head>
	<body>
		<!--<main>-->
			<header>
				<div id="headline">
				<?php
					// Retrieve IP from SERVER
					function getUserIpAddr(){
  						if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
     						//ip from shared internet
     						$ip = $_SERVER['HTTP_CLIENT_IP'];
  						}
  						elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
     						//ip pass from proxy
     						$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
  						}
  						else {
     						$ip = $_SERVER['REMOTE_ADDR'];
  						}
  						return $ip;
					}
					$my_ip = getUserIpAddr();
					// Read IP record and visitors log files and add them to separate arrays
					$open_my_ip = fopen("ip_record/myIp.txt", "w");
					$string_my_ip = fgets($open_my_ip);
					$array_my_ip = explode(', ', $string_my_ip);
					// See if my IP is already registered
					$found_my_ip = (in_array($my_ip, $array_my_ip, true)) ? 1 : 0;
					if ($found_my_ip !== 1) {
						fwrite($open_my_ip, getUserIpAddr());
						fclose($open_my_ip);
					}
					else {
						fclose($open_my_ip);
					}
					echo "My IP address ".getUserIpAddr();
				?>
				<span id="clock"></span>
				</div>
				<h1>Becoming a Full Stack Software Developer</h1>
				<nav id="jump">
					<ul>
						<li><a href="#js_head">JavaScript</a></li>
						<li><a href="#css_head">CSS3</a></li>
						<li><a href="#html_head">HTML5</a></li>
						<li><a href="#react_head">React</a></li>
						<li><a href="#php_head">PHP</a></li>
						<li><a href="#terminal_head">Terminal</a></li>
						<li><a href="#azure_head">Azure IoT</a></li>
						<li><a href="#notes_head">Notes</a></li>
					</ul>
				</nav>
			</header>
			<main id="text">

				<h2 id="js_head">JavaScript - 22 Apr 20</h2>
				<hr>
				<article id="js"></article>

				<h2 id="css_head">CSS3 - 22 Apr 20</h2>
				<hr>
				<article id="css"></article>

				<h2 id="html_head">HTML - 22 Apr 20</h2>
				<hr>
				<article id="html"></article>

				<h2 id="react_head">React - 15 Nov 20</h2>
				<hr>
				<article id="react"></article>

				<h2 id="php_head">PHP - 22 Apr 20</h2>
				<hr>
				<article id="php"></article>

				<h2 id="terminal_head">Terminal - 15 Oct 20</h2>
				<hr>
				<article id="terminal"></article>

				<h2 id="azure_head">Microsoft Azure IoT Certification Course - 21 Apr 20</h2>
				<hr>
				<article id="azure"></article>

				<h2 id="notes_head">Notes</h2>
				<hr>
				<article id="notes"></article>

			</main>
			<nav id="nav-left">
				<ul>
					<li class="headline">Exams and Certificates</li>
					<li><span class="link">&#10551; Certifications</span>
						<ul class="dropDown">
							<li><a href="https://www.roberthalf.com/blog/salaries-and-skills/which-it-certifications-are-most-valuable" target="_blank">2020 Cert Ranking</a></li>
							<li><a href="https://www.freecodecamp.org" target="_blank">freeCodeCamp.org</a></li>
							<li><a href="https://www.microsoft.com/en-us/learning/mcse-certification.aspx" target="_blank">Microsoft</a></li>
							<li><a href="https://www.cisco.com/c/en/us/training-events/training-certifications/certifications.html" target="_blank">Cisco</a></li>
							<li><a href="https://pythoninstitute.org/certification/" target="_blank">Python</a></li>
						</ul>
					<li><span class="link">&#10551; Exams</span>
						<ul class="dropDown">
							<li><a href="https://www.javascriptinstitute.org/purchase-exam-voucher/" target="_blank">JavaScript Exam</a></li>
							<li><a href="https://pythoninstitute.org/learn-and-take-exams-from-home-covid-19-updates/" target="_blank">Python Exam</a></li>
							<li><span class="link">&#10551; Microsoft Exams</span>
								<ul class="dropDown">
									<li><a href="https://www.microsoft.com/en-us/learning/exam-70-480.aspx" target="_blank">HTML5, CSS, JS</a></li>
									<li><a href="https://www.microsoft.com/en-us/learning/exam-98-361.aspx" target="_blank">Software Development</a></li>
									<li><a href="https://www.microsoft.com/en-us/learning/exam-98-364.aspx" target="_blank">Database Fundamentals</a></li>
									<li><a href="https://www.microsoft.com/en-us/learning/exam-98-366.aspx" target="_blank">Network Fundamentals</a></li>
									<li><a href="https://www.microsoft.com/en-us/learning/exam-98-367.aspx" target="_blank">Security Fundamentals</a></li>
									<li><a href="https://www.microsoft.com/en-us/learning/exam-98-375.aspx" target="_blank">HTML dev Fundamentals</a></li>
									<li><a href="https://www.microsoft.com/en-us/learning/exam-list.aspx" target="_blank">List of Exams</a></li>
								</ul>
							</li>
						</ul>
					</li>
					<li><a href="https://azure.microsoft.com/sv-se/overview/iot/" target="_blank">Azure IoT course</a></li>
					<li><a href="https://www.pitman-training.ie/our-courses/it/it-courses-incl-aplus/" target="_blank">Pitman Training Courses</a></li>
					<li><a href="https://alison.com/courses/software-development" target="_blank">Alison Free Online Courses</a></li>
				</ul>
				<ul>
					<li class="headline">Libraries</li>
					<li><span class="link">&#10551; JavaScript libraries</span>
						<ul class="dropDown">
							<li><a href="http://www.script.aculo.us" target="_blank">Aculous</a></li>
							<li><a href="https://getbootstrap.com/" target="_blank">Bootstrap</a></li>
							<li><a href="https://dojotoolkit.org" target="_blank">Dojo</a></li>
							<li><a href="https://plugins.jquery.com/" target="_blank">JQuery</a></li>
							<li><a href="http://www.prototypejs.org/" target="_blank">Prototype</a></li>
							<li><a href="https://yuilibrary.com/" target="_blank">Yahoo!</a></li>
							<li><a href="https://developers.google.com/speed/libraries/#libraries">Google hosted Libraries</a></li>
						</ul>
					</li>
				</ul>
				<ul>
					<li class="headline">Other stuff</li>
					<li><span class="link">&#10551; My Electric Boat Page</span>
						<ul class="dropDown">
							<li><a href="https://electrifiedboat.com/index.php" target="_blank">Index</a></li>
							<li><a href="https://electrifiedboat.com/boat.html" target="_blank">Boat</a></li>
							<li><a href="https://electrifiedboat.com/diesel.html" target="_blank">Diesel</a></li>
							<li><a href="https://electrifiedboat.com/electrics.html" target="_blank">Electrics</a></li>
							<li><a href="https://electrifiedboat.com/arduino.html" target="_blank">Arduino</a></li>
							<li><a href="https://electrifiedboat.com/power.html" target="_blank">Power</a></li>
							<li><a href="https://electrifiedboat.com/cost.html" target="_blank">Cost</a></li>
						</ul>
					</li>
					<li><a href="https://electrifiedboat.com/getCoding/empty.html" target="_blank">Console Test Page</a></li>
					<li><a href="https://cpanel62.proisp.no:2083/" target="_blank">cPanel login</a></li>
					<li><a href="https://www.theguardian.com/international" target="_blank">The Guardian</a></li>
				</ul>
				<table>
					<thead>
						<tr>
							<th colspan="3">Timeline</th>
						</tr>
						<tr>
							<td>Subject</td><td>Started</td><td>Finished</td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Web Design</td><td>23.Mar20</td><td>xxxxxxxx</td>
						</tr>
						<tr>
							<td>Node.js</td><td>05.Jul20</td><td>xxxxxxxx</td>
						</tr>
						<tr>
							<td>TypeScript</td><td>27.Jun20</td><td>xxxxxxxx</td>
						</tr>
						<tr>
							<td>Angular</td><td>30.Aug20</td><td>xxxxxxxx</td>
						</tr>
						<tr>
							<td>React</td><td>15.Nov20</td><td>xxxxxxxx</td>
						</tr>
						<tr>
							<td>Python</td><td>29.Dec20</td><td>xxxxxxxx</td>
						</tr>
						<tr>
							<td>Vue</td><td>xxxxxxxx</td><td>xxxxxxxx</td>
						</tr>
						<tr>
							<td>C++</td><td>xxxxxxxx</td><td>xxxxxxxx</td>
						</tr>
						<tr>
							<td>Java</td><td>xxxxxxxx</td><td>xxxxxxxx</td>
						</tr>
					</tbody>
				</table>
			</nav>
			<nav id="nav-right">
				<ul id="goals">
					<li class="headline">Goals</li>
					<li>Certificate in Web Design</li>
					<li>Learn Node.js</li>
					<li>Learn TypeScript and Nest.js</li>
					<li>Learn Angular</li>
					<li>Learn React</li>
					<li>Learn Vue</li>
					<li>Learn C++</li>
					<li>Learn Java</li>
				</ul>
				<ul>
					<li class="headline">Resources</li>
					<li><a href="https://www.freecodecamp.org" target="_blank">freeCodeCamp.org</a></li>
					<li><a href="https://regexone.com/lesson/letters_and_digits" target="_blank">RegExOne</a></li>
					<li><a href="http://www.json.org" target="_blank">JSON</a></li>
					<li><a href="http://www.php.net/" target="_blank">PHP manual</a></li>
					<li><a href="https://www.certify-tco.org/samples/" target="_blank">TeleCom Course</a></li>
					<li><div class="link">&#10551; W3Schools.com</div>
						<ul class="dropDown">
							<li><a href="https://www.w3schools.com/html/" target="_blank">HTML Tutorial</a></li>
							<li><a href="https://www.w3schools.com/css/" target="_blank">CSS Tutorial</a></li>
							<li><a href="https://www.w3schools.com/js/" target="_blank">JavaScript Tutorial</a></li>
							<li><a href="https://www.w3schools.com/cert/default.asp" target="_blank">Certifications</a></li>
						</ul>
					</li>
					<li><a href="https://github.com/tomstor82" target="_blank">GitHub</a></li>
					<li><a href="http://tools.dynamicdrive.com/favicon/" target="_blank">Create favicon</a></li>
				</ul>
				<ul>
					<li class="headline">Reference & Validate</li>
					<li><a href="https://www.toptal.com/designers/htmlarrows/" target="_blank">HTML Symbols</a></li>
					<li><a href="https://www.canva.com/colors/color-wheel/" target="_blank">Color Wheel</a></li>
					<li><a href="https://validator.w3.org/nu/" target="_blank">HTML & CSS Validator</a></li>
					<li><a href="https://codebeautify.org/jsvalidate" target="_blank">JavaScript Validator</a></li>
					<li><a href="https://phpcodechecker.com/" target="_blank">PHP Validator</a></li>
				</ul>
			</nav>
			<!--<nav id="notelink">
				<ul>
					<li class="headline">Jump to</li>
					<li><a href="#js_head">JavaScript</a></li>
					<li><a href="#css_head">CSS3</a></li>
					<li><a href="#html_head">HTML5</a></li>
					<li><a href="#php_head">PHP</a></li>
					<li><a href="#azure_head">Azure IoT</a></li>
					<li><a href="#notes_head">Notes</a></li>
				</ul>
				<button type="button" id="inputText" onclick="inputText();">Click to add text</button>
				</nav>-->
			<footer>
			</footer>
		<!--</main>-->
		<!--<script src="/getCoding/getCoding.js"></script>-->
	</body>
</html>