<!DOCTYPE html><html><head><title>Sencarta stats</title></head><style>* {	padding: 0px;	margin: 0px;	text-align: center;}body {	width: 800px;	margin-left: auto;	margin-right: auto;}</style><body><h1>Sencarta stats</h1><?php$dir = "./user_img/";$array = scandir($dir);$ignore_list = ["8CfqgsW"];$date_array=array();$date_list=array();foreach($array as $filename) {	if (strpos($filename, '.jpg') !== false) {		$this_date = date ("F d Y H:i:s.", filemtime($dir . $filename));		$this_ID = str_replace(".jpg", "", $filename);		if (! in_array($this_ID, $ignore_list)) {			$date_array[$this_date] = $this_ID;			array_push($date_list, $this_date);		};	};};$num_sentences = sizeof($date_array);echo "<h4>Number of shares initiated : " . $num_sentences . "</h4>";echo "<hr />";rsort($date_list);foreach($date_list as $this_date) {	echo $this_date . " - <a href='http://www.sencarta.com/MyStory/" . $date_array[$this_date] . "' target='blank'>" . $date_array[$this_date] . "</a>";	echo "<br />";};?></body></html>