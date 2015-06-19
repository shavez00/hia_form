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
	<meta name="author" content="@shavez00">
	<link href="css/style.css" rel="stylesheet">
</head>

<body>
	
	<div class="wrapper">
		<div id="main" style="padding:50px 0 0 0;">
		
		<!-- Form -->
		<form id="contact-form" action="output.php" method="get">
		  <?php if (isset($_SESSION['error'])) echo "<div><label><error>There was an error in your previous form submission, please see error message below<br></error></label></div>"; ?>
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
					<input placeholder="Team A versus Team B" type="text" name="Competition" tabindex="1" required>
				</label>
			</div>
			<div>
				<label>
					<span>Date of match: (required)</span>
					<input placeholder="Please enter a time" type="date" tabindex="2" name="Match" required autofocus>
				</label>
			</div>
			<div>
				<label>
					<span>Kickoff time: (required)</span>
					<input placeholder="Please enter a time" type="text" tabindex="3" name="Kickoff" required autofocus>
				</label>
			</div>
			<div>
				<label>
					<span>Team: (required)</span>
					<input placeholder="Please enter the players team name" type="text" name="Team" tabindex="4" required>
				</label>
			</div>
			<div>
				<label>
				  <?php if ($_SESSION['error'] == "age") echo "<error><br>Please input a two digit age</error>"; ?>
					<span>Age: (required)</span>
					<input placeholder="Please enter the players age" type="number" name="Age" tabindex="5" required>
				</label>
			</div>
			<div>
				<label>
					<span>Height: (required)</span>
					<input placeholder="Please enter the players height" type="text" name="Height" tabindex="6" required>
				</label>
			</div>
			<div>
				<label>
					<span>Weight: (required)</span>
					<input placeholder="Please enter the players weight" type="number" name="Weight" tabindex="7" required>
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
					<select id = "severity" name="Previous Concusion"> 
	              <option value = "No">No</option> 
                <option value = "Yes">Yes</option>
                <option value = "DK">Don't know</option>
        </select>
				</label>
			</div>
			<div>
				<label>
					<span>If yes, how many?</span>
					<input placeholder="Please enter how many" type="number" name="Number of Concusions" tabindex="8">
				</label>
			</div>
			<div>
				<label>
				<?php if ($_SESSION['error'] == "start") echo "<error><br>Please input a four digit year</error>"; ?>
					<span>Year player began playing Rugby?</span>
					<input placeholder="Please enter year" type="number" name="Year started playing" tabindex="9">
				</label>
			</div>
			<div>
				<label>
			  	<?php if ($_SESSION['error'] == "prof") echo "<error><br>Please input a four digit year</error>"; ?>
					<span>Year player began playing professional Rugby?</span>
					<input placeholder="Please enter year" type="number" name="Year started playing professionally" tabindex="10">
				</label>
			</div>
			<div>
				<label>
					<span>Player position: (required)</span>
					<select id = "severity" name="position"> 
	              <option value = "Front Row">Front row (1, 2, 3)</option> 
                <option value = "Second Row">Second row (4, 5)</option>
                <option value = "Back row">Back row (6, 7, 8)</option>
                <option value = "Half backs">Half-backs (9, 10)</option>
                <option value = "Center">Centre (12, 13)</option>
                <option value = "Wing">Wing (11, 14)</option>
                <option value = "Full-back">Full-back (15)</option>
        </select>
				</label>
			</div>
			</br><h3>Injury mechanism: </h3><h4>A selection MUST be made for each of the four areas, that is ‘Game event’, ‘Collision’, ‘Contact’ and ‘Player technique’:</h4>
			<div>
				<label>
					<span>Game event: (required)</span>
					<select id = "severity" name="gameEvent"> 
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
					<select id = "severity" name="Collision"> 
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
					<select id = "severity" name="Technique"> 
	              <option value = "Correct technique">Correct technique</option> 
                <option value = "Head incorrect position">Head incorrect position</option>
                <option value = "Other incorrect technique">Other incorrect technique</option>
                <option value = "Unknown">Unknown</option>
        </select>
				</label>
			</div>
			</br><h3>Additional tool:  </h3><h4>Identify (below) the supportive tool used at this 36-48 hour follow up:</h4>
<table id="concusconf" style="width 100%">
  <tr>
    <td>
      <div>
				<label>
					<span>SCAT3</span>
				</label>
			</div>
	  </td>
		<td>
		  <input type="checkbox" name="AdditionalTool[]" value="scat3">
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
			  <input type="checkbox" name="AdditionTool[]" value="Cog Sport">
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
			  <input type="checkbox" name="AdditionalTool[]" value="Headminder">
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
			  <input type="checkbox" name="AdditionalTool[]" value="Impact">
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
		<td>
			  <input type="checkbox" name="AdditionalTool[]" value="Other">
		</td>
  </tr>
</table>
    <div>
				<label>
					<span>Was the result abnormal?</span>
					<select id = "severity" name="Result"> 
	              <option value = "No">No</option> 
                <option value = "Yes">Yes</option>
        </select>
				</label>
	 </div>
	</br>
	<h3>Diagnostic summary:</h3>
  <div>
				<label>
					<select id = "concusconf" name="Summary"> 
	              <option value = "No residual">Concussion confirmed on game day with no residual signs or symptoms at time of completion of HIA 3</option> 
                <option value = "With signs">Concussion confirmed with signs and/or symptom(s) still present(s) at time of completion of HIA 3</option>
                <option value = "Excluded">Concussion excluded (no sign or symptom of concussion since the injury)</option>
        </select>
				</label>
			</div>
			</br>
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