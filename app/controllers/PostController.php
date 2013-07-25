<?php

class PostController implements PostControllerInterface
{
    public function index() {
        $thread = new Thread();
		$thread->showPostReplyForm();
    }
	
	public function submit() {
		$dbWrapper = new PdoWrapper();
		$thread = new Thread($dbWrapper);
		$thread->submitReply($_POST);
    }
}