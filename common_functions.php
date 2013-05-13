<?php

function debugvar($var) {
	echo "<pre>";
	print_r($var);
	echo "</pre>";
}

function loadTemplate($template) {
	ob_start();
	include($template);
	echo ob_get_clean();
}







