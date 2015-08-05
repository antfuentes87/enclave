<?php
class ENCarray{
	public function sort($array, $order, $sort){
		$sortArray = array(); 

		foreach($array as $data){ 
			foreach($data as $key=>$value){ 
				if(!isset($sortArray[$key])){ 
					$sortArray[$key] = array(); 
				} 
				$sortArray[$key][] = $value; 
			} 
		} 
		
		if($sort == 'asc'){
			array_multisort($sortArray[$order], SORT_ASC, $array);	
		}else{
			array_multisort($sortArray[$order], SORT_DESC, $array);	
		}
		
		return $array;
	}
}
?>