<?php

class Board {
	private $threads;

	public function __construct($data) {
		foreach ($data as $key => $val) {
			if ($key === "threads") {
				foreach ($val as $thread) {
					$this->threads[] = new Thread($thread);
				}
			} else {
				$this->$key = $val;
			}
		}
	}
	
	public function getThreads() {
		return $this->threads;
	}
}
	
?>