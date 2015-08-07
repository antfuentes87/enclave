<?php
namespace joomla;

class database{
    public $link;

    function __construct(){
    	$this->link = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    	if (mysqli_connect_errno()) {
    		printf("Connect failed: %s\n", mysqli_connect_error());
    		exit();
		}
    	
    }

    public function q($q){
		$data = array();
    	$result = mysqli_query($this->link, $q);
    	if ($result){
			while($row = mysqli_fetch_assoc($result)){
				$data[] = $row;
			}
		}
		return $data;
	}

	public function tables(){
		$array = $this->q('SHOW TABLES');
		foreach($array as $key => $val){
			$table = explode('_', $val['Tables_in_what']);
			$varname = $table[1];
     		$this->$varname = $table[0].'_'.$table[1];
		}
    }

    public function columns($table){
    	$array = $this->q('SHOW COLUMNS FROM '. $table);
    	var_dump($array);
		foreach($array as $key => $val){
			$varname = $val['Field'];
     		$this->$varname = $val['Field'];
		}
    }
}
?>