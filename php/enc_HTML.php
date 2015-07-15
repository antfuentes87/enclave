<?php

class enc_HTML{
	public function hgroup($firstHeading, $secondHeading, $firstNum, $secondNum, $class, $id){
		if($class <> '' || $id <> ''){
			if($class <> '' && $id <> ''){
				$html = '<hgroup class="'.$class.'" id="'.$id.'">';
			}
			if($class <> ''){
				$html = '<hgroup class="'.$class.'">';
			}
			if($id <> ''){
				$html = '<hgroup id="'.$id.'">';
			}
		}else{
			$html = '<hgroup>';
		}
		$html .= '<h'.$firstNum.'>'.$firstHeading.'</h'.$firstNum.'>';
		$html .= '<h'.$secondNum.'>'.$secondHeading.'</h'.$secondNum.'>';
		$html .= '</hgroup>';

		return $html;
	}	
}
?>
