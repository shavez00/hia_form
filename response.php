<?php

session_start();

//include 'session.php';

//session_unset();

define( "DB_DSN", "mysql:host=localhost;dbname=hia" ); //this constant will be use as our connectionstring/dsn

define( "DB_USERNAME", "shavez00" ); //username of the database
define( "DB_PASSWORD", "morgan08" ); //password of the database


$playerSet = "INSERT INTO player (name, age, height, weight, begin, professional) VALUES (:name, :age, :height, :weight, :begin, :professional)";

try {
    $con = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $con->prepare( $playerSet );
    $stmt->bindValue( ':name', $_SESSION['symptoms']['player'], PDO::PARAM_STR );
    $stmt->bindValue( ':age', $_SESSION['playerInfo']['Age'], PDO::PARAM_STR );
    $stmt->bindValue( ':height', $_SESSION['playerInfo']['Height'], PDO::PARAM_STR );
    $stmt->bindValue( ':weight', $_SESSION['playerInfo']['Weight'], PDO::PARAM_STR );
    $stmt->bindValue( ':begin', $_SESSION['playerInfo']['Year_started_playing'], PDO::PARAM_STR );
    $stmt->bindValue( ':professional', $_SESSION['playerInfo']['Year_started_playing_professionally'], PDO::PARAM_STR );
    //var_dump($stmt);
    $stmt->execute();
}  catch (PDOException $e) {
   echo $e->getMessage();
}


$playerQuery = "Select * from player WHERE name = :name AND age = :age AND height = :height AND weight = :weight AND begin = :begin AND professional = :professional";

try {
    $stmt = $con->prepare( $playerQuery);
    $stmt->bindValue( ':name', $_SESSION['symptoms']['player'], PDO::PARAM_STR );
    $stmt->bindValue( ':age', $_SESSION['playerInfo']['Age'], PDO::PARAM_STR );
    $stmt->bindValue( ':height', $_SESSION['playerInfo']['Height'], PDO::PARAM_STR );
    $stmt->bindValue( ':weight', $_SESSION['playerInfo']['Weight'], PDO::PARAM_STR );
    $stmt->bindValue( ':begin', $_SESSION['playerInfo']['Year_started_playing'], PDO::PARAM_STR );
    $stmt->bindValue( ':professional', $_SESSION['playerInfo']['Year_started_playing_professionally'], PDO::PARAM_STR );
    //var_dump($stmt);
    $stmtExec = $stmt->execute();
    $playerIdResult = $stmt->fetch(PDO::FETCH_OBJ);
    /**print"<pre>";
    print_r($playerIdResult);
    print"</pre>";*/
}  catch (PDOException $e) {
   echo $e->getMessage();
}

