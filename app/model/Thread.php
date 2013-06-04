<?php

class Thread {
	public function __construct() {
	}
	
	public function listReplies() {
		//get replies from db
		$repliesData = getReplies();
		foreach ($repliesData as $reply) {
			$replies[] = new Reply($reply);
		}
	
		$view = new View();
		$view->setTemplate("listReplies");
		$view->assign("replies", $replies);
		$view->show();
	}
	
	public function showPostReplyForm() {
		$view = new View();
		$view->setTemplate("postReply");
		$view->show();
	}
	
	public function submitReply($replyData) {
		postReply($replyData);
		
		redirect(ROOT_PATH_ABS);
	}
}
	
?>