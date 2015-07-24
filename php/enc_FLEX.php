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
          echo '<section id="'.$sectionName.'-s'.$sectionId.'-out">';
            echo '<div id="'.$sectionName.'-s'.$sectionId.'-inn">';
              echo '<div id="'.$sectionName.'-s'.$sectionId.'-con">';
                echo '<div id="'.$sectionName.'-s'.$sectionId.'-cen">';
                  require('templates/what/html/com_content/article/'.$sectionName.'/'.$sectionValue.'/section.php');
                echo '</div>';
              echo '</div>';
            echo '</div>';
          echo '</section>';
        }
        if($sectionType == 'parallax'){
          require_once('templates/what/html/com_content/article/'.$sectionName.'/'.$sectionValue.'/parallax.php');
          $parallaxArray = $this->buildLayout($sectionName.'/'.$sectionValue);
            echo '<div id="'.$sectionName.'-s'.$sectionId.'-par" style="background-image: url('.$parallaxBackground.');">';
              foreach ($parallaxArray as &$parallaxValue){
                if($parallaxValue <> 'parallax.php'){
                  list($parallaxId, $parallaxType) = explode('_', $parallaxValue);
                  echo '<section id="'.$sectionName.'-s'.$parallaxId.'-out">';
                    echo '<div id="'.$sectionName.'-s'.$parallaxId.'-inn">';
                      echo '<div id="'.$sectionName.'-s'.$parallaxId.'-con">';
                        echo '<div id="'.$sectionName.'-s'.$parallaxId.'-cen">';
                          require('templates/what/html/com_content/article/'.$sectionName.'/'.$sectionValue.'/'.$parallaxValue.'/section.php');
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
	require_once('templates/what/html/com_content/article/'.$sectionName.'/config.php');
    $var = 0;
    foreach ($sectionArray as $sectionKey => $sectionValue){
      if($sectionValue <> 'config.php'){
        list($sectionId, $sectionType) = explode('_', $sectionValue);
        if($sectionType == 'section'){
          echo '<script>';            
            echo 'var callback = function () {';
            echo 'ENC.minHeight.EqualElementA_Divided(window,"#'.$sectionName.'-s'.$sectionId.'-out", '.$sectionWindowDivide[$var].');';
            echo 'ENC.align.verticalCenter("#'.$sectionName.'-s'.$sectionId.'-out", "#'.$sectionName.'-s'.$sectionId.'-inn", "#'.$sectionName.'-s'.$sectionId.'-con");';
            echo '};';

            echo '$(document).ready(callback);';
            echo '$(window).load(callback);';
            echo '$(window).scroll(callback);';
            echo '$(window).resize(callback);';
          echo '</script>';
          $var = $var + 1;
        }
        if($sectionType == 'parallax'){
          $parallaxArray = $this->buildLayout($sectionName.'/'.$sectionValue);
          foreach ($parallaxArray as &$parallaxValue){
            if($parallaxValue <> 'parallax.php'){
              list($parallaxId, $parallaxType) = explode('_', $parallaxValue);
              echo '<script>';              
              echo 'var callback = function () {';
              echo 'ENC.minHeight.EqualElementA_Divided(window, "#'.$sectionName.'-s'.$parallaxId.'-out", '.$sectionWindowDivide[$var].');';
              echo 'ENC.align.verticalCenter("#'.$sectionName.'-s'.$parallaxId.'-out", "#'.$sectionName.'-s'.$parallaxId.'-inn", "#'.$sectionName.'-s'.$parallaxId.'-con");';
              echo '};';

              echo '$(document).ready(callback);';
              echo '$(window).load(callback);';
              echo '$(window).scroll(callback);';
              echo '$(window).resize(callback);';
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
