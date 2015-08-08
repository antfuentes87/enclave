<?php
namespace joomla;

use joomla\database;

class article{
	public function deploy($id, $alias, $view, $schema = ''){
		$html = new html();
		$attr = '{"id":"'.$alias.'-'.$view.'"}';
		$html->b('section', 0, 1, $schema, $attr);
			$this->content($id);
		$html->b('section', 1, 1);
	}

	public function content($id){
		$db = new database();
		$db->tables();
		$query = "SELECT * FROM $db->content WHERE id = '$id' ORDER BY id DESC";
		$result = $db->q($query);
		return $result;
	}

	public function introtext($id){
		$db = new database();
		$db->tables();
		$query = "SELECT introtext FROM $db->content WHERE id = '$id' ORDER BY id DESC";
		$result = $db->q($query);
		return $result;
	}
}

?>