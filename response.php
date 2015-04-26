<?php
require('core.php');

$vars = array_merge($_GET, $_POST);

$responses = array();

foreach ($vars as $k => $v) {
    $x = validator::testInput($v);
    $responses[$k] = $x;
}

session_start();

$_SESSION["how_much"] = $responses;
//$_SESSION['symptoms'] = $vars['symptom'];

print "<pre>";
 print_r($_SESSION);
 print "</pre>";
?><!---
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Head Injury Assessment Tool</title>
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<meta name="author" content="@toddmotto">
	<link href="css/style.css" rel="stylesheet">
</head>

<body>
	
	<div class="wrapper">
		<div id="main" style="padding:50px 0 0 0;">
		
		<!-- Form --
		<form id="contact-form" action="response.php" method="get">
			<h3>HIA 3</h3>
			<h4>This form should be completed for every case of suspected and confirmed concussion and for any player developing symptoms or signs after the game
that may suggest the development of a delayed concussion. The form is to be completed after two nights’ sleep – including the night of the game.
</h4>
			</br><h4>To the player: From the kick-off time until now:</h4>
			<h3>HOW MUCH</h3>
			<h4>Identify the maximum intensity of
each symptom.</br>1-2 Mild, 3-4 Medium, 5-6 Severe</h4>
<table style="width 100%">
<?php
foreach($vars['symptom'] as $symptom) {
    echo <<<EOT
  <tr>
    <td>
     <div>
				<label>
				  <span>
EOT;
				echo $symptom;
				echo <<<EOT
				  </span>
				</label>
			</div>
			</td>
			<td>
			  <fieldset> 
			    <p> 
			      <select id = "myList"> 
EOT;
echo '<option value = "' . $symptom . '-1">1-Mild</option> 
			          <option value = "' . $symptom . '-2">2-Mild</option> 
			          <option value = "' . $symptom . '-3">3-Medium</option> 
			          <option value = "' . $symptom . '-4">4-Medium</option> 
			          <option value = "' . $symptom . '-5">5-Severe</option> 
			          <option value = "' . $symptom . '-6">6-Severe</option> ';
echo <<<EOT
			      </select> 
			    </p> 
			  </fieldset>
			</td>
  </tr>
EOT;
}
?>
</table>
			<div>
				<button type="submit" id="contact-submit">Next</button>
			</div>
		</form>
		<!-- /Form -->
		
		</div>
	</div>

	<script src="js/scripts.js"></script>
	
</body>
</html>