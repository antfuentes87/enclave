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
	public function sectionID($sectionArray){
		echo 'id="'.$sectionArray['id'].'"';
	}
	
	public function sectionClass($sectionArray){
		echo 'class="'.$sectionArray['id'].'"';
	}

	public function setID($sectionArray, $idExt){
		echo 'id="'.$sectionArray['id'].'-'.$idExt.'"';
	}
	
	public function setClass($sectionArray, $classExt){
		echo 'class="'.$sectionArray['id'].'-'.$classExt.'"';
	}

	public function setRepeatID($sectionArray, $pageExt, $idExt){
		echo 'id="'.$sectionArray['id'].'-'.$sectionArray[$pageExt].'-'.$idExt.'"';
	}

	public function setRepeatClass($sectionArray, $pageExt, $idExt){
		echo 'class="'.$sectionArray['id'].'-'.$sectionArray[$pageExt].'-'.$idExt.'"';
	}
	
	public function backgroundImage($sectionArray, $backgroundImage){
		echo 'style="background-image: url('.$sectionArray[$backgroundImage].')"';
	}
	
	public function paragraph($sectionArray, $paragraphName){
		echo '<p class="'.$sectionArray['id'].'-p">';
			if (array_key_exists($paragraphName, $sectionArray)){
				return $sectionArray[$paragraphName];
			}else{
				return $paragraphName;
			}
		echo '</p>';
	}
	
	public function li($sectionArray, $liName){
		echo '<li class="'.$sectionArray['id'].'-li">';
			if (array_key_exists($liName, $sectionArray)){
				return $sectionArray[$liName];
			}else{
				return $liName;
			}
		echo '</li>';
	}
	
	public function heading($sectionArray, $heading, $headingNumber, $link){
		echo '<h'.$headingNumber.' class="'.$sectionArray['id'].'-h'.$headingNumber.'">';
			if($link <> ''){
				echo '<a href="'.$link.'" class="'.$sectionArray['id'].'-link">';
			}
			if(array_key_exists($heading, $sectionArray)){
				echo $sectionArray[$heading];
			}else{
				echo $heading;
			}
			if($link <> ''){
				echo '</a>';
			}
			
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
	public function input($sectionArray, $type, $id, $placeHolder, $name, $required){
		if($required == true){
			$required = "required";
		}else{
			$required = "";
		}
		echo '<input id="'.$id.'" class="'.$sectionArray["id"].'-input" type ="'.$type.'" placeholder="'.$placeHolder.'" name="'.$name.'" '.$required.'>';
		
	}
	public function textArea($sectionArray, $id, $name, $colums, $rows, $placeHolder, $required){
		if($required == true){
			$required = "required";
		}else{
			$required = "";
		}
		echo '<textarea id="'.$id.'" class="'.$sectionArray["id"].'-text-area" name="'.$name.'" cols="'.$colums.'" rows="'.$rows.'" placeholder="'.$placeHolder.'" '.$required.'>';
		echo '</textarea>';
	}
	public function submit($sectionArray, $type, $id, $value){		
		echo '<input id="'.$id.'" class="'.$sectionArray["id"].'-input" type ="'.$type.'" value="'.$value.'">';		
	}
	public function image($sectionArray, $src, $alt){
		if (array_key_exists($src, $sectionArray)){
			if(array_key_exists($alt, $sectionArray)){
				return '<img class="'.$sectionArray['id'].'-image" src="'.$sectionArray[$src].'" alt="'.$sectionArray[$alt].'"/>';
			}
		}else{
			return '<img class="'.$sectionArray['id'].'-image" src="'.$src.'" alt="'.$alt.'"/>';
		}
		
	}
	public function joomlaQueryArray($table, $col, $where, $whereValue, $orderBy, $order, $limit){
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
	
		$query->select($db->quoteName($col));
		$query->from($db->quoteName('#__'.$table));
		$query->where($db->quoteName($where) . ' = '.$whereValue);
		$query->order($orderBy.' '.$order);
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
	
	public function span($sectionArray, $content){
		echo '<span class="'.$sectionArray['id'].'-span">';
			if (array_key_exists($content, $sectionArray)){
				echo $sectionArray[$content];
			}else{
				echo $content;
			}
		echo '</span>';
	}
	
		
	public function link($sectionArray, $linkText, $linkURL, $before, $after){
		if($before <> ''){
			echo $before;	
		}
			if (array_key_exists($linkText, $sectionArray)){
				if(array_key_exists($linkURL, $sectionArray)){
					echo '<a href="'.$sectionArray[$linkURL].'" class="'.$sectionArray['id'].'-link">';
						echo $sectionArray[$linkText];
				}
			}else{
				echo '<a href="'.$linkURL.'" class="'.$sectionArray['id'].'-link">';
					echo $linkText;
			}
			echo '</a>';
		if($after <> ''){
			echo $after;	
		}
	}
	
	
	public function string_formatDate($dateFormat, $dateKey){
		return date($dateFormat, strtotime($dateKey));
	}	

	public function test(){
		echo 'Everything is working.';
	}
}
?>
