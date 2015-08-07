<?php
namespace joomla;

use joomla\database;

class article{
	public function content($id){
		$db = new database();
		$db->tables();
		$query = "SELECT * FROM $db->content WHERE id = '$id' ORDER BY id DESC";
		$result = $db->q($query);
		return $result;
	}
}

?>