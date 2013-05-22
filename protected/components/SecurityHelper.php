<?php 

class SecurityHelper{
	
	public static function ecrypt($value)
	{
		for($i=0;$i<10;$i++){
			$value = md5($value); 
		}

		return $value;
	}
}

// end of class