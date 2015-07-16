<?php

class enc_HTML{
	public function element($element, $flag = 0, $class = '', $id = ''){
		if($flag == 0){
			if($class <> '' || $id <> ''){
				if($class <> '' AND $id <> ''){
					$html = '<'.$element.' class="'.$class.'" id="'.$id.'">';
				}else{
					if($class <> ''){
						$html = '<'.$element.' class="'.$class.'">';
					}
					if($id <> ''){
						$html = '<'.$element.' id="'.$id.'">';
					}
				}		
			}else{
				$html = '<'.$element.'>';
			}
		}else{
			$html = '</'.$element.'>';
		}

		return $html;
	}

	public function elementSingle($element, $class = '', $id = ''){
		if($class <> '' || $id <> ''){
			if($class <> '' AND $id <> ''){
				$html = $element.' class="'.$class.'" id="'.$id.'"';
			}else{
				if($class <> ''){
					$html = $element.' class="'.$class.'"';
				}
				if($id <> ''){
					$html = $element.' id="'.$id.'"';
				}
			}		
		}else{
			$html = $element;
		}
		return $html;
	}

	public function execute($html, $execute){
		if($execute == 0){
			return $html;
		}else{
			echo $html;
		}
	}

	public function repeat($arraySize, $page, $pagePath){
		for ($key = 0; $key <= $arraySize; $key++) {
			require($pagePath.$page.'.php');
		}
	}

	public function image($src, $alt, $execute = 0, $class = '', $id = ''){
		$html = '<';
		$html .= $this->elementSingle('img', $class, $id);
		$html .= ' src="'.$src.'"';
		$html .= ' alt="'.$alt.'"';
		$html .= '>';
		$this->execute($html, $execute);
	}

	public function iframe($flag = 0, $src, $execute = 0, $class = '', $id = ''){
		$html = '<';
		$html = $this->element('iframe', $flag, $class, $id);
		$html .= ' src="'.$src.'"';
		$html .= '>';
		$this->execute($html, $execute);
	}

	public function video($flag = 0, $src, $autoplay = true, $loop = false, $muted = false, $execute = 0, $class = '', $id = ''){
		$html = '<';
		$html = $this->element('video', $flag, $class, $id);
		$html .= ' src="'.$src.'" autoplay="'.$autoplay.'" loop="'.$loop.'" muted="'.$muted.'"';
		$html .= '>';
		$this->execute($html, $execute);
	}

	public function track($src, $label = '', $execute = 0, $class= '', $id = ''){
		$html = '<';
		$html .= $this->elementSingle('track', $class, $id);
		$html .= ' src="'.$src.'" label="'.$label.'"';
		$html .= '>';
		$this->execute($html, $execute);
	}

	public function audio($flag = 0, $src, $autoplay = true, $loop = false, $volume = '1.0', $execute = 0, $controls = '', $class = '', $id = ''){
		$html = '<';
		$html = $this->element('audio', $flag, $class, $id);
		$html .= ' src="'.$src.'" autoplay="'.$autoplay.'" loop="'.$loop.'" volume="'.$volume.'".$controls.';
		$html .= '>';
		$this->execute($html, $execute);
	}

	public function embed($src, $type = '',$execute = 0, $class = '', $id = ''){
		$html = '<';
		$html .= $this->elementSingle('embed', $class, $id);
		$html .= ' src="'.$src.'"';
		$html .= '>';
		$this->execute($html, $execute);
	}

	public function a($href, $target = '',$execute = 0, $class = '', $id = ''){
		$html = '<';
		$html .= $this->elementSingle('a', $class, $id);
		$html .= ' href="'.$href.'"';
		$html .= ' target="'.$target.'"';
		$html .= '>';
		$this->execute($html, $execute);
	}

	public function form($flag = 0, $action = '', $method = '', $class = '', $id = ''){
		$html = '<';
		$html = $this->element('form', $flag, $class, $id);
		$html .= 'action="'.$action.'" method="'.$method.'"';
		$html .= '>';
		$this->execute($html, $execute);
	}

	public function input($type = "", $value = '', $execute = 0, $class = '', $id = ''){
		$html = '<';
		$html .= $this->elementSingle('input', $class, $id);
		$html .= ' type="'.$type.'"';
		$html .= ' value="'.$value.'"';
		$html .= '>';
		$this->execute($html, $execute);
	}

	public function heading($flag = 0, $execute = 0, $number, $class = '', $id = ''){
		$html = $this->element('h'.$number, $flag, $class, $id);
		$this->execute($html, $execute);
	}

	public function hgroup($flag = 0, $execute = 0, $class = '', $id = ''){
		$html = $this->element('hgroup', $flag, $class, $id);
		$this->execute($html, $execute);
	}

	public function paragraph($flag = 0, $execute = 0, $class = '', $id = ''){
		$html = $this->element('p', $flag, $class, $id);
		$this->execute($html, $execute);
	}

	public function section($flag = 0, $execute = 0, $class = '', $id = ''){
		$html = $this->element('section', $flag, $class, $id);
		$this->execute($html, $execute);
	}

