<?php

interface DatabaseWrapperInterface
{
    public function postReply(array $params);
    public function getReplies();
}