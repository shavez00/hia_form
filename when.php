<?php
require('core.php');

$vars = array_merge($_GET, $_POST);

$responses = array();

foreach ($vars as $k => $v) {
    $x = validator::testInput($v);
    $responses[$k] = $x;
}

session_start();

if ($vars == NULL AND $_SESSION['symptoms']['sessionID'] === NULL) header("Location:index.php");

if ($vars == NULL AND isset($_SESSION['symptoms']['sessionID'])) header("Location:how_much.php");

$responses['sessionID'] = $_SESSION['symptoms']['sessionID'];

$_SESSION["how_much"] = $responses;
//$_SESSION['symptoms'] = $vars['symptom'];

/**print "<pre>";
 print_r($_SESSION);
 print "</pre>";*/

//session_unset();
?>
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
		
		<!-- Form -->
		<form id="contact-form" action="how_long.php" method="get">
			<h3>HIA 3</h3>
			<h4>This form should be completed for every case of suspected and confirmed concussion and for any player developing symptoms or signs after the game
that may suggest the development of a delayed concussion. The form is to be completed after two nights’ sleep – including the night of the game.
</h4>
			</br><h4>To the player: From the kick-off time until now:</h4>
			<h3>WHEN</h3>
			<h4>Identify when you
started to feel each
symptom identified.</h4>
<table style="width 100%">
<?php
foreach($_SESSION['symptoms']['symptoms'] as $symptom) {
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
EOT;
	echo '<select id = "severity" name="' . $symptom . '-how_long"> 
                <option value = "During match, immediately">During match, immediately</option> 
			          <option value = "During match, later">During match, later</option> 
			          <option value = "Post match, same day">Post match, same day</option> 
			          <option value = "Post match, days later">Post match, days later</option> 
			      </select> ';
echo <<<EOT
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