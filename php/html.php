<?php
class html extends element{
	public function build($element, $flag, $return, $schema = '', $attributes = ''){
		if($flag == 0){
			if($return == 0){
				return $this->open($element, $schema, $attributes);	
			}else{
				echo $this->open($element, $schema, $attributes);	
			}
		}else{
			if($return == 0){
				return $this->close($element);
			}else{
				echo $this->close($element);
			}
		}
	}
}
?>