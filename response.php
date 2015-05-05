<?php
require('core.php');

$vars = array_merge($_GET, $_POST);

$responses = array();
$responses['additionalTool'] = array();

$rand = validator::random_bytes(2);

foreach ($vars as $k => $v) {
	  if (is_array($v)) {
		    foreach ($v as $symptom) {
			       $z = validator::testInput($symptom);
			       //array_shift($v);
			       array_push($responses['additionalTool'], $z);
		    }
		} else {
		 $x = validator::testInput($v);
    $responses[$k] = $x;
		}
}

$responses['sessionID'] = $rand;

session_start();

$_SESSION["playerInfo"] = $responses;
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
	<meta name="author" content="@shavez00">
	<link href="css/style.css" rel="stylesheet">
</head>

<body>
	
	<div class="wrapper">
		<div id="main" style="padding:50px 0 0 0;">
		  <div id="contact-form">
			<h3>HIA 3</h3>
			<table id="concusconf" style="width 100%">
			  <tr>
			    <td>
			      <div>
			        <lable>
			          <span>Today's date:</span>
			        </lable>
			      </div>
			    </td>
			    <td>
			      <?php
echo <<<EOT
     <div>
				<label>
				  <span>
EOT;
echo date("m/d/Y");
echo <<<EOT
          </span>
				</label>
			</div>
EOT;
?>
			    </td>
			    <td>
			      <div>
			        <lable>
			          <span>Time form completed:</span>
			        </lable>
			      </div>
			    </td>
			    <td>
			      <?php
echo <<<EOT
     <div>
				<label>
				  <span>
EOT;
echo $_SESSION['symptoms']['time'];
echo <<<EOT
          </span>
				</label>
			</div>
EOT;
?>
			    </td>
			    <td>
			      <div>
			        <lable>
			          <span>Physicians name:</span>
			        </lable>
			      </div>
			    </td>
			    <td>
			      <?php
echo <<<EOT
     <div>
				<label>
				  <span>
EOT;
echo $_SESSION['symptoms']['physician'];
echo <<<EOT
          </span>
				</label>
			</div>
EOT;
?>
			    </td>
			  </tr>
			  <tr>
			    <td>
			      <div>
			        <lable>
			          <span>Players name:</span>
			        </lable>
			      </div>
			    </td>
			    </br>
			    <td>
			      <?php
echo <<<EOT
     <div>
				<label>
				  <span>
EOT;
echo $_SESSION['symptoms']['player'];
echo <<<EOT
          </span>
				</label>
			</div>
EOT;
?>
			    </td>
			  </tr>
			</table>
			<table>
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
			  <div>
			    <lable>
			      <span>
EOT;
               echo current($_SESSION['how_much']);
               next($_SESSION['how_much']);
               echo <<< EOT
             </span>
           </lable>
         </div>
       </td>
       <td>
			  <div>
			    <lable>
			      <span>
EOT;
               echo current($_SESSION['when']);
               next($_SESSION['when']);
               echo <<< EOT
             </span>
           </lable>
         </div>
       </td>
       <td>
			  <div>
			    <lable>
			      <span>
EOT;
               echo current($_SESSION['how_long']);
               next($_SESSION['how_long']);
               echo <<< EOT
             </span>
           </lable>
         </div>
       </td>
       <td>
			  <div>
			    <lable>
			      <span>
EOT;
               echo current($_SESSION['present']);
               next($_SESSION['present']);
               echo <<< EOT
             </span>
           </lable>
         </div>
       </td>
			</tr>
EOT;
}
?>
      </table>
<?php
print "<pre>";
 print_r($_SESSION);
 print "</pre>";
?>
			<div>
				<button type="submit" id="contact-submit">Next</button>
			</div>
		</div>
		</div>
	</div>

	<script src="js/scripts.js"></script>
	
</body>
</html>