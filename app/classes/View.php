<?php

class View {
	private $template;
	private $vars = array();
	private $showHeader = true;

	public function __construct($params = array()) {
		foreach ($params as $key => $value) {
			$this->$key = $value;
		}
	}
	
	public function setTemplate($template) {
		$this->template = $template;
	}
	
	public function assign($key, $value) {
		$this->vars[$key] = $value;
	}
	
	public function show() {
		extract($this->vars);
		if ($this->showHeader) {
			include(TEMPLATE_DIR."header.php");
		}
		include(TEMPLATE_DIR.$this->template.".php");
		if ($this->showHeader) {
			include(TEMPLATE_DIR."footer.php");
		}
	}

	public function getHTML() {
		extract($this->vars);
		ob_start();
		include(TEMPLATE_DIR.$this->template.".php");
		return ob_get_clean();
	}
}
	
?>