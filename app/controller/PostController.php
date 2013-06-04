<?php

class PostController implements PostControllerInterface
{
    public function index() {
        $thread = new Thread();
		$thread->showPostReplyForm();
    }
	
	public function submit() {
        $thread = new Thread();
		$thread->submitReply($_POST);
    }
}