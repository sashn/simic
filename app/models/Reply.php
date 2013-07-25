<?php

class Reply {
	private $creator, $title, $text;
	
	public function __construct($data) {
		foreach ($data as $key => $val) {
			$this->$key = $val;
		}
	}

	public function getCreator() { return $this->creator; }
	public function getTitle() { return $this->title; }
	public function getText() { return $this->text; }
}
	
?>