try {
		$incidentSet = 'INSERT INTO incident (playerid, competition, date, kickoff, Team, HIA1, HIA2, previousConcusion, numberOfConcusions, gameEvent, position, Collision, Technique, additionalTool, Abnormal, Summary) 
		     VALUES (:playerid, :competition, :date, :kickoff, :team, :hia1, :hia2, :previousConcusion, :numberOfConcusions, :gameEvent, :position, :collision, :technique, :additionalTool, :abnormal, :summary)' ;
		$stmt = $con->prepare( $incidentSet );
		
		$stmt->bindValue( ':playerid', $playerIdResult->playerid, PDO::PARAM_INT );
		$stmt->bindValue( ':competition', $_SESSION['playerInfo']['Competition'], PDO::PARAM_STR );
		$stmt->bindValue( ':date', $_SESSION['playerInfo']['Match'], PDO::PARAM_STR );
		$stmt->bindValue( ':kickoff', $_SESSION['playerInfo']['Kickoff'], PDO::PARAM_STR );
		$stmt->bindValue( ':team', $_SESSION['playerInfo']['Team'], PDO::PARAM_STR );
		($_SESSION['playerInfo']['HIA1'] == "Yes") ? $stmt->bindValue( ':hia1', 1, PDO::PARAM_BOOL ) : $stmt->bindValue( ':hia1', 0, PDO::PARAM_BOOL );
		($_SESSION['playerInfo']['HIA2'] == "Yes") ? $stmt->bindValue( ':hia2', 1, PDO::PARAM_BOOL ) : $stmt->bindValue( ':hia2', 0, PDO::PARAM_BOOL );
    ($_SESSION['playerInfo']['Previous_Concusion'] == "Yes") ? $stmt->bindValue( ':previousConcusion', 1, PDO::PARAM_BOOL ) : $stmt->bindValue( ':previousConcusion', 0, PDO::PARAM_BOOL );
    ($_SESSION['playerInfo']['Previous_Concusion'] == "Yes") ? $stmt->bindValue( ':numberOfConcusions', $_SESSION['playerInfo']['Number_of_Concusions'] , PDO::PARAM_BOOL ) : $stmt->bindValue( ':numberOfConcusions', 0, PDO::PARAM_BOOL );
		$stmt->bindValue( ':gameEvent', $_SESSION['playerInfo']['gameEvent'], PDO::PARAM_STR );
		$stmt->bindValue( ':position', $_SESSION['playerInfo']['position'], PDO::PARAM_STR );
		$stmt->bindValue( ':collision', $_SESSION['playerInfo']['Collision'], PDO::PARAM_STR );
		$stmt->bindValue( ':technique', $_SESSION['playerInfo']['Technique'], PDO::PARAM_STR );
		
		$toolList = implode (",", $_SESSION['playerInfo']['additionalTool']);
		$stmt->bindValue( ':additionalTool', $toolList, PDO::PARAM_STR );
		
		$result = $_SESSION['playerInfo']['Result'] == "Yes" ? '1' : '0';
		$stmt->bindValue( ':abnormal', $result, PDO::PARAM_BOOL );

		$stmt->bindValue( ':summary', $_SESSION['playerInfo']['Summary'], PDO::PARAM_STR );
		
		$stmt->execute();
		//$stmt->debugDumpParams();
} catch (Exception $e) {
     echo $e->getMessage();
}


$incidentQuery = "Select * from incident WHERE playerid = :playerid";

try {
    $stmt = $con->prepare( $incidentQuery);
    $stmt->bindValue( ':playerid', $playerIdResult->playerid, PDO::PARAM_INT );
    $stmtExec = $stmt->execute();
    $incidentResult = $stmt->fetch(PDO::FETCH_OBJ);
    /**print"<pre>";
    print_r($incidentResult);
    print"</pre>";*/
}  catch (PDOException $e) {
   echo $e->getMessage();
}

