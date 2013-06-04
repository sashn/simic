<?php

class IndexController implements IndexControllerInterface
{
    public function index() {
		$thread = new Thread();
		$thread->listReplies();
    }
}