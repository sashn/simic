<?php

class MyPdo {
	private $host = DB_HOST;
	private $dbname = DB_NAME;
	private $user = DB_USER;
	private $pass = DB_PASS;

	private $dbh;
	private $stmt;
	private $error;

	public function __construct($params = array()) {
		// host, dbname, user, pass COULD be in params
		foreach ($params as $key => $value) {
			$this->$key = $value;
		}

		$dsn = 'mysql:host='.$this->host.';dbname='. $this->dbname;
		$options = array(
			PDO::ATTR_EMULATE_PREPARES, false,
			PDO::ATTR_PERSISTENT => true,
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
		);

		try {
			$this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
		} catch(PDOException $e) {
			$this->error = $e->getMessage();
		}
	}

	public function query($query, $params = array()) {
		$this->prepare($query);
		foreach ($params as $key => $value) {
			$this->bind($key, $value);
		}
		$this->execute();
		return $this->resultset();
	}

	public function prepare($query) {
		$this->stmt = $this->dbh->prepare($query);
	}

	public function bind($param, $value) {
		switch (true) {
			case is_int($value):
				$type = PDO::PARAM_INT;
				break;
			case is_bool($value):
				$type = PDO::PARAM_BOOL;
				break;
			case is_null($value):
				$type = PDO::PARAM_NULL;
				break;
			default:
				$type = PDO::PARAM_STR;
		}
		$this->stmt->bindValue($param, $value, $type);
	}

	public function execute() {
		return $this->stmt->execute();
	}
	public function resultset() {
		return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	public function single() {
		return $this->stmt->fetch(PDO::FETCH_ASSOC);
	}
	public function rowCount() {
		return $this->stmt->rowCount();
	}
	public function lastInsertId() {
		return $this->dbh->lastInsertId();
	}
	public function beginTransaction() {
		return $this->dbh->beginTransaction();
	}
	public function endTransaction() {
		return $this->dbh->commit();
	}	
	public function cancelTransaction() {
		return $this->dbh->rollBack();
	}
	public function debugDumpParams() {
		return $this->stmt->debugDumpParams();
	}

}
	