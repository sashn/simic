<?php

class BoardController
{
    public function show() {
        $database = new Database();
        $boardData = $database->getBoardData();
        $board = new Board($boardData);
        $threads = $board->getThreads();

        $view = new View();
        $view->setTemplate("listThreads");
        $view->assign("threads", $threads);
        $view->show();
    }

    public function postthread() {
        $view = new View();
        $view->setTemplate("postReply");
        $view->show();
    }
}