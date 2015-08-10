<?php
namespace joomla;

use framework\html;
use joomla\database;

class article{
	public function variables($results){
		foreach($results as $resultKey => $result){
			foreach ($result as $column => $data) {
				$this->{$column} = $data;
			}
		}
	}

	public function variable($result){
		foreach ($result as $column => $data) {
			$this->{$column} = $data;
		}
	}

	public function deploy($element, $flag, $alias = '', $view = '', $schema = ''){
		$h = new html();
		if($flag == 0){
			$attr = '{"id":"'.$alias.'-'.$view.'"}';
			$h->b($element, 0, 1, $schema, $attr);
		}else{
			$h->b($element, 1, 1);
		}
		
	}

	public function content($id){
		$db = new database();
		$db->tables();
		$query = "SELECT * FROM $db->content WHERE id = '$id' ORDER BY id DESC";
		$results = $db->q($query);
		$this->variables($results);
	}

	public function introtext($id){
		$db = new database();
		$db->tables();
		$query = "SELECT introtext FROM $db->content WHERE id = '$id' ORDER BY id DESC";
		$results = $db->q($query);
		$this->variables($results);
	}

	public function sectionContent($articleAlias, $sectionAlias){
		$db = new database();
		$db->tables();
		$results = $db->q("SELECT id FROM $db->categories WHERE alias = '$articleAlias'");
		$catid = $results[0]['id'];
		$results = $db->q("SELECT * FROM $db->content WHERE catid = '$catid' AND alias = '$sectionAlias'");
		$this->variables($results);
	}

	public function sections($dir, $articleAlias, $outerElement = 'section', $center = ''){
		$h = new html();
		$db = new database();

		$this->articleAlias = $articleAlias;

		$h->b($outerElement, 0, 1, '', '{"id":"'.$this->articleAlias.'"}');
		$sections = scandir($dir);
		foreach($sections as $sectionKey => $section){
			if($section <> '.' AND $section <> '..'){
				$searchSection = strpos($section, PHP_FILE_EXT);
				if($searchSection == false){
					$sectionExplode = explode('_', $section);
					$this->sectionId = $sectionExplode[0];
					$this->sectionType = $sectionExplode[1];
					$this->sectionAlias = $this->sectionId.'-'.$this->sectionType;
					if($this->sectionType == 'section'){
						$h->b('section', 0, 1, '', '{"class":"'.$this->sectionType.'-'.$this->sectionId.'"}');
							if($center == ''){
								$h->b('div', 0, 1, '', '{"class":"what-section-center"}');
							}
								require($dir.'\\'.$section.'\\'.'section.php');
							if($center == ''){
								$h->b('div', 1, 1);
							}
						$h->b('section', 1, 1);
					}elseif($this->sectionType == 'parallax'){
						require_once($dir.'\\'.$section.'\\'.'parallax.php');
						$h->b('section', 0, 1, '', '{"class":"'.$this->sectionType.'-'.$this->sectionId.'", "style":"background-image: url('.$parallaxBackground.');"}');
						$parallax = scandir($dir.'\\'.$section);
						foreach ($parallax as $parallaxKey => $parallaxSection){
							if($parallaxSection <> '.' AND $parallaxSection <> '..'){
								$parallaxSearchSection = strpos($parallaxSection, PHP_FILE_EXT);
								if($parallaxSearchSection == false){
									$parallaxSectionExplode = explode('_', $parallaxSection);
									$this->parallaxSectionId = $parallaxSectionExplode[0];
									$this->parallaxSectionType = $parallaxSectionExplode[1];
									$this->parallaxSectionAlias = $this->parallaxSectionId.'-'.$this->parallaxSectionType;
									$h->b('section', 0, 1, '', '{"class":"'.$this->parallaxSectionType.'-'.$this->parallaxSectionId.'"}');
										$h->b('div', 0, 1, '', '{"class":"what-section-center"}');
											require($dir.'\\'.$section.'\\'.$parallaxSection.'\\'.'section.php');
										$h->b('div', 1, 1);
									$h->b('section', 1, 1);
								}
							}
						}
						$h->b('section', 1, 1);
					}
				}
			}
		}
		$h->b($outerElement, 1, 1);
	}
}

?>