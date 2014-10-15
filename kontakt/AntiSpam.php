<?php

$data = array(
	0 => array("Wieviele Stunden hat ein Tag?",24),
	1 => array("Wieviele Tage hat eine Woche?",7),
	2 => array("Wieviele Sekunden hat eine Minute?",60),
	3 => array("Was ergibt 5 mal 3?",15),
	4 => array("Was ergibt 9 minus 2?",7),
	5 => array("Was ergibt 12 plus 1?",13),
	6 => array("Was ergibt 50 geteilt durch 10?",5)
);

class AntiSpam{

	public static function getAnswerById($id){
		global $data;
		
		return $data[$id][1];
	}	
	
	public static function getRandomQuestion(){
		global $data;
		
		$rand = rand(0,count($data)-1);
		return array($rand,$data[$rand][0]);
	}
	
}

?>