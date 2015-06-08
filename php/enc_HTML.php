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
		echo '<input id="'.$id.'" class="'.$sectionArray["id"]'-input" type ="'.$type.'" name="'.$name.'" '.$required.'>';
		
	}
}
?>
