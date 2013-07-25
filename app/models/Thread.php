<?php

class Thread {
	private $creator, $title, $seo_title, $replies;
	
	public function __construct($data) {
		foreach ($data as $key => $val) {
			if ($key === "replies") {
				foreach ($val as $reply) {
					$this->replies[] = new Reply($reply);
				}
			} else {
				$this->$key = $val;
			}
		}
	}

	public function getCreator() { return $this->creator; }
	public function getTitle() { return $this->title; }
	public function getSeoTitle() { return $this->seo_title; }
	public function getReplies() { return $this->replies; }

	public function createSeoTitle() {
		if (!empty($this->title)) {
			$this->seo_title = strtolower(str_replace(" ", "-", trim(preg_replace("[^A-Za-z0-9\ ]", "", $this->title))));
			return $this->getSeoTitle();
		} else {
			throw new Exception("can't create seo title unless title is set");
		}
	}
}
	
?>