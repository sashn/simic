<?php

class IndexController implements IndexControllerInterface
{
    public function index() {
    	$boardController = new BoardController();
		$boardController->show();
    }
}