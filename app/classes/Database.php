<?php

class Database {
	private $pdo;

	public function __construct() {
		$this->pdo = new MyPdo;
	}
	
    public function addThread(array $params) {
		$this->pdo->prepare("insert into threads select NULL, :users_id, :title, :seo_title");
		$this->pdo->bind("users_id", $params["users_id"]);
		$this->pdo->bind("title", $params["title"]);
		$this->pdo->bind("seo_title", $params["seo_title"]);
		$this->pdo->execute();

		$lastInsertId = $this->pdo->lastInsertId();

		$this->pdo->prepare("insert into replies select NULL, :threads_id, :users_id, :title, :text, 1");
		$this->pdo->bind("threads_id", $lastInsertId);
		$this->pdo->bind("users_id", $params["users_id"]);
		$this->pdo->bind("title", $params["title"]);
		$this->pdo->bind("text", $params["text"]);
		$this->pdo->execute();
	}

    public function getThreadData($seo_title) {
    	//TODO how to do it w/ just 1 query
    	echo $seo_title."asd";
    	$this->pdo->prepare("select * from threads where seo_title = :seo_title");
		$this->pdo->bind("seo_title", $seo_title);
		$this->pdo->execute();
		$threadData = $this->pdo->single();

		$this->pdo->prepare("select * from replies where threads_id = :threads_id order by sort_order");
		$this->pdo->bind("threads_id", $threadData["threads_id"]);
		$this->pdo->execute();
		$threadData["replies"] = $this->pdo->resultset();

		return $threadData;
    }

    public function getBoardData() {
    	$boardData = array();
    	$boardData["threads"] = $this->pdo->query("
    		select t.*, u.name as creator
    		from threads t
    		left join users u on u.users_id = t.users_id
		");
    	return $boardData;
    }

    public function createTableThreads() {
    	$this->pdo->prepare("
    		DROP TABLE IF EXISTS threads;
			CREATE TABLE threads (
				threads_id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
				users_id INT(11) NOT NULL DEFAULT 1,
				title VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'no title', 
				seo_title VARCHAR(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
			) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;
		");
		$this->pdo->execute();
    }

    public function createTableReplies() {
    	$this->pdo->prepare("
    		DROP TABLE IF EXISTS replies;
			CREATE TABLE replies (
				replies_id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY, 
				threads_id INT(11) NOT NULL, 
				users_id INT(11) NOT NULL DEFAULT 1,
				title VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'no title', 
				text TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NULL, 
				sort_order INT(11) NULL DEFAULT '1'
			) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;
		");
		$this->pdo->execute();
    }

    public function createTableUsers() {
    	$this->pdo->prepare("
    		DROP TABLE IF EXISTS users;
			CREATE TABLE users (
				users_id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY, 
				name VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'anonymous'
			) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;
		");
		$this->pdo->execute();
    }


}
	
?>