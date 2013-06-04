<?php

class View {
	private $template;
	private $vars = array();
	

	public function __construct() {
	}
	
	public function setTemplate($template) {
		$this->template = $template;
	}
	
	public function assign($key, $value) {
		$this->vars[$key] = $value;
	}
	
	public function show() {
		include(TEMPLATE_DIR."head.php");
		foreach ($this->vars as $key => $val) {
			$$key = $val;
		}
		include(TEMPLATE_DIR.$this->template.".php");
		include(TEMPLATE_DIR."foot.php");
	}
}
	
?>