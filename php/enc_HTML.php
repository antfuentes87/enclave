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

	public function repeat($sectionArray, $arraySize, $page, $pathPath){
		for ($key = 0; $key <= $arraySize; $key++) {
			require($sectionArray[$pagePath].$sectionArray[$page].'.php');
		}
	}
}
?>
