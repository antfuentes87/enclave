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

	public function exe($html, $exe){
		if($exe == 0){
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

	public function image($src, $alt, $exe = 0, $class = '', $id = ''){
		$html = '<';
		$html .= $this->elementSingle('img', $class, $id);
		$html .= ' src="'.$src.'"';
		$html .= ' alt="'.$alt.'"';
		$html .= '>';
		$this->exe($html, $exe);
	}

	public function iframe($flag = 0, $src, $exe = 0, $class = '', $id = ''){
		$html = '<';
		$html = $this->element('iframe', $flag, $class, $id);
		$html .= ' src="'.$src.'"';
		$html .= '>';
		$this->exe($html, $exe);
	}

	public function video($flag = 0, $src, $autoplay = true, $loop = false, $muted = false, $exe = 0, $class = '', $id = ''){
		$html = '<';
		$html = $this->element('video', $flag, $class, $id);
		$html .= ' src="'.$src.'" autoplay="'.$autoplay.'" loop="'.$loop.'" muted="'.$muted.'"';
		$html .= '>';
		$this->exe($html, $exe);
	}

	public function track($src, $label = '', $exe = 0, $class= '', $id = ''){
		$html = '<';
		$html .= $this->elementSingle('track', $class, $id);
		$html .= ' src="'.$src.'" label="'.$label.'"';
		$html .= '>';
		$this->exe($html, $exe);
	}

	public function audio($flag = 0, $src, $autoplay = true, $loop = false, $volume = '1.0', $exe = 0, $controls = '', $class = '', $id = ''){
		$html = '<';
		$html = $this->element('audio', $flag, $class, $id);
		$html .= ' src="'.$src.'" autoplay="'.$autoplay.'" loop="'.$loop.'" volume="'.$volume.'".$controls.';
		$html .= '>';
		$this->exe($html, $exe);
	}

	public function embed($src, $type = '',$exe = 0, $class = '', $id = ''){
		$html = '<';
		$html .= $this->elementSingle('embed', $class, $id);
		$html .= ' src="'.$src.'"';
		$html .= '>';
		$this->exe($html, $exe);
	}

	public function a($href, $target = '',$exe = 0, $class = '', $id = ''){
		$html = '<';
		$html .= $this->elementSingle('a', $class, $id);
		$html .= ' href="'.$href.'"';
		$html .= ' target="'.$target.'"';
		$html .= '>';
		$this->exe($html, $exe);
	}

	public function form($flag = 0, $action = '', $method = '', $class = '', $id = ''){
		$html = '<';
		$html = $this->element('form', $flag, $class, $id);
		$html .= 'action="'.$action.'" method="'.$method.'"';
		$html .= '>';
		$this->exe($html, $exe);
	}

	public function input($type = "", $value = '', $exe = 0, $class = '', $id = ''){
		$html = '<';
		$html .= $this->elementSingle('input', $class, $id);
		$html .= ' type="'.$type.'"';
		$html .= ' value="'.$value.'"';
		$html .= '>';
		$this->exe($html, $exe);
	}

	public function heading($flag = 0, $exe = 0, $number, $class = '', $id = ''){
		$html = $this->element('h'.$number, $flag, $class, $id);
		$this->exe($html, $exe);
	}

	public function hgroup($flag = 0, $exe = 0, $class = '', $id = ''){
		$html = $this->element('hgroup', $flag, $class, $id);
		$this->exe($html, $exe);
	}

	public function paragraph($flag = 0, $exe = 0, $class = '', $id = ''){
		$html = $this->element('p', $flag, $class, $id);
		$this->exe($html, $exe);
	}

	public function section($flag = 0, $exe = 0, $class = '', $id = ''){
		$html = $this->element('section', $flag, $class, $id);
		$this->exe($html, $exe);
	}

	public function article($flag = 0, $exe = 0, $class = '', $id = ''){
		$html = $this->element('article', $flag, $class, $id);
		$this->exe($html, $exe);
	}

	public function div($flag = 0, $exe = 0, $class = '', $id = ''){
		$html = $this->element('div', $flag, $class, $id);
		$this->exe($html, $exe);
	}

	public function ul($flag = 0, $exe = 0, $class = '', $id = ''){
		$html = $this->element('ul', $flag, $class, $id);
		$this->exe($html, $exe);
	}

	public function li($flag = 0, $exe = 0, $class = '', $id = ''){
		$html = $this->element('li', $flag, $class, $id);
		$this->exe($html, $exe);
	}

	public function nav($flag = 0, $exe = 0, $class = '', $id = ''){
		$html = $this->element('nav', $flag, $class, $id);
		$this->exe($html, $exe);
	}

	public function address($flag = 0, $exe = 0, $class = '', $id = ''){
		$html = $this->element('address', $flag, $class, $id);
		$this->exe($html, $exe);
	}

	public function header($flag = 0, $exe = 0, $class = '', $id = ''){
		$html = $this->element('header', $flag, $class, $id);
		$this->exe($html, $exe);
	}

	public function footer($flag = 0, $exe = 0, $class = '', $id = ''){
		$html = $this->element('footer', $flag, $class, $id);
		$this->exe($html, $exe);
	}

	public function figure($flag = 0, $exe = 0, $class = '', $id = ''){
		$html = $this->element('figure', $flag, $class, $id);
		$this->exe($html, $exe);
	}

	public function figcaption($flag = 0, $exe = 0, $class = '', $id = ''){
		$html = $this->element('figcaption', $flag, $class, $id);
		$this->exe($html, $exe);
	}

	public function ol($flag = 0, $exe = 0, $class = '', $id = ''){
		$html = $this->element('ol', $flag, $class, $id);
		$this->exe($html, $exe);
	}

	public function abbr($flag = 0, $exe = 0, $class = '', $id = ''){
		$html = $this->element('abbr', $flag, $class, $id);
		$this->exe($html, $exe);
	}

	public function span($flag = 0, $exe = 0, $class = '', $id = ''){
		$html = $this->element('span', $flag, $class, $id);
		$this->exe($html, $exe);
	}

	public function cite($flag = 0, $exe = 0, $class = '', $id = ''){
		$html = $this->element('cite', $flag, $class, $id);
		$this->exe($html, $exe);
	}

	public function i($flag = 0, $exe = 0, $class = '', $id = ''){
		$html = $this->element('i', $flag, $class, $id);
		$this->exe($html, $exe);
	}

	public function q($flag = 0, $exe = 0, $class = '', $id = ''){
		$html = $this->element('q', $flag, $class, $id);
		$this->exe($html, $exe);
	}

	public function s($flag = 0, $exe = 0, $class = '', $id = ''){
		$html = $this->element('s', $flag, $class, $id);
		$this->exe($html, $exe);
	}

	public function strong($flag = 0, $exe = 0, $class = '', $id = ''){
		$html = $this->element('strong', $flag, $class, $id);
		$this->exe($html, $exe);
	}

	public function sub($flag = 0, $exe = 0, $class = '', $id = ''){
		$html = $this->element('sub', $flag, $class, $id);
		$this->exe($html, $exe);
	}

	public function sup($flag = 0, $exe = 0, $class = '', $id = ''){
		$html = $this->element('sup', $flag, $class, $id);
		$this->exe($html, $exe);
	}

	public function time($flag = 0, $exe = 0, $class = '', $id = ''){
		$html = $this->element('time', $flag, $class, $id);
		$this->exe($html, $exe);
	}

	public function u($flag = 0, $exe = 0, $class = '', $id = ''){
		$html = $this->element('u', $flag, $class, $id);
		$this->exe($html, $exe);
	}

	public function fieldset($flag = 0, $exe = 0, $class = '', $id = ''){
		$html = $this->element('fieldset', $flag, $class, $id);
		$this->exe($html, $exe);
	}

	public function legend($flag = 0, $exe = 0, $class = '', $id = ''){
		$html = $this->element('legend', $flag, $class, $id);
		$this->exe($html, $exe);
	}

	public function label($flag = 0, $exe = 0, $class = '', $id = ''){
		$html = $this->element('label', $flag, $class, $id);
		$this->exe($html, $exe);
	}

	public function select($flag = 0, $exe = 0, $class = '', $id = ''){
		$html = $this->element('select', $flag, $class, $id);
		$this->exe($html, $exe);
	}

	public function option($flag = 0, $exe = 0, $class = '', $id = ''){
		$html = $this->element('option', $flag, $class, $id);
		$this->exe($html, $exe);
	}

	public function menu($flag = 0, $exe = 0, $class = '', $id = ''){
		$html = $this->element('menu', $flag, $class, $id);
		$this->exe($html, $exe);
	}

	public function string_formatDate($dateFormat, $dateKey){
		return date($dateFormat, strtotime($dateKey));
	}

	public function joomlaQueryArray($table, $col, $where, $whereValue, $orderBy, $order, $limit){
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
	
		$query->select($db->quoteName($col));
		$query->from($db->quoteName('#__'.$table));
		$query->where($db->quoteName($where) . ' = '.$whereValue);
		$query->order($orderBy.' '.$order);
		$query->setLimit($limit);
		
		$db->setQuery($query);
		$results = $db->loadObjectList();
		return $results;
	}
}
?>