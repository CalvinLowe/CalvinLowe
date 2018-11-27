<?php
/**
 * A wrapper for PDO, take from https://phpdelusions.net/pdo/pdo_wrapper
 * 
 * Example use: $data = $pdo->run("SELECT * FROM users WHERE sex=?",[$sex])->fetchAll();
 */
class MyPDO extends PDO {

	/**
	 * Constructor for MyPDO object
	 * @param $dsn
	 * @param $username
	 * @param $options
	 */
	public function __construct($dsn, $username = NULL, $password = NULL, $options = []) {
		
		$default_options = [
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
			PDO::ATTR_EMULATE_PREPARES => false,
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		];

		$options = array_replace($default_options, $options);
		parent::__construct($dsn, $username, $password, $options);
	}

	/**
	 * Run an SQL query with optional arguments.
	 * @param $sql
	 * @param $args
	 * @return 
	 */
	public function run($sql, $args = NULL) {

		if (!$args) {
			return $this->query($sql);
		}

		$stmt = $this->prepare($sql);
		$stmt->execute($args);

		return $stmt;
	}
}
?>