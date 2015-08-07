<?php
class ENCurl{	
	public function disect(){
		$url = explode('?',sprintf(
			"%s://%s%s",
			isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
			$_SERVER['SERVER_NAME'],
			$_SERVER['REQUEST_URI']
		));
		
		$this->baseURL = str_replace('index.php', '', $url[0]);
		$this->indexURL = $url[0];
		$this->currentURL = $url[0].$url[1];
	}
}
?>