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
	
	public function arraySort($array, $order, $sort){
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
	
	public function disectURL(){
		$arr = array();
		$a = explode('?',sprintf(
			"%s://%s%s",
			isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
			$_SERVER['SERVER_NAME'],
			$_SERVER['REQUEST_URI']
		));

		$arr['base_url']     = $a[0];
		$arr['query_string'] = [];

		if(sizeof($a) == 2)
		{
			$b = explode('&', $a[1]);
			$qs = array();

			foreach ($b as $c)
			{
				$d = explode('=', $c);
				$qs[$d[0]] = $d[1];
			}
			$arr['query_string'] = (count($qs)) ? $qs : '';
		}

		return $arr;
	}
	
	public function URL(){
		$url = $this->disectURL();
		
		$this->baseURL = str_replace('index.php' , '' , $url['base_url']);
		
		$this->indexURL = $_SERVER['REQUEST_URI'];
		
		$this->currentURL = sprintf(
			'%s://%s/%s',
			isset($_SERVER['HTTPS']) ? 'https' : 'http',
			$_SERVER['HTTP_HOST'],
			$_SERVER['REQUEST_URI']
		);
		
		
	}
	
	public function joomlaQueryArray($table, $col, $where, $whereValue, $orderBy, $order, $limit){
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		$query->select($db->quoteName($col));
		$query->from($db->quoteName('#__'.$table));
		$query->where($db->quoteName($where)." = ".$db->quote($whereValue));
		$query->order($orderBy.' '.$order);
		$query->setLimit($limit);
		$db->setQuery($query);
		$results = $db->loadObjectList();
		return $results;
	}
	
	public function joomlaMenuContent($where, $whereValue){
		$col = array('id','menutype',
		'title','alias',
		'note','path',
		'link','type',
		'published','parent_id',
		'level','component_id',
		'checked_out','checked_out_time',
		'browserNav','access','img',
		'template_style_id','params',
		'lft','rgt','home',
		'language','client_id');
		
		$results = $this->joomlaQueryArray('menu', $col, $where, $whereValue, 'id', desc, 99);
		foreach($results as $key => $val){}
		$this->menuId = $val->id;
	}
	
	public function joomlaCategoryContent($where, $whereValue){
		$col = array('id','asset_id',
		'parent_id','lft','rgt',
		'level','path','extension',
		'title','alias','note',
		'description','published',
		'checked_out','checked_out_time',
		'access','params','metadesc',
		'metakey','metadata','created_user_id',
		'created_time','modified_user_id',
		'modified_time','hits',
		'language','version');
		
		$results = $this->joomlaQueryArray('categories', $col, $where, $whereValue, 'id', desc, 99);
		foreach($results as $key => $val){}
		$this->catId = $val->id;
		$this->catTitle = $val->title;
		$this->catAlias = $val->alias;
	}
	
	public function joomlaArticleContent($currentBasename){
		$col = array('id', 'title',
		'asset_id', 'alias', 
		'introtext', 'fulltext', 
		'state', 'catid', 'created', 
		'created_by', 'created_by_alias',
		'modified', 'modified_by',
		'checked_out', 'checked_out_time',
		'publish_up', 'publish_down',
		'images', 'urls', 'attribs', 
		'version', 'ordering', 'metakey', 
		'metadesc', 'access', 'hits', 'metadata', 
		'featured', 'language', 'xreference');
		
		$app = JFactory::getApplication();
		$menu = $app->getMenu();
		$active = $menu->getActive();
		$basename = $active->alias;
		
		$catResult = $this->joomlaQueryArray('categories', 'id', 'alias', $basename, 'id', desc, 99);
		foreach($catResult as $catKey => $catVal){
			$catid = $catVal->id;
		}

		$currentBasename = str_replace('_', '-', $currentBasename);

		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		$query->select($db->quoteName($col));
		$query->from($db->quoteName('#__content'));
		$query->where($db->quoteName('catid')." = ".$db->quote($catid));
		$query->where($db->quoteName('alias')." = ".$db->quote($currentBasename));
		$query->order('id'.' '.'asc');
		$db->setQuery($query);
		$results = $db->loadObjectList();
		
		foreach($results as $key => $val){}
		
		$this->text = explode('{BREAK}', $val->introtext);
		$this->id = $val->id;
		$this->asset_id = $val->asset_id;
		$this->title = $val->title;
		$this->alias = $val->alias;
		$this->fulltext = $val->fulltext;
		$this->state = $val->state;
		$this->catid = $val->catid;
		$this->created = $val->created;
		$this->created_by = $val->created_by;
		$this->created_by_alias = $val->created_by_alias;
		$this->modified = $val->modified;
		$this->modified_by = $val->modified_by;
		$this->checked_out_time = $val->checked_out_time;
		$this->publish_up = $val->publish_up;
		$this->publish_down = $val->publish_down;
		$this->version = $val->version;
		$this->ordering = $val->ordering;
		$this->metakey = $val->metakey;
		$this->metadesc = $val->metadesc;
		$this->access = $val->access;
		$this->hits = $val->hits;
		$this->featured = $val->featured;
		$this->language = $val->language;
		$this->xreference = $val->xreference;
		
		$img = json_decode($val->images);
		$this->image_intro = $img->image_intro;
		$this->float_intro = $img->float_intro;
		$this->image_intro_alt = $img->image_intro_alt;
		$this->image_intro_caption = $img->image_intro_caption;
		$this->image_fulltext = $img->image_fulltext;
		$this->float_fulltext = $img->float_fulltext;
		$this->image_fulltext_alt = $img->image_fulltext_alt;
		$this->image_fulltext_caption = $img->image_fulltext_caption;
		
		$url = json_decode($val->urls);
		$this->urla = $url->urla;
		$this->urlatext = $url->urlatext;
		$this->targeta = $url->target_a;
		$this->urlb = $url->urlb;
		$this->urlbtext = $url->urlbtext;
		$this->targetb= $url->target_b;
		$this->urlc = $url->urlc;
		$this->urlctext = $url->urlctext;
		$this->targetc = $url->target_c;			
		
		$attribs = json_decode($val->attribs);
		$this->show_title = $attribs->show_title;
		$this->link_titles = $attribs->link_titles;
		$this->show_tags  =$attribs->show_tags;
		$this->show_intro = $attribs->show_intro;
		$this->info_block_position = $attribs->info_block_position;
		$this->show_category = $attribs->show_category;
		$this->link_category = $attribs->link_category;
		$this->show_parent_category = $attribs->show_parent_category;
		$this->link_parent_category = $attribs->link_parent_category;
		$this->show_author = $attribs->show_author;
		$this->link_author = $attribs->link_author;
		$this->show_create_date = $attribs->show_create_date;
		$this->show_modify_date = $attribs->show_modify_date;
		$this->show_publish_date = $attribs->show_publish_date;
		$this->show_item_navigation = $attribs->show_item_navigation;
		$this->show_icons = $attribs->show_icons;
		$this->show_print_icon = $attribs->show_print_icon;
		$this->show_email_icon = $attribs->show_email_icon;
		$this->show_vote = $attribs->show_vote;
		$this->show_hits = $attribs->show_hits;
		$this->show_noauth = $attribs->show_noauth;
		$this->urls_position = $attribs->urls_position;
		$this->alternative_readmore = $attribs->alternative_readmore;
		$this->article_layout = $attribs->article_layout;
		$this->show_publishing_options = $attribs->show_publishing_options;
		$this->show_article_options = $attribs->show_article_options;
		$this->show_urls_images_backend = $attribs->show_urls_images_backend;
		$this->show_urls_images_frontend = $attribs->show_urls_images_frontend;			
		
		$metadata = json_decode($val->metadata);	
		$this->robots = $metadata->robots;
		$this->author = $metadata->author;
		$this->rights = $metadata->rights;
		$this->xreference= $metadata->xreference;
	}
	
	public function joomlaArticleLink($id, $catid){
		
		$query = $this->joomlaQueryArray('categories', 'alias', 'id', $catid, 'id', 'ASC', 99);
		
		foreach($query as $key => $value){
			$alias = $value->alias;
		}
		
		$query = $this->joomlaQueryArray('menu', 'id', 'alias', $alias, 'id', 'ASC', 99);
		
		foreach($query as $key => $value){
			$itemId = $value->id;
		}
		
		return 'index.php?option=com_content&view=article&id='.$id.'&Itemid='.$itemId;
	}
	
	public function joomlaCategoryArticle($array, $require){
		$this->articleArray = $array;
		require('templates/what/html/com_content/article/'.$require.'/item.php');
	}
	
	public function joomlaCategoryLead($array, $require){
		$this->catLeadArray = $array;
		require('templates/what/html/com_content/category/'.$require.'/lead.php');
	}
	
	public function joomlaCategoryIntro($array, $require){
		$this->catIntroArray = $array;
		require('templates/what/html/com_content/category/'.$require.'/intro.php');
	}
	
	public function articleTextExplode($array){
		return explode('{BREAK}', $array);
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
		if($flag == 0){
			$html = '<';
			$html = $this->element('iframe', $flag, $class, $id);
			$html .= ' src="'.$src.'"';
			$html .= '>';
		}else{
			$html ='</iframe>';
		}		
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

	public function a($flag = 0, $exe = 0, $href = '#', $target = '_self', $class = '', $id = ''){
		if($flag == 0){
			$html = '<';
			$html .= $this->elementSingle('a', $class, $id);
			$html .= ' href="'.$href.'"';
			$html .= ' target="'.$target.'"';
			$html .= '>';
		}else{
			$html = $this->element('a', 1);
		}		
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
	
	public function button($flag = 0, $exe = 0, $class = '', $id = ''){
		$html = $this->element('button', $flag, $class, $id);
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
}
?>