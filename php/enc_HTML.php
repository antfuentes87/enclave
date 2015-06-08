<?php
/*
$whatHomeTeaser = array(
	"id" => "what-home-teaser",
	"title" => "The Red Carpet",
	"subTitle" => "Experience",
	"buttonText" => "Reading",
	"buttonLink" => "google.com",
	"figurePage" => "replaceHTML"
);
*/

class enc_HTML{
	public function test(){
		echo 'Everything is working.';
	}
	
	public function link($sectionArray, $linkText, $linkURL, $before, $after){
		echo $before;
		echo '<a href="'.$sectionArray[$linkURL].'" class="'.$sectionArray['id'].'">';
			echo $sectionArray[$linkText];
		echo '</a>';
		echo $after;
	}
	
	public function sectionID($sectionArray){
		echo 'id="'.$sectionArray['id'].'"';
	}
	
	public function setID($sectionArray, $id){
		echo 'id="'.$sectionArray['id'].'-'.$id.'"';
	}
	
	public function span($sectionArray, $text){
		echo '<span class="'.$sectionArray['id'].'-'.$text.'">';
			echo $sectionArray[$text];
		echo '</span>';
	}
	
	public function backgroundImage($sectionArray, $backgroundImage){
		echo 'style="background-image: url('.$sectionArray[$backgroundImage].')"';
	}
	
	public function paragraph($sectionArray, $paragraphName){
		echo '<p id="'.$sectionArray['id'].'-'.$paragraphName.'" class="'.$sectionArray['id'].'-p">';
			echo $sectionArray[$paragraphName];
		echo '</p>';
	}
	
	public function paragraphs($sectionArray, $array){
		foreach($array as $arrayKey => $arrayValue){
			echo '<p class="'.$sectionArray[id].'-p">'.$arrayValue.'</p>';
		}
	}
	
	public function heading($sectionArray, $heading, $headingNumber){
		echo '<h'.$headingNumber.' class="'.$sectionArray['id'].'-h'.$headingNumber.'" id="'.$sectionArray['id'].'-h'.$headingNumber.'">';
			echo $sectionArray[$heading];
		echo '</h'.$headingNumber.'>';
	}

	public function button($array){
		echo '<a href="'.$array[buttonLink].'" class="'.$array[id].'-button">';
			echo $array[buttonText];
		echo '</a>';
	}

	public function hGroup($array, $titleHeadingNumber, $subTitleHeadingNumber){
		echo '<hgroup class="'.$array[id].'-hgroup">';
			echo '<h'.$titleHeadingNumber.'>';
				echo $array[title];
			echo '</h'.$titleHeadingNumber.'>';
			echo '<h'.$subTitleHeadingNumber.'>';		
				echo $array[subTitle];
			echo '</h'.$subTitleHeadingNumber.'>';
		echo '</hgroup>';
	}

	public function repeat($sectionArray, $arraySize, $page, $pagePath){
		for ($key = 0; $key <= $arraySize; $key++) {
			require($sectionArray[$pagePath].$sectionArray[$page].'.php');
		}
	}
	public function input($sectionArray, $type, $id, $name, $required){
		if($required == true){
			$required = "required";
		}else{
			$required = "";
		}
		echo '<input id="'.$id.'" class="'.$sectionArray["id"].'-input" type ="'.$type.'" name="'.$name.'" '.$required.'>';
		
	}
	public function textArea($sectionArray, $id, $name, $colums, $rows, $required){
		if($required == true){
			$required = "required";
		}else{
			$required = "";
		}
		echo '<textarea id="'.$id.'" class="'.$sectionArray["id"].'-input" name="'.$name.'" cols="'.$colums.'" rows="'.$rows.'" '.$required.'>';
		echo '</textarea>';
	}
	public function image($sectionArray, $src, $alt){
		echo '<img class="'.$sectionArray['id'].'-image" src="'.$sectionArray[$src].'" alt="'.$sectionArray[$alt].'"/>';
	}
	public function joomlaQueryArray($table, $order, $limit){
		$db = JFactory::getDbo();

		$query = $db->getQuery(true);
	
		$query->select($db->quoteName(array('id', 'asset_id', 'title', 'alias', 'introtext', 'fulltext', 'state', 'catid', 'created', 'created_by', 'created_by_alias', 'modified', 'modified_by', 'checked_out', 'checked_out_time', 'publish_up', 'publish_down', 'images', 'urls', 'attribs', 'version', 'ordering', 'metakey', 'metadesc', 'access', 'hits', 'metadata', 'featured', 'language', 'xreference')));
		$query->from($db->quoteName('#__'.$table));
		$query->order('ordering '.$order);
		$query->setLimit($limit);
		
		$db->setQuery($query);
	
		$results = $db->loadObjectList();
		return $results;
	}
	
	public function repeatArray($sectionArray, $array, $page, $pagePath){
		foreach ($array as $key => $value) {
			require($sectionArray[$pagePath].$sectionArray[$page].'.php');
		}
	}
}
?>