try {
	  $symptomList = 'incident, playerid';
	  $symptomValueList = ':incident, :playerid';
	
    foreach ($_SESSION['symptoms']['symptoms'] as $k => $v) {
			      $symptomList = $symptomList . ", `" . $v . "`";
		        $symptomValueList = $symptomValueList . ', :' . $v;
		        $symptomValueList = str_replace(' ', '', $symptomValueList);
    }

    foreach ($_SESSION['how_much'] as $k => $v) {
	      if ($k !== "sessionID") {
		        $symptomList = $symptomList . ", `" . $k . "`";
		        $a = str_replace('-', '', $k);
		        $symptomValueList = $symptomValueList . ', :' . $a;
		    }
		 }

		foreach ($_SESSION['when'] as $k => $v) {
	      if ($k !== "sessionID") {
		        $symptomList = $symptomList . ", `" . $k . "`";
		        $a = str_replace('-', '', $k);
		        $symptomValueList = $symptomValueList . ', :' . $a;
		    }
		 }

		foreach ($_SESSION['how_long'] as $k => $v) {
	      if ($k !== "sessionID") {
		        $symptomList = $symptomList . ", `" . $k . "`";
		        $a = str_replace('-', '', $k);
		        $symptomValueList = $symptomValueList . ', :' . $a;
		    }
		 }

		foreach ($_SESSION['present'] as $k => $v) {
	      if ($k !== "sessionID") {
		        $symptomList = $symptomList . ", `" . $k . "`";
		        $a = str_replace('-', '', $k);
		        $symptomValueList = $symptomValueList . ', :' . $a;
		    }
		 }
		
		if ($_SESSION['symptoms']['Anterograde_Amnesia'] == "Yes") {
		    $symptomList = $symptomList . ", ANTEROGRADE";
		    $symptomValueList = $symptomValueList . ', :ANTEROGRADE';
		    $symptomList = $symptomList . ", `ANTEROGRADE duration`";
		    $symptomValueList = $symptomValueList . ', :Anterograde_Amnesia_duration';
		}
		
		if ($_SESSION['symptoms']['Retrograde_Amnesia'] == "Yes") {
		    $symptomList = $symptomList . ", RETROGRADE";
		    $symptomValueList = $symptomValueList . ', :RETROGRADE';
		    $symptomList = $symptomList . ", `RETROGRADE duration`";
		    $symptomValueList = $symptomValueList . ', :Retrograde_Amnesia_duration';
		}

		$symptomSet = 'INSERT INTO symptoms (' . $symptomList . ') VALUES (' . $symptomValueList . ')' ;
		$stmt = $con->prepare( $symptomSet );
		
		$stmt->bindValue( ':playerid', $playerIdResult->playerid, PDO::PARAM_INT );
		$stmt->bindValue( ':incident', $incidentResult->incident, PDO::PARAM_INT );
		
		foreach ($_SESSION['symptoms']['symptoms'] as $k => $v) {
	      if ($k == 0) {
		        $v = str_replace(' ', '', $v);
		        $stmt->bindValue( ':' . $v, 1, PDO::PARAM_BOOL );		
		    }  else {
			      $v = str_replace(' ', '', $v);
			      $stmt->bindValue( ':' . $v, 1, PDO::PARAM_BOOL );
		    }
    }
		
		foreach ($_SESSION['how_much'] as $k => $v) {
	      if ($k !== "sessionID") {
		        $k = str_replace('-', '', $k);
		        $stmt->bindValue( ':' . $k, $v, PDO::PARAM_INT );
		    }
		}

		foreach ($_SESSION['when'] as $k => $v) {
	      if ($k !== "sessionID") {
		        $k = str_replace('-', '', $k);
		        $stmt->bindValue( ':' . $k, $v, PDO::PARAM_STR );
		    }
		 }

		foreach ($_SESSION['how_long'] as $k => $v) {
	      if ($k !== "sessionID") {
		        $k = str_replace('-', '', $k);
		        $stmt->bindValue( ':' . $k, $v, PDO::PARAM_STR );
		    }
		 }

		foreach ($_SESSION['present'] as $k => $v) {
	      if ($k !== "sessionID") {
		        $k = str_replace('-', '', $k);
		        $stmt->bindValue( ':' . $k, $v, PDO::PARAM_STR );
		    }
		 }
		
		if ($_SESSION['symptoms']['Anterograde_Amnesia'] == "Yes") {
		    $stmt->bindValue( ':ANTEROGRADE', 1, PDO::PARAM_BOOL );
		    $stmt->bindValue( ':Anterograde_Amnesia_duration', $_SESSION['symptoms']['Anterograde_Amnesia_duration'], PDO::PARAM_STR );
		}
		
		if ($_SESSION['symptoms']['Retrograde_Amnesia'] == "Yes") {
		    $stmt->bindValue( ':RETROGRADE', 1, PDO::PARAM_BOOL );
		    $stmt->bindValue( ':Retrograde_Amnesia_duration', $_SESSION['symptoms']['Anterograde_Amnesia_duration'], PDO::PARAM_STR );
		}

		$stmt->execute();
		//$stmt->debugDumpParams();
} catch (Exception $e) {
     echo $e->getMessage();
}

//echo "<br>" . $symptomSet . "<br>";
//print_r($stmt);


//print_r($stmt);

/**print "<pre>";
print_r($_SESSION);
print "</pre>";*/

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
		
		<form id="contact-form" action="how_much.php" method="get">

    <h3>Form submitted</h3>
			<div>
			  <label>
			     <span>
			        Injured players name: <?php echo $playerIdResult->name;?>
			     </span>
			  </label>
			</div>
			<div>
			  <label>
			     <span>
			        Game: <?php echo $incidentResult->competition;?>
			     </span>
			  </label>
			</div>
			<div>
			  <label>
			     <span>
			        Date of injury: <?php echo $incidentResult->date;?>
			     </span>
			  </label>
			</div>
			<div>
			  <label>
			     <span>
			        <a href="index.php">Thank you for submitting this concussion report.</a>
			     </span>
			  </label>
			</div>
			</form>
	  </div>
  </div>
				<script src="js/scripts.js"></script>
	
</body>
</html>'