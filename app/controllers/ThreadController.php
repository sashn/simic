<?php

class ThreadController
{
    public function show($params = false) {
    	$database = new Database();
        $threadData = $database->getThreadData($params["name"]);
        $thread = new Thread($threadData);
        $replies = $thread->getReplies();

        $view = new View();
        $view->setTemplate("listReplies");
        $view->assign("replies", $replies);
        $view->assign("thread", $thread);
        $view->show();
    }

    public function postreply() {
        $view = new View();
        $view->setTemplate("postReply");
        $view->show();
    }

    public function posted($params = false) {
        $database = new Database();
        $seo_title = strtolower(str_replace(" ", "-", trim(preg_replace("[^A-Za-z0-9\ ]", "", $_POST["title"]))));
        if ($params["name"]) {
            $database->addReply();
        } else {
            $database->addThread(array(
                "users_id" => $_POST["users_id"],
                "title" => $_POST["title"],
                "text" => $_POST["text"],
                "seo_title" => $seo_title
            ));
        }

        $view = new View();
        $view->setTemplate("posted");
        $view->assign("seo_title", $seo_title);
        $view->show();
    }
}