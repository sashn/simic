<?php

class Reply {
	private $name, $text;
	
	public function __construct($params) {
		foreach ($params as $key => $val) {
			$this->$key = $val;
		}
	}
	
	public function getName() { return $this->name; }
	public function getText() { return $this->text; }
}
	
?>