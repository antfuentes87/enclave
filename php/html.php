function enc_HTMLParagraphs($paragraphs){
	foreach($paragraphs as $paragraphsKey => $paragraphsValue){
		echo '<p>'.$paragraphsValue.'</p>';
	}
}

function enc_HTMLButton($array){
	echo '<a href="'.$array[buttonLink].'" id="'.$array[id].'-button" class="'.$array[id].'-button uk-button uk-button-link">';
		echo $array[buttonText];
	echo '</a>';
}

function encHTML_HGroup($array, $titleHeadingNumber, $subTitleHeadingNumber){
	echo '<hgroup id="'.$array[id].'-hgroup" class="'.$array[id].'-hgroup">';
		echo '<h'.$titleHeadingNumber.'>';
			echo $array[title];
		echo '</h'.$titleHeadingNumber.'>';
		echo '<h'.$subTitleHeadingNumber.'>';		
			echo $array[subTitle];
		echo '</h'.$subTitleHeadingNumber.'>';
	echo '</hgroup>';
}

function encHTML_ImageHoverOverlay($sectionArray, $array){
	echo '<div class="uk-overlay uk-overlay-hover">';
		echo '<img src="'.$array[image].'" id="'.$sectionArray[id].'-image" />';
		echo '<img src="'.$array[imageHover].'" id="'.$sectionArray[id].'-imageHover" class="uk-overlay-panel uk-overlay-image uk-overlay-fade" />';
		echo '<a class="uk-position-cover"></a>';
	echo '</div>';
}

function encHTML_SlideShow($sectionArray, $array){
	echo '<ul class="uk-slideshow uk-slideshow-fullscreen" data-uk-slideshow="{'.$sectionArray[slideShowSettings].'}">';
		foreach ($array as $arrayKey => $arrayValue){
			echo '<li>';
				echo '<img src="'.$arrayValue.'" />';
			echo '</li>';
		}
	echo '</ul>';
}
