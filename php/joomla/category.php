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
		$db = new database();
		$menu = new menu();
		$db->tables();
		$query = "SELECT * FROM $db->content WHERE catid = '$id' ORDER BY id DESC";
		$results = $db->q($query);

		$total = count($results);
		$pages= @$_GET["page"];
		$pagesTotal = ceil($total / $showLimit);
		if($pages < 1){ 
			$pages = 1;
		}else{ 
			$pages;
		}
		
		$start = ($pages - 1) * ($showLimit);
		$resultsSlices = array_slice($results,$start,$showLimit);
		$this->pagesTotal = $pagesTotal;

		foreach($resultsSlices as $resultSlice){
			foreach ($resultSlice as $column => $data){
				$this->{$column} = $data;
			}
			require($template.'.php');
		}
	}
}

?>