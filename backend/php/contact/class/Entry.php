<?php
/**
 * A class representing a contact form entry on calvinlowe.com
 */
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
	public function insert($first_name, $email_addres, $subject_message, $message) {

		$this->db->run(
						"INSERT INTO entry (first_name, email_address, subject_message, message)
						VALUES (:first_name, :email_address, :subject_mesage, :message);"
					);
	}
}
?>