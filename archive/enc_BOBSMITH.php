<?php
class enc_Marker{
	public function element($type, $element, $class = '', $id = ''){
		$html = '<';
		$html .= $element.' ';
		$html .= 'itemscope itemtype="https://schema.org/'.$type.'"';
		$html .= '>';
		return $html;
	}
}

class enc_BlogPosting extends enc_Marker{
	public $type = 'BlogPosting';
	
	public function type($element, $class = '', $id = ''){
		$html = $this->element($this->type, $element, $class, $id);
		echo $html;
	}
}

class enc_ImageObject extends enc_Marker{

}
?>