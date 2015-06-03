/*SECTION ARRAY EXAMPLE*/
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

function enc_HTMLParagraphs($sectionArray, $array){
	foreach($array as $arrayKey => $arrayValue){
		echo '<p class="'.$sectionArray[id].'-p">'.$arrayValue.'</p>';
	}
}

function enc_HTMLButton($array){
	echo '<a href="'.$array[buttonLink].'" class="'.$array[id].'-button">';
		echo $array[buttonText];
	echo '</a>';
}

function encHTML_HGroup($array, $titleHeadingNumber, $subTitleHeadingNumber){
	echo '<hgroup class="'.$array[id].'-hgroup">';
		echo '<h'.$titleHeadingNumber.'>';
			echo $array[title];
		echo '</h'.$titleHeadingNumber.'>';
		echo '<h'.$subTitleHeadingNumber.'>';		
			echo $array[subTitle];
		echo '</h'.$subTitleHeadingNumber.'>';
	echo '</hgroup>';
}

function encHTML_Require($sectionArray, $arraySize, $page){
	for ($key = 0; $key <= $arraySize; $key++) {
    	require($sectionArray[$page].'.php');
	}
}