	public function article($flag = 0, $execute = 0, $class = '', $id = ''){
		$html = $this->element('article', $flag, $class, $id);
		$this->execute($html, $execute);
	}

	public function div($flag = 0, $execute = 0, $class = '', $id = ''){
		$html = $this->element('div', $flag, $class, $id);
		$this->execute($html, $execute);
	}

	public function ul($flag = 0, $execute = 0, $class = '', $id = ''){
		$html = $this->element('ul', $flag, $class, $id);
		$this->execute($html, $execute);
	}

	public function li($flag = 0, $execute = 0, $class = '', $id = ''){
		$html = $this->element('li', $flag, $class, $id);
		$this->execute($html, $execute);
	}

	public function nav($flag = 0, $execute = 0, $class = '', $id = ''){
		$html = $this->element('nav', $flag, $class, $id);
		$this->execute($html, $execute);
	}

	public function address($flag = 0, $execute = 0, $class = '', $id = ''){
		$html = $this->element('address', $flag, $class, $id);
		$this->execute($html, $execute);
	}

	public function header($flag = 0, $execute = 0, $class = '', $id = ''){
		$html = $this->element('header', $flag, $class, $id);
		$this->execute($html, $execute);
	}

	public function footer($flag = 0, $execute = 0, $class = '', $id = ''){
		$html = $this->element('footer', $flag, $class, $id);
		$this->execute($html, $execute);
	}

	public function figure($flag = 0, $execute = 0, $class = '', $id = ''){
		$html = $this->element('figure', $flag, $class, $id);
		$this->execute($html, $execute);
	}

	public function figcaption($flag = 0, $execute = 0, $class = '', $id = ''){
		$html = $this->element('figcaption', $flag, $class, $id);
		$this->execute($html, $execute);
	}

	public function ol($flag = 0, $execute = 0, $class = '', $id = ''){
		$html = $this->element('ol', $flag, $class, $id);
		$this->execute($html, $execute);
	}

	public function abbr($flag = 0, $execute = 0, $class = '', $id = ''){
		$html = $this->element('abbr', $flag, $class, $id);
		$this->execute($html, $execute);
	}

	public function span($flag = 0, $execute = 0, $class = '', $id = ''){
		$html = $this->element('span', $flag, $class, $id);
		$this->execute($html, $execute);
	}

	public function cite($flag = 0, $execute = 0, $class = '', $id = ''){
		$html = $this->element('cite', $flag, $class, $id);
		$this->execute($html, $execute);
	}

	public function i($flag = 0, $execute = 0, $class = '', $id = ''){
		$html = $this->element('i', $flag, $class, $id);
		$this->execute($html, $execute);
	}

	public function q($flag = 0, $execute = 0, $class = '', $id = ''){
		$html = $this->element('q', $flag, $class, $id);
		$this->execute($html, $execute);
	}

	public function s($flag = 0, $execute = 0, $class = '', $id = ''){
		$html = $this->element('s', $flag, $class, $id);
		$this->execute($html, $execute);
	}

	public function strong($flag = 0, $execute = 0, $class = '', $id = ''){
		$html = $this->element('strong', $flag, $class, $id);
		$this->execute($html, $execute);
	}

	public function sub($flag = 0, $execute = 0, $class = '', $id = ''){
		$html = $this->element('sub', $flag, $class, $id);
		$this->execute($html, $execute);
	}

	public function sup($flag = 0, $execute = 0, $class = '', $id = ''){
		$html = $this->element('sup', $flag, $class, $id);
		$this->execute($html, $execute);
	}

	public function time($flag = 0, $execute = 0, $class = '', $id = ''){
		$html = $this->element('time', $flag, $class, $id);
		$this->execute($html, $execute);
	}

	public function u($flag = 0, $execute = 0, $class = '', $id = ''){
		$html = $this->element('u', $flag, $class, $id);
		$this->execute($html, $execute);
	}

	public function fieldset($flag = 0, $execute = 0, $class = '', $id = ''){
		$html = $this->element('fieldset', $flag, $class, $id);
		$this->execute($html, $execute);
	}

	public function legend($flag = 0, $execute = 0, $class = '', $id = ''){
		$html = $this->element('legend', $flag, $class, $id);
		$this->execute($html, $execute);
	}

	public function label($flag = 0, $execute = 0, $class = '', $id = ''){
		$html = $this->element('label', $flag, $class, $id);
		$this->execute($html, $execute);
	}

	public function select($flag = 0, $execute = 0, $class = '', $id = ''){
		$html = $this->element('select', $flag, $class, $id);
		$this->execute($html, $execute);
	}

	public function option($flag = 0, $execute = 0, $class = '', $id = ''){
		$html = $this->element('option', $flag, $class, $id);
		$this->execute($html, $execute);
	}

	public function menu($flag = 0, $execute = 0, $class = '', $id = ''){
		$html = $this->element('menu', $flag, $class, $id);
		$this->execute($html, $execute);
	}

	public function string_formatDate($dateFormat, $dateKey){
		return date($dateFormat, strtotime($dateKey));
	}
}
?>