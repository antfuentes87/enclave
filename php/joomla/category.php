<?php
namespace joomla;

use joomla\database;
use joomla\menu;

class category{
	function content($id, $itemId, $userLimit, $template){
		$db = new database();
		$menu = new menu();

		$menu->link($itemId);

		$db->tables();
		$catid = $id;
		$query = "SELECT * FROM $db->content WHERE catid = '$catid' ORDER BY id DESC";
		$result = $db->q($query);

		$total = count($result);
		
		$show_item = $userLimit;
		
		$pages= @$_GET["page"];

		$pages_total = ceil($total / $show_item);

		if($pages < 1){ 
			$pages = 1;
		}else{ 
			$pages;
		}
		
		$start = ($pages-1) * ($show_item);
		
		$resultSlice = array_slice($result,$start,$show_item);

		foreach($resultSlice as $val){
			require($template.'.php');
		}

		$this->pagesTotal = $pages_total;
	}
}

?>