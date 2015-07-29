<?php
class element extends schema{	
	public function schema($schemas){
		$schemas = json_decode($schemas);
		foreach($schemas as $schemaKey => $schema){
			if($schemaKey == 'itemtype'){
				$html .= 'itemscope  '.$schemaKey.'='.'"'.$this->schemaURL.$schema.'"';
			}else{
				$html .= $schemaKey.'='.'"'.$schema.'"';
			}
		}
		return $html;
	}
	
	public function attributes($attributes){
		$attributes = json_decode($attributes);
		foreach($attributes as $attributeKey => $attribute){
			if($attribute <> ''){
				$html .= $attributeKey.'='.'"'.$attribute.'"';	
			}
		}
		return $html;
	}
	
	public function open($element, $schemas = '', $attributes = ''){
		$html = '<';
		$html .= $element.' ';
		
		if($schemas <> ''){
			$html .= $this->schema($schemas);
		}
		if($attributes <> ''){
			$html .= $this->attributes($attributes);	
		}
		
		$html .= '>';
		return $html;
	}
	
	public function close($element){
		$html = '</';
		$html .= $element;
		$html .= '>';
		return $html;
	}
}
?>