<?php
namespace framework;

class string{	
	public function explode($array, $explode){
		return explode($explode, $array);
	}
	
	public function breakExplode($array){
		return explode('{BREAK}', $array);
	}
	public function formatDate($dateFormat, $dateKey){
		return date($dateFormat, strtotime($dateKey));
	}

	public function between($left, $right, $in){
	    preg_match('/'.$left.'(.*?)'.$right.'/s', $in, $match);
	    return empty($match[1]) ? NULL : $match[1];
	}

}
?>