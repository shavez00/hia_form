<?php
require('core.php');

$vars = array_merge($_GET, $_POST);

 print "<pre>";
 print_r($vars);
 print "</pre>";
?>