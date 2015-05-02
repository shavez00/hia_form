<?php
require('core.php');

$vars = array_merge($_GET, $_POST);

$responses = array();

foreach ($vars as $k => $v) {
    $x = validator::testInput($v);
    $responses[$k] = $x;
}

session_start();

$responses['sessionID'] = $_SESSION['symptoms']['sessionID'];

$_SESSION["present"] = $responses;
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
		<form id="contact-form" action="response.php" method="get">
			<h3>HIA 3</h3>
			<h4>This form should be completed for every case of suspected and confirmed concussion and for any player developing symptoms or signs after the game
that may suggest the development of a delayed concussion. The form is to be completed after two nights’ sleep – including the night of the game.
</h4>
			<div>
				<label>
					<span>Player's Name: <?php echo $_SESSION['symptoms']['player']; ?></span>
					</br>
				</label>
			</div>
			<div>
				<label>
					<span>Competition: (required)</span>
					<input placeholder="Team A versus Team B" type="text" name="competition" tabindex="2" required>
				</label>
			</div>
			<div>
				<label>
					<span>Date of match: (required)</span>
					<input placeholder="Please enter a time" type="date" tabindex="1" name="match" required autofocus>
				</label>
			</div>
			<div>
				<label>
					<span>Kickoff time: (required)</span>
					<input placeholder="Please enter a time" type="text" tabindex="1" name="kickoff" required autofocus>
				</label>
			</div>
			<div>
				<label>
					<span>Team: (required)</span>
					<input placeholder="Please enter the players team name" type="text" name="team" tabindex="2" required>
				</label>
			</div>
			<div>
				<label>
					<span>Age: (required)</span>
					<input placeholder="Please enter the players age" type="number" name="age" tabindex="2" required>
				</label>
			</div>
			<div>
				<label>
					<span>Height: (required)</span>
					<input placeholder="Please enter the players height" type="text" name="height" tabindex="2" required>
				</label>
			</div>
			<div>
				<label>
					<span>Weight: (required)</span>
					<input placeholder="Please enter the players weight" type="number" name="weight" tabindex="2" required>
				</label>
			</div>
			<div>
				<label>
					<span>Was a HIA 1 form completed for this event? (required)</span>
					<select id = "severity" name="HIA1"> 
	              <option value = "No">No</option> 
                <option value = "Yes">Yes</option>
        </select>
				</label>
			</div>
			<div>
				<label>
					<span>Was a HIA 2 form completed for this event? (required)</span>
					<select id = "severity" name="HIA2"> 
	              <option value = "No">No</option> 
                <option value = "Yes">Yes</option>
        </select>
				</label>
			</div>
			<div>
				<label>
					<span>Has this player been previously diagnosed with a concussion? (required)</span>
					<select id = "severity" name="previous_concusion"> 
	              <option value = "No">No</option> 
                <option value = "Yes">Yes</option>
                <option value = "DK">Don't know</option>
        </select>
				</label>
			</div>
			<div>
				<label>
					<span>If yes, how many?</span>
					<input placeholder="Please enter how many" type="number" name="number_concusions" tabindex="2">
				</label>
			</div>
			<div>
				<label>
					<span>Year player began playing Rugby?</span>
					<input placeholder="Please enter year" type="number" name="begin" tabindex="2">
				</label>
			</div>
			<div>
				<label>
					<span>Year player began playing professional Rugby?</span>
					<input placeholder="Please enter year" type="number" name="prof" tabindex="2">
				</label>
			</div>
			</br><h3>Injury mechanism: </h3><h4>A selection MUST be made for each of the four areas, that is ‘Game event’, ‘Collision’, ‘Contact’ and ‘Player technique’:</h4>
			<div>
				<label>
					<span>Game event: (required)</span>
					<select id = "severity" name="event"> 
	              <option value = "Tackling">Tackling</option> 
                <option value = "Being Tackeled">Being Tackled</option>
                <option value = "Ruck">Ruck or Maul</option>
                <option value = "Scrum">Scrum</option>
                <option value = "Unknown">Unknown</option>
        </select>
				</label>
			</div>
			<div>
				<label>
					<span>Collision: (required)</span>
					<select id = "severity" name="collision"> 
	              <option value = "Head/Head">Head/Head</option> 
                <option value = "Head/Shoulder">Head/Shoulder</option>
                <option value = "Head/Upper Limb">Head/Upper Limb</option>
                <option value = "Head/knee or hip">Head/knee or hip</option>
                <option value = "Head/foot">Head/foot</option>
                <option value = "Head/ground">Head/ground</option>
                <option value = "Unknown">Unknown</option>
        </select>
				</label>
			</div>
			<div>
				<label>
					<span>Player technique: (required)</span>
					<select id = "severity" name="technique"> 
	              <option value = "Correct technique">Correct technique</option> 
                <option value = "Head incorrect position">Head incorrect position</option>
                <option value = "Other incorrect technique">Other incorrect technique</option>
                <option value = "Unknown">Unknown</option>
        </select>
				</label>
			</div>
			</br><h3>Additional tool:  </h3><h4>Identify (below) the supportive tool used at this 36-48 hour follow up:</h4>
<table style="width 100%">
  <tr>
    <td>
     <div>
				<label>
				  <span>None</span>
				</label>
			</div>
			</td>
			<td>
			  <input type="checkbox" name="additionalTool[]" value="none">
			</td>
  </tr>
  <tr>
    <td>
      <div>
				<label>
					<span>SCAT3</span>
				</label>
			</div>
	  </td>
		<td>
		  <input type="checkbox" name="additionalTool[]" value="scat3">
	  </td>
  </tr>
  <tr>
     <td>
      <div>
				<label>
					<span>Cog Sport</span>
				</label>
		  </div>
		</td>
		<td>
			  <input type="checkbox" name="additionTool[]" value="Cog Sport">
		</td>
  </tr>
    <tr>
     <td>
      <div>
				<label>
					<span>Headminder</span>
				</label>
		  </div>
		</td>
		<td>
			  <input type="checkbox" name="additionalTool[]" value="Headminder">
		</td>
  </tr>
    <tr>
     <td>
      <div>
				<label>
					<span>Impact</span>
				</label>
		  </div>
		</td>
		<td>
			  <input type="checkbox" name="additionalTool[]" value="Impact">
		</td>
  </tr>
    <tr>
     <td>
      <div>
				<label>
					<span>Other</span>
				</label>
		  </div>
		</td>
  </tr>
</table>
		<div>
				<label>
					<span>Was a HIA 1 form completed for this event? (required)</span>
					<select id = "severity" name="HIA1"> 
	              <option value = "No">No</option> 
                <option value = "Yes">Yes</option>
        </select>
				</label>
			</div>
		</form>
		<!-- /Form -->
		
		</div>
	</div>

	<script src="js/scripts.js"></script>
	
</body>
</html>