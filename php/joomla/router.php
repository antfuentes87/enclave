<?php
namespace joomla;

use framework\html;
use joomla\database;

class router{
	public function head($dir){
		$html = new html();

		//INCLUDE ANY .CSS IN CSS FOLDER
		$css = scandir($dir.CSS_PATH);
		foreach($css as $cssKey => $cssFile){
			if(stripos($cssFile, CSS_EXT)){
				$html->b('link', 0, 1, '', '{"href":"'.INCLUDE_PATH.CSS_PATH.$cssFile.'", "rel":"stylesheet"}');
			}
		}
	}

	public function route($id, $path, $option, $view, $layout){
		$database = new database();
		$database->tables();

		if($view  == 'article'){
			$q = "SELECT alias, catid FROM $database->content WHERE id = '$id'";
			$result = $database->q($q);

			$this->categoryId = $result[0]['catid'];
			$this->articleAlias = $result[0]['alias'];

			$q = "SELECT title, alias FROM $database->categories WHERE id = '$this->categoryId'";
			$result = $database->q($q);

			$this->categoryAlias = $result[0]['alias'];
			$this->categoryTitle = $result[0]['title'];

			if($this->categoryAlias == 'static'){
				$pathAlias = $this->articleAlias;
			}else{
				$pathAlias = $this->categoryAlias;
			}
		}

		if($view == 'category'){
			$q = "SELECT title, alias FROM $database->categories WHERE id = '$id'";
			$result = $database->q($q);
			$this->categoryAlias = $result[0]['alias'];
			$this->categoryTitle = $result[0]['title'];
			$pathAlias = $this->categoryAlias;
		}

		if($option){
			$path .= $option . '/';
		}
				
		if($view){
			$path .= $view . '/';
		}
			
		if($layout){
			$path .= $layout . '/';
		}

		if($pathAlias){
			$path .= $pathAlias . '/';
		}

		$path .= 'default.php';

		require ($path);
	}
}
?>