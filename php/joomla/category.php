<?php
namespace joomla;

use framework\html;
use joomla\database;
use joomla\menu;

class category{
	public function deploy($id, $itemId, $showLimit, $template, $alias, $view, $categoryTitle, $schema = ''){
		$html = new html();
		$attr = '{"id":"'.$alias.'-'.$view.'"}';
		$html->b('section', 0, 1, $schema, $attr);
			$html->b('h1', 0, 1);
				$html->e(1, $categoryTitle);
			$html->b('h1', 1, 1);
			$this->content($id, $itemId, $showLimit, $template);
		$html->b('section', 1, 1);
	}

	public function content($id, $itemId, $showLimit, $template){
		//INT DATABASE / MENU CLASSES
		$db = new database();
		$menu = new menu();

		//CREATE TABLE NAME VARS
		$db->tables();

		//BUILD QUERY
		$query = "SELECT * FROM $db->content WHERE catid = '$id' ORDER BY id DESC";

		//STORE QUERY
		$result = $db->q($query);

		//COUNT QUERY
		$total = count($result);
		
		//GET PAGE
		$pages= @$_GET["page"];

		//CEIL FOR PAGE TOTAL
		$pagesTotal = ceil($total / $showLimit);

		//IF PAGES IS LESS THAN 1 MAKE IT 1
		if($pages < 1){ 
			$pages = 1;
		}else{ 
			$pages;
		}
		
		//CALC START
		$start = ($pages - 1) * ($showLimit);
		
		//SLICE RESULT
		$resultSlice = array_slice($result,$start,$showLimit);

		//ASIGN VAR FOR PAGES TOTAL
		$this->pagesTotal = $pagesTotal;

		foreach($resultSlice as $val){
			require($template.'.php');
		}
	}
}

?>