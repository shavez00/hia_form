<?php
$_SESSION['symptoms']['player'] = 'John';

$_SESSION['playerInfo']['Age'] = '20';
$_SESSION['playerInfo']['Height'] = "5'10&quot;";
$_SESSION['playerInfo']['Weight'] = '185';
$_SESSION['playerInfo']['Year_started_playing'] = '2010';
$_SESSION['playerInfo']['Year_started_playing_professionally'] = '2015';

$dtObject = new DateTime('2015-01-01');
$date = $dtObject->format('Y-m-d');
$_SESSION['playerInfo']['Match'] = $date;
$_SESSION['playerInfo']['Competition'] = 'tigers lions';
$_SESSION['playerInfo']['Kickoff'] = '3pm';
$_SESSION['playerInfo']['Team'] = 'tigers';
$_SESSION['playerInfo']['HIA1'] = 'Yes';
$_SESSION['playerInfo']['HIA2'] = 'Yes';
$_SESSION['playerInfo']['Previous_Concusion'] = 'No';
$_SESSION['playerInfo']['Number_of_Concusions'] = '4';
$_SESSION['playerInfo']['gameEvent'] = 'Tackling';
$_SESSION['playerInfo']['position'] = 'Front Row';
$_SESSION['playerInfo']['Collision'] = 'Head/Head';
$_SESSION['playerInfo']['Technique'] = 'Correct technique';
$_SESSION['playerInfo']['additionalTool'] = array("scat3", "Cog Sport", "Headminder", "Impact");
$_SESSION['playerInfo']['Result'] = 'Yes';
$_SESSION['playerInfo']['Summary'] = 'No residual';