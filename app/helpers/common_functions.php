<?php

function debugvar($var) {
	echo "<pre>";
	print_r($var);
	echo "</pre>";
}

function redirect($url) {
	header("Location: $url");
	exit();
}





