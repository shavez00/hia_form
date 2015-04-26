<?php
class validator 
{
    public static function testInput ($input) 
    {
	      if(is_array($input)) { 
	          $input = array_map('trim', $input); 
	       } else {
		        $input = trim($input);
	       }
	      if(is_array($input)) {
		        $input = array_map('stripslashes', $input);
		    } else {
			      $input = stripslashes($input);
		    }
		    if(is_array($input)) {
			      function filter(&$value) 
            { 
                $value = htmlspecialchars($value, ENT_QUOTES, 'UTF-8'); 
            }
			      $input = array_map('filter', $input);
			  } else {
				    $input = htmlspecialchars($input);
			  }
		    return $input;
    }
}
?>