<?php
namespace joomla;

class link{
	public function article($id, $menuid){
		$link = 'index.php?option=com_content&view=article&id='.$id.'&Itemid='.$menuid;
		return $link;
	}
}
?>