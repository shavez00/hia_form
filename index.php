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
			     <span>
			        Today's date: <?php echo date("m/d/Y");?>
			     </span>
			  </label>
			</div>
			<div>
				<label>
					<span>Time form completed: (required)</span>
					<input placeholder="Please enter a time" type="text" tabindex="1" name="time" required autofocus>
				</label>
			</div>
			<div>
				<label>
					<span>Physician's Name: (required)</span>
					<input placeholder="Please enter the physicians name" type="text" name="physician" tabindex="2" required>
				</label>
			</div>
			<div>
				<label>
					<span>Player's Name: (required)</span>
					<input placeholder="Please enter the players name" type="text" name="player" tabindex="3" required>
				</label>
			</div>
			</br><h4>To the player: From the kick-off time until now:</h4>
			<h3>HOW MANY</h3>
			<h4>Identify any symptom you have experienced
since the injury or following the Game which is
not usually noted with Rugby.
</h4>
<table style="width 100%">
  <tr>
    <td>
     <div>
				<label>
				  <span>Headaches</span>
				</label>
			</div>
			</td>
			<td>
			  <input type="checkbox" name="symptom[]" value="headaches">
			</td>
  </tr>
  <tr>
    <td>
      <div>
				<label>
					<span>'Pressure in head'</span>
				</label>
			</div>
	  </td>
		<td>
		  <input type="checkbox" name="symptom[]" value="pressure">
	  </td>
  </tr>
  <tr>
     <td>
      <div>
				<label>
					<span>Neck pain</span>
				</label>
		  </div>
		</td>
		<td>
			  <input type="checkbox" name="symptom[]" value="neck pain">
		</td>
  </tr>
    <tr>
     <td>
      <div>
				<label>
					<span>Nausea or vomiting</span>
				</label>
		  </div>
		</td>
		<td>
			  <input type="checkbox" name="symptom[]" value="nausea">
		</td>
  </tr>
    <tr>
     <td>
      <div>
				<label>
					<span>Dizziness</span>
				</label>
		  </div>
		</td>
		<td>
			  <input type="checkbox" name="symptom[]" value="dizziness">
		</td>
  </tr>
    <tr>
     <td>
      <div>
				<label>
					<span>Blurred vision</span>
				</label>
		  </div>
		</td>
		<td>
			  <input type="checkbox" name="symptom[]" value="blurred vision">
		</td>
  </tr>
    <tr>
     <td>
      <div>
				<label>
					<span>Balance problems</span>
				</label>
		  </div>
		</td>
		<td>
			  <input type="checkbox" name="symptom[]" value="balance problems">
		</td>
  </tr>
    <tr>
     <td>
      <div>
				<label>
					<span>Sensitivity to light</span>
				</label>
		  </div>
		</td>
		<td>
			  <input type="checkbox" name="symptom[]" value="sensitivity to light">
		</td>
  </tr>
    <tr>
     <td>
      <div>
				<label>
					<span>Feeling slowed down</span>
				</label>
		  </div>
		</td>
		<td>
			  <input type="checkbox" name="symptom[]" value="feeling slowed down">
		</td>
  </tr>
    <tr>
     <td>
      <div>
				<label>
					<span>Sensitivity to noise</span>
				</label>
		  </div>
		</td>
		<td>
			  <input type="checkbox" name="symptom[]" value="sensitivity to noise">
		</td>
  </tr>
    <tr>
     <td>
      <div>
				<label>
					<span>Feeling like "in a fog"</span>
				</label>
		  </div>
		</td>
		<td>
			  <input type="checkbox" name="symptom[]" value="feeling like in a fog">
		</td>
  </tr>
    <tr>
     <td>
      <div>
				<label>
					<span>"Don't feel right"</span>
				</label>
		  </div>
		</td>
		<td>
			  <input type="checkbox" name="symptom[]" value="don't feel right">
		</td>
  </tr>
    <tr>
     <td>
      <div>
				<label>
					<span>Difficulty concentrating</span>
				</label>
		  </div>
		</td>
		<td>
			  <input type="checkbox" name="symptom[]" value="difficulty concentrating">
		</td>
  </tr>
    <tr>
     <td>
      <div>
				<label>
					<span>Difficulty remembering</span>
				</label>
		  </div>
		</td>
		<td>
			  <input type="checkbox" name="symptom[]" value="difficulty remembering">
		</td>
  </tr>
    <tr>
     <td>
      <div>
				<label>
					<span>Fatigue or low energy</span>
				</label>
		  </div>
		</td>
		<td>
			  <input type="checkbox" name="symptom[]" value="fatigue">
		</td>
  </tr>
    <tr>
     <td>
      <div>
				<label>
					<span>Confusion</span>
				</label>
		  </div>
		</td>
		<td>
			  <input type="checkbox" name="symptom[]" value="confusion">
		</td>
  </tr>
    <tr>
     <td>
      <div>
				<label>
					<span>Drowsiness</span>
				</label>
		  </div>
		</td>
		<td>
			  <input type="checkbox" name="symptom[]" value="drowsiness">
		</td>
  </tr>
    <tr>
     <td>
      <div>
				<label>
					<span>Trouble falling asleep/disturbed sleep</span>
				</label>
		  </div>
		</td>
		<td>
			  <input type="checkbox" name="symptom[]" value="trouble falling asleep">
		</td>
  </tr>
    <tr>
     <td>
      <div>
				<label>
					<span>More emotional</span>
				</label>
		  </div>
		</td>
		<td>
			  <input type="checkbox" name="symptom[]" value="more emotional">
		</td>
  </tr>
    <tr>
     <td>
      <div>
				<label>
					<span>Irritability</span>
				</label>
		  </div>
		</td>
		<td>
			  <input type="checkbox" name="symptom[]" value="irritability">
		</td>
  </tr>
    <tr>
     <td>
      <div>
				<label>
					<span>Sadness</span>
				</label>
		  </div>
		</td>
		<td>
			  <input type="checkbox" name="symptom[]" value="sadness">
		</td>
  </tr>
    <tr>
     <td>
      <div>
				<label>
					<span>Nervous or anxious</span>
				</label>
		  </div>
		</td>
		<td>
			  <input type="checkbox" name="symptom[]" value="nervousness">
		</td>
  </tr>
</table>
			<div>
				<button name="submit" type="submit" id="contact-submit">Next</button>
			</div>
		</form>
		<!-- /Form -->
		
		</div>
	</div>

	<script src="js/scripts.js"></script>
	
</body>
</html>