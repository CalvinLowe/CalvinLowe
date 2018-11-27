<?php
/**
 * A class representing a contact form entry on calvinlowe.com
 */

include("class/MyPDO.php"); 

class Entry {

	/* @var MyPDO */
	protected $db;

	protected $data;

	/**
	 * Construct a new instance of Entry
	 * @param $db - the database connection to be used.
	 */
	public function __construct(MyPDO $db) {
		$this->db = $db;
	}

	// TODO: find based on email, name or id, or display latest or the count the number of entries?

	/**
	 * Insert a new contact form entry.
	 * @param first_name
	 * @param email_address
	 * @param subject_message
	 * @param message
	 */
	public function insert($first_name, $email_address, $message_subject, $message) {

		$sql = "INSERT INTO entry (first_name, email_address, message_subject, message)
				  VALUES (:first_name, :email_address, :message_subject, :message);";

		$this->db->run($sql, [$first_name, $email_address, $message_subject, $message]);
	}
}
?>