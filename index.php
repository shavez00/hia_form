<!DOCTYPE html>
45 minutes
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
		<form id="contact-form" action="/" method="post">
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
					<input placeholder="Please enter a time" type="text" tabindex="1" required autofocus>
				</label>
			</div>
			<div>
				<label>
					<span>Physician's Name: (required)</span>
					<input placeholder="Please enter the physicians name" type="text" tabindex="2" required>
				</label>
			</div>
			<div>
				<label>
					<span>Player's Name: (required)</span>
					<input placeholder="Please enter the players name" type="text" tabindex="3" required>
				</label>
			</div>
			</br><h4>To the player: From the kick-off time until now:</h4>
			<h3>HOW MANY</h3>
			<h4>Identify any symptom you have experienced
since the injury or following the Game which is
not usually noted with Rugby.
</h4>
			<div>
				<label>
					<span>Website: (required)</span>
					<input placeholder="Begin with http://" type="url" tabindex="4" required>
				</label>
			</div>
			<div>
				<label>
					<span>Message: (required)</span>
					<textarea placeholder="Include all the details you can" tabindex="5" required></textarea>
				</label>
			</div>
			<div>
				<button name="submit" type="submit" id="contact-submit">Send Email</button>
			</div>
		</form>
		<!-- /Form -->
		
		</div>
	</div>

	<script src="js/scripts.js"></script>
	
</body>
</html>