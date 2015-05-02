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

    public static function random_bytes($count) 
    {
	  if (!isset($random_state)) {
	      $random_state = print_r($_SERVER, TRUE);
	      if (function_exists('getmypid')) {
	           $random_state .= getmypid();
        }
	      $bytes = '';
    }
	  if (strlen($bytes) < $count) {
        if (!isset($php_compatible)) {
	           $php_compatible = version_compare(PHP_VERSION, '5.3.4', '>=');
	      }
        if ($fh = @fopen('/dev/urandom', 'rb')) {
            $bytes .= fread($fh, max(4096, $count));
            fclose($fh);
        }  elseif ($php_compatible && function_exists('openssl_random_pseudo_bytes')) {
                $bytes .= openssl_random_pseudo_bytes($count - strlen($bytes));
        }
        while (strlen($bytes) < $count) {
            $random_state = hash('sha256', microtime() . mt_rand() . $random_state);
            $bytes .= hash('sha256', mt_rand() . $random_state, TRUE);
        }
    }
	 $output = substr($bytes, 0, $count);
	 $bytes = substr($bytes, $count);
	  return $output;
    }
}
?>