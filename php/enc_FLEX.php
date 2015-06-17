<?php
class enc_FLEX{
	public function buildLayout($section){
		$sectionArray = array();
		if ($handle = opendir('templates/what/html/com_content/article/'.$section)) {
    		while (false !== ($entry = readdir($handle))) {
       		 if ($entry != "." && $entry != "..") {
            	$sectionArray[] = $entry;
        	}
    	}
    	closedir($handle);
		}
		natsort($sectionArray);
		return $sectionArray;
	}
	
	public function layout($sectionArray, $sectionName){
		foreach ($sectionArray as &$sectionValue){
			if($sectionValue <> 'config.php'){
				list($sectionId, $sectionType) = explode('_', $sectionValue);
				if($sectionType == 'section'){
					echo '<section id="what-'.$sectionName.'-section-'.$sectionId.'-outer">';
						echo '<div id="what-'.$sectionName.'-section-'.$sectionId.'-inner">';
							echo '<div id="what-'.$sectionName.'-section-'.$sectionId.'-content">';
								echo '<div id="what-'.$sectionName.'-section-'.$sectionId.'-center">';
									require('templates/what/html/com_content/article/'.$sectionName.'/'.$sectionValue.'/section.php');
								echo '</div>';
							echo '</div>';
						echo '</div>';
					echo '</section>';
				}
				if($sectionType == 'parallax'){
					require_once('templates/what/html/com_content/article/'.$sectionName.'/'.$sectionValue.'/parallax.php');
					$paralaxArray = $this->buildLayout($sectionName.'/'.$sectionValue);
						echo '<div id="what-'.$sectionName.'-section-'.$sectionId.'-parallax" style="background-image: url('.$paralaxBackground.');">';
							foreach ($paralaxArray as &$paralaxValue){
								if($paralaxValue <> 'parallax.php'){
									list($parallaxId, $parallaxType) = explode('_', $paralaxValue);
									echo '<section id="what-'.$sectionName.'-section-'.$sectionId.'-parallax-'.$parallaxId.'-outer">';
										echo '<div id="what-'.$sectionName.'-section-'.$sectionId.'-parallax-'.$parallaxId.'-inner">';
											echo '<div id="what-'.$sectionName.'-section-'.$sectionId.'-parallax-'.$parallaxId.'-content">';
												echo '<div id="what-'.$sectionName.'-section-'.$sectionId.'-parallax-'.$parallaxId.'-center">';
													require('templates/what/html/com_content/article/'.$sectionName.'/'.$sectionValue.'/'.$paralaxValue.'/section.php');
												echo '</div>';
											echo '</div>';
										echo '</div>';
									echo '</section>';	
								}
							}
						echo '</div>';
				}	
			}
		}
	}
	
	public function layoutJS($sectionArray, $sectionName){
		$var = 0;
		foreach ($sectionArray as $sectionKey => $sectionValue){
		require_once('templates/what/html/com_content/article/'.$sectionName.'/config.php');
			if($sectionValue <> 'config.php'){
				list($sectionId, $sectionType) = explode('_', $sectionValue);
				if($sectionType == 'section'){
					echo '<script>';
						echo '$(window).on("load resize scroll",function(e){';
						echo 'encAllMinHeightsEqualElementA_Divided(window, "#what-'.$sectionName.'-section-'.$sectionId.'-outer", '.$sectionWindowDivide[$var].');';
						echo 'encVerticalCenter("#what-'.$sectionName.'-section-'.$sectionId.'-outer", "#what-'.$sectionName.'-section-'.$sectionId.'-inner", "#what-'.$sectionName.'-section-'.$sectionId.'-content");';
						echo '});';
					echo '</script>';
					$var = $var + 1;
				}
				if($sectionType == 'parallax'){
					$paralaxArray = $this->buildLayout($sectionName.'/'.$sectionValue);
					foreach ($paralaxArray as &$paralaxValue){
						if($paralaxValue <> 'parallax.php'){
							list($parallaxId, $parallaxType) = explode('_', $paralaxValue);
							echo '<script>';
								echo '$(window).on("load resize scroll",function(e){';
								echo 'encAllMinHeightsEqualElementA_Divided(window, "#what-'.$sectionName.'-section-'.$sectionId.'-parallax-'.$parallaxId.'-outer", '.$sectionWindowDivide[$var].');';
								echo 'encVerticalCenter("#what-'.$sectionName.'-section-'.$sectionId.'-parallax-'.$parallaxId.'-outer", "#what-'.$sectionName.'-section-'.$sectionId.'-parallax-'.$parallaxId.'-inner", "#what-'.$sectionName.'-section-'.$sectionId.'-parallax-'.$parallaxId.'-content");';
								echo '});';
							echo '</script>';
							$var = $var + 1;
						}
					}
				}
			}	
		}
	}
}
?>